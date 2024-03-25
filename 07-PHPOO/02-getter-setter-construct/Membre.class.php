<?php

/************************ 

    EXERCICE :
        En tenant compte des éléments appris dans ce chapitre, essayez de renseigner puis d'afficher les attributs de cette classe : 

        class Membre {
            private $prenom;
            private $age;
        }

        // On souhaite également ajouter des controles de saisies sur le prenom avec maximum 30 caractères et un âge forcément numérique 
        // Vous pouvez gérer les cas d'erreur avec un message au choix (style rouge css ou simplement trigger_error());

        Une fois la classe écrite, instanciez plusieurs objets, testez les méthodes, vérifiez avec des var_dump/print_r 

        Quand tout est fonctionnel, remodifiez pour ajouter un constructeur à la classe ! 


 ****************************/

class Membre
{
    private $prenom;
    private $age;

    public function __construct($newPrenom, $newAge)
    {
        echo "Instanciation, nous avons reçu les infos suivantes : $newPrenom et $newAge <hr>";
        $this->setPrenom($newPrenom);
        $this->setAge($newAge);
    }

    public function setPrenom($newPrenom)
    {
        if (iconv_strlen($newPrenom) <= 30) { 
            $this->prenom = $newPrenom;
        } else {
            trigger_error("Attention, le prénom doit forcément être un string de 30 caractères maximum", E_USER_ERROR);
        }
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setAge($newAge)
    {
        if (is_numeric($newAge)){
            $this->age = $newAge;
        } else {
            trigger_error("Attention, il faut fournir un âge numérique", E_USER_ERROR);
        }
    }

    public function getAge()
    {
        return $this->age;
    }
}

// $membre1 = new Membre;

// $membre1->setPrenom("Pierra");
// $membre1->setAge(35);

$membre1 = new Membre("Lolo", 12);


echo "Voici le prenom du membre1 : " . $membre1->getPrenom() . "<hr>";
echo "Voici l'âge du membre1 : " . $membre1->getAge() . "<hr>";

var_dump($membre1);
