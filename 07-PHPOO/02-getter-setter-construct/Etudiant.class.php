<?php

class Etudiant
{
    private $prenom;

    public function __construct($newPrenom) // Méthode magique, attention à bien mettre les deux underscrore, tout le code déclaré dans le construct s'exécutera directement à l'instanciation de l'objet
    {
        echo "Instanciation, nous avons reçu l'information suivante : $newPrenom <hr>";
        $this->setPrenom($newPrenom);
    }

    public function setPrenom($newPrenom)
    { // setter, je "set" l'information = la renseigner (et eventuellement la controler)
        if (is_string($newPrenom)) { // is_string me permet de vérifier si la valeur envoyée dans l'argument est bien une chaine de caractères, sinon on déclenche une erreur
            $this->prenom = $newPrenom; // $prenom = $newPrenom; ne fonctionnerait pas, car $prenom n'existe pas dans l'espace local de la méthode 
            // $this symbolise l'objet "en train d'être utilisé", contextuellement dans le cas de ma ligne $etudiant1->setPrenom("Pierra"), le this représente $etudiant1
        } else {
            trigger_error("Attention il faut fournir une chaine de caractères pour le prenom !", E_USER_ERROR);
        }
    }

    public function getPrenom()
    { // getter permet d'exploiter une donnée, de la récupérer
        return $this->prenom; // On fait un simple return, le getter sera toujours codé de cette façon
    }
}

// $etudiant1 = new Etudiant;

// // $etudiant1->prenom = "Pierra"; // Je ne peux pas manipuler ma propriété car elle est private... Pour cela je dois donc développer ce qu'on appeller des setters et getters

// $etudiant1->setPrenom("Pierra");

// var_dump($etudiant1);

// echo $etudiant1->getPrenom();

/* 

    Les getters / setters permettent de controler l'intégrité des données, afin d'éviter de recevoir des mauvaises valeurs de saisie ou simplement des mauvaises manipulation dans notre code (c'est une contrainte saine)

    setter = affecte la donnée et la controle
    getter = permet de voir / récupérer la donnée préalablement insérée 

    Pour chaque propriété de notre objet, on aura toujours un duo de getter/setter, si j'ai 10 propriétés alors j'ai 10 setters et 10 getters 

    $this représente l'objet en cours d'utilisation à l'intérieur de la classe 

*/


$etudiant2 = new Etudiant("Bob");

var_dump($etudiant2);

/* 

    __construct() est une méthode magique en PHP (comportement déjà défini dans le langage)
    Son comportement est qu'elle s'exécute automatiquement lors d'une instanciation de l'objet en question (lorsque je fais un new)
    Si la méthode magique __construct($newPrenom) attend un argument, nous devons lui envoyer à l'instanciation, cela devient un argument obligatoire à fournir ! Si non fourni alors cela déclenchera une erreur.

    Il existe d'autres méthodes magiques, toujours appelées avec 2 "__" suivi du nom de la méthode magique

*/