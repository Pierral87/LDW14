<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Form\LivreType;
use App\Repository\LivreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

// #[IsGranted("ROLE_ADMIN")]
#[Route('/admin')]
class LivreController extends AbstractController
{
    #[Route('/livre', name: 'livre')]
    public function index(LivreRepository $livreRepository): Response
    {
        // Pour récupérer les éléments d'une bdd on utilise les classes Repository
        // Une classe Repository est en charge de lancer UNIQUEMENT des requêtes de selection sur l'entité qu'elle concerne 
        // Pour récupérer la liste de tous mes livres, je vais donc utiliser LivreRepository, je l'importe via l'injection de dépendance dans ma méthode index()
        // J'utilise snuite la méthode "findAll" qui correspond à un SELECT * FROM livres sans aucunes conditions
        // Egalement cela me transmet un tableau array à plusieurs niveaux comme si j'avais déjà fait un fetchAll
        // Attention ce n'est pas un array dans un array, mais un objet dans un array 
        $livres = $livreRepository->findAll();
        // dd($livres);

        return $this->render('livre/index.html.twig', [
            'livres' => $livres
        ]);
    }

    #[Route('/livre/ajouter', name: 'livre_ajouter')]
    // On va utiliser ici une injection de dépendance (c'est à dire on amène dans la méthode, des informations accessibles dans le noyau de l'appli symfony, des objets déjà existants représentants certaines fonctionnalités (pas besoin de faire une instanciation avec new))
    public function ajouter(Request $request, EntityManagerInterface $em) // Ici j'injecte Request, il contient des infos sur les actions de l'utilisateur
    {

        // dd($request);
        // L'objet Request a des propriétés qui contiennent les valeurs des superglobables de PHP notamment GET et POST 
        // Pour $_GET cela correspond à la propriété "query" de l'objet Request
        // Pour $_POST cela correspond à la propriété "request" de l'objet Request

        // $titre = trim($_POST["titre"]);
        if ($request->isMethod("POST")) {
        $titre = $request->request->get("titre");
        $auteur = $request->request->get("auteur");

        // On crée un objet Livre qui va représenter un Livre sur lequel je peux intéragir (c'est à dire modifier ses valeurs/titre/auteur pour ensuite l'envoyer vers la BDD)
        $livre = new Livre; // Ici je crée l'entité Livre (en gros, l'enregistrement vide qui sera envoyé vers la bdd)
        $livre->setTitre($titre); // Je donne une valeur au titre
        $livre->setAuteur($auteur); // Je donne une valeur à l'auteur, il ne me reste plus qu'à l'envoyer vers la bdd 
        // dd($livre);

        // La classe EntityManagerInterface que je vais injecter dans ma méthode comme je l'ai fais avec Request, va me permettre d'enregistrer en BDD
        // Cette classe permet d'effectuer toutes les opérations de type "action" sur notre bdd en gérant toutes les notions de sécurité
        // Elle va permettre de transformer un objet livre, ici mon $livre en SQL pour l'insérer/modifier dans la table 

        // La méthode "persist" permet de préparer une requête INSERT INTO à partir d'un objet classe Entité
        $em->persist($livre);
        // La méthode flush "lance"/execute les requêtes SQL préparées et en attente d'être exécutées, la bdd va alors être mise à jour
        $em->flush();

        // dd($livre);

        // Pour faire une redirection vers une route existante, on utilise redirectToRoute avec le name d'une route en paramètre
        return $this->redirectToRoute("livre");
        }
        // dd($titre, $auteur);
        return $this->render("livre/formulaire.html.twig");
    }

