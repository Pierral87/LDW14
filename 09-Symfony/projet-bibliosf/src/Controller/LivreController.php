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

        return $this->render("livre/form.html.twig", ["formLivre" => $formLivre]);

    }

}
