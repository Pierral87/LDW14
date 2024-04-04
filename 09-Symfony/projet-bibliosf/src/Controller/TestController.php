<?php

namespace App\Controller; // le namespace, App correspond à src

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; // Tous les use sont des classes utilisées par le controller, ce qui n'est pas dans app est généralement dans vendor 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')] // Ici une annotation, c'est un commentaire spécial qui commence par #, le premier param correspond à l'adresse de la route, si dans mon navigateur je tape /test à la fin de l'url de base, je tombe dans cette méthode là, c'est l'action qui est déclenché en réponse à une demande d'accès sur une route par l'utilisateur, second param c'est le "nom" de cette route 

    // Ci dessous la méthode qui sera lancée lorsqu'on accèdera à cette route /test 
    public function index(): Response // Response correspond à un renvoi de type "Response" html (une page html lisible par le navigateur en gros)
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'Controleur de test',
        ]);
    }

    // Je crée une nouvelle route pour un nouvel affichage 
    #[Route('/test/accueil', name: 'app_test_accueil')]
    public function accueil()
    {
        // Je récupère ici en brut, des variables que je souhaite passer à l'affichage, le but étant par la suite que ces valeurs viennent de la base de données, mais d'abord on teste 
        $nombre = 45;
        $prenom = "Pierra";
        return $this->render("base.html.twig", ["nombre" => $nombre, "prenom" => $prenom]);
    }

    // Nouvelle route pour l'héritage des modèles twig 
    #[Route('/test/heritage', name: 'app_test_heritage')]
    public function heritage()
    {
        return $this->render("test/heritage.html.twig");
    }

    // On crée une nouvelle route pour la transitivité de l'héritage sur les templates 
        // Si heritage hérite de base et que transitif hérite de heritage alors transitif récupère aussi bien les éléments de heritage que de base, c'est la transitivité
    #[Route('/test/transitif', name: 'app_test_transitif')]
    public function transitif()
    {
        return $this->render("test/transitif.html.twig");
    }

    // Nouvelle orute pour apprendre à manipuler les tableaux array en twig
    #[Route('/test/tableau', name: 'app_test_tableau')]
    public function tableau()
    {
        $tab = ["jour" => 03, "mois" => "avril", "annee" => 2024];
        return $this->render("test/variables.html.twig", [
            "tableau" => $tab,
            "tableau2" => [45, "test", true], 
            "nombre" => 5,
            "chaine" => ""
        ]);
    }


    // #[Route('/test/salutation/', name: 'app_test_salutation')]
        // Attention l'ordre des routes est important ! La route ci dessus sortira en prioritaire par rapport à la route d'en dessous avec le prenom facultatif
        // Bien sur on fait en sorte que nos routes ne se ressemblent pas ! Il faut rester cohérent dans le nommage de nos routes

    #[Route('/test/salutation/{prenom?}', name: 'app_test_salutation')]
    // Si on écrit ci dessus{prenom?} cela défini que ce param est non obligatoire
    // Ici ma route attend un paramètre dans l'URL, ce paramètre sera transposé dans $prenom récupéré par la méthode salutation (liaison automatique par symfony)

    // Le fait de donner une valeur par défaut ici dans la méthode va considérer l'élément comme facultatif (pas besoin de mettre {prenom?} dans la route)
    public function salutation($prenom = "inconnu")
    {
        // Si mon élément est facultatif dans la route avec le prenom? je peux définir une valeur par defaut avec la ligne ci dessous
        $prenom = $prenom ?? "inconnu";
        // dd($prenom); // dd = dump and die, c'est un var_dump de symfony qui permet de stopper l'exécution du code et d'afficher le contenu de la variable à vérifier, il existe aussi "dump" mais ne stoppe pas l'exécution du code donc des erreurs peuvent toujours être générée, mais on peut visualiser le dump dans la barre d'outil du helper de symfony (barre d'outil en bas de page) 
        
       return $this->render("test/salutation.html.twig", ["prenom" => $prenom]);
       // EXERCICE : Créez la vue salutation.html.twig et affichez dans le block titreH1 le message suivant : "Bonjour prenom" 
    }

    // EXERCICE 
    // Créez une nouvelle route qui va prendre 2 paramètres dans l'url et qui va afficher la valeur de l'addition, de la multiplication, de la soustraction et de la divisions des deux nombres passés en paramètres 
    // Si le deuxième paramètre est 0, la division n'est pas possible il faudra gérer cette exception en affichant à la place un message 

    // Je crée ici ma nouvelle route et je lui transmet deux param, nb1 et nb2, je décide ici de les séparer par un / mais je suis libre de faire autrement (avec un tiret pourquoi pas), l'important c'est que les params soient bien englobés par leurs propres {}
    // Je peux aussi ajouter un requirements me permettant d'appliquer une regex à mes nb1 et nb2 pour obliger le fait que ce soit bien des chiffres et non pas des strings ou autre chose
    #[Route('/test/calcul/{nb1}/{nb2}', name: 'app_test_calcul', requirements:["nb1" => '[0-9]+', "nb2" => '[0-9]+'])]
    public function calcul($nb1, $nb2) // ici j'ai la nécessité de définir ces deux variables pour récupérer les param venant de l'url
    {
        // Grâce au dump je vérifie que je récupère bien mes deux params venant de l'url
        dump($nb1,$nb2);

        // Je transmet ensuite ces deux param à mon template
        return $this->render("test/calcul.html.twig", ["nb1" => $nb1, "nb2" => $nb2]);
    }

}
