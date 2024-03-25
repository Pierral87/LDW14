<?php 

// Par convention d'écriture on écrira toujours une classe avec sa première lettre en majuscule 
// La classe est un modèle de construction, c'est un regroupement d'informations dans lequel nous allons trouver plusieurs éléments 

class User {

    // Des propriétés (et non pas des variables)
    public $pseudo; 
    protected $email = "email@mail.fr";
    private $statut;

    // Des méthodes (et non pas des fonctions)
    public function inscription(){
        return "Procédure d'inscription ici... La méthode inscription() s'est bien lancée ! l'email de l'utilisateur est le suivant : " . $this->email . "et on va maintenant le connecter : " . $this->connexion();
    }

    protected function connexion(){
        return "L'utilisateur se connecte en utilisant cette méthode... La méthode connexion() s'est bien lancée !";
    }

    private function deconnexion(){
        return "L'utilisateur se déconnecte en utilisant cette méthode... La méthode déconnexion() s'est bien lancée !";
    }
}

// echo $pseudo; // Ceci ne fonctionne pas, la classe est simplement déclarée, nous n'avons pas "construit" d'objet à partir de cette classe pour le moment 

// Il faut donc instancier un objet, c'est à dire créer un premier objet de cette classe 

$user1 = new User;

// Me retourne uniquement les propriétés
var_dump($user1);
print_r($user1);

// object(User)[1]
//   public 'pseudo' => null
//   public 'email' => null
//   public 'statut' => null

// Si je veux voir les méthodes je dois utiliser "get_class_methods"
var_dump(get_class_methods($user1));
// array (size=2)
//   0 => string 'inscription' (length=11)
//   1 => string 'connexion' (length=9)

// Pour changer le pseudo du user1, comment faire ?
// Je pointe sur sa propriété pseudo avec la flèche ->  (tiret et chevron fermant) puis je fais une simple affectation 
$user1->pseudo = "Pierra"; // Attention on ne mets pas le $ sur pseudo, car on appelle la propriété pseudo de $user1 (on spécifie déjà le $ à ce niveau là)
var_dump($user1);

// Pour appeler une méthode d'un objet, même concept, on oubli par contre pas de mettre les parenthèses, comme lors de l'appel d'une fonction classique
echo $user1->inscription();

// Ici je créer un second objet User qui est totalement indépendant du premier !
$user2 = new User;

$user2->pseudo = "Lolo";
var_dump($user2);
// Ce user2 a pour pseudo Lolo, alors que le premier a pour pseudo Pierra et les deux coéxistent simultanément 

// $user1->email = "email@mail.fr";
// $user1->statut = "admin";

// echo $user1->connexion();
// echo $user1->deconnexion();


/* 

    Une classe est un plan de construction, un modèle qui permet de regrouper des données, des informations.
    Pour exploiter ce qui est déclaré dans les calsses, nous devons créer une instance, un objet issu de cette classe grâce au mot clé "new"
    Une classe peut produire plusieurs objets qui seront tous indépendant les uns des autres (n'arrive pas forcément souvent dans un contexte web (sauf framework))

    ************************************
    Niveau de visibilité : 

        public : accessible de partout (aussi bien à l'intérieur qu'à l'extérieur des classes )

        protected : accessible uniquement dans la classe où cela a été déclaré (et s'il y a héritage, ces props/méthodes se transmettent à la classe fille)

        private : accessible uniquement dans la classe où cela a été déclaré (et s'il y a héritage, ces props/méthodes NE SE TRANSMETTENT PAS à la classe fille)

*/