    #[Route('/livre/nouveau', name: 'livre_nouveau')]
    public function nouveau(Request $request, EntityManagerInterface $em)
    {
        // On créé une entité Livre qui sera rattachée au form 
        $livre = new Livre;

        // Toutes les modifications apportées dans le formulaire vont impacter les prop de cet objet entité Livre
        // Le deuxième argument de la méthode createForm permet de créer un lien entre une entité et le form
        // createForm permet de créer le formulaire selon le modèle LivreType et rattaché à $livre
        $formLivre = $this->createForm(LivreType::class, $livre);

        // handleRequest : permet à la variable $formLivre de gérer les informations envoyées par le navigateur 
        $formLivre->handleRequest($request);

        // On va ensuite utiliser les méthodes isSubmitted() pour savoir si le formulaire est saisi puis la méthode isValid() pour savoir si le formulaire est valide par rapport à ses contraintes, si c'est bon alors on va persist et flush !
        if ($formLivre->isSubmitted() && $formLivre->isValid()) {
            $em->persist($livre);
            $em->flush();
            return $this->redirectToRoute("livre");
        }

        return $this->render("livre/form.html.twig", ["formLivre" => $formLivre, "titre" => "Ajout d'un nouveau livre"]);

    }


    // Nouvelle route pour modifier un livre existant
    // Ici on va avoir besoin d'injecter LivreRepository car on va lancer une requête pour récupérer les informations du livre à modifier
    // On va avoir besoin de Request pour comprendre si le formulaire de modification est bien validé 
    // On va avoir besoin de EntityManagerInterface pour lancer la requête update (requête de type action)
    #[Route('/livre/modifier/{id}', name: 'livre_modifier')]
    public function modifier(LivreRepository $livreRepository, Request $request, EntityManagerInterface $em, $id)
    {
        // La méthode find des Repository me permet de récupérer un enregistrement par son id
        // Je récupère donc ici l'entité livre que je souhaite modifier (en lien avec son id dans l'url)
        $livre = $livreRepository->find($id);

        // dd($livre);

        // Je fais la liaison entre mon formType et l'entité $livre que je viens de récupérer
        // Je n'ai pas l'obligation de lier une entité vide au formulaire, il est apte à récupérer une entité déjà existante et donc répercutera dans les inputs, les valeurs de cette entité (dans notre contexte : le titre et l'auteur du livre )
        $formLivre = $this->createForm(LivreType::class, $livre);

        $formLivre->handleRequest($request);

        // Si le formulaire est soumis et valide, je lance le persist et le flush, le système comprend de lui même que nous sommes dans un scénario de modification
        if ($formLivre->isSubmitted() && $formLivre->isValid()) {

            // Dans le contexte de modification, le persist n'est pas nécessaire car l'entité est déjà présente dans la table, le flush suffit
            $em->persist($livre);
            $em->flush();
            return $this->redirectToRoute("livre");
        }

        // On peut utiliser ici le même template que pour ajouter, le système arrive à nous placer dans un contexte différent, celui de la modification
        return $this->render("livre/form.html.twig", ["formLivre" => $formLivre, "titre" => "Modification d'un livre"]);

    }

    #[Route('/livre/supprimer/{id}', name: 'livre_supprimer')]
    public function supprimer(EntityManagerInterface $em, Request $request, Livre $livre) {
        // Ici j'utilise un concept de Symfony : l'auto-wiring, c'est à dire que le système va de lui même faire le lien entre l'id récupérée dans l'url et l'entité qui est transmise en injection, ce qui m'évite de faire la requête moi même
        // Automatiquement cette entité $livre correspondra au livre ayant l'id transmit dans l'url 

        // Plutôt que de supprimer directement le livre je crée une page intermédiaire sur laquelle je crée un form avec simplement un bouton submit, si ce bouton submit est cliqué alors cela transmet une méthode POST, ce qui me permet de créer la condition ci dessous pour lancer la suppression
        if ($request->isMethod("POST")) {
            // Ici pas de persist mais un remove, c'est ce qui va préparer la requête DELETE
            $em->remove($livre);
            // Et ensuite je flush pour valider la requête
            $em->flush();
            return $this->redirectToRoute("livre");
         }

        return $this->render("livre/supprimer.html.twig", ["livre" => $livre]);

    }


}
