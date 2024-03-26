<?php 

class Perso 
{
    public $pointDeVie = 3;

    public function sauter()
    {
        return "je saute";
    }

    protected function deplacement()
    {
        return "je me déplace";
    }
}

########################################################

// On va créer une classe fille à la classe Perso, c'est ce qu'on appelle un héritage
// On fait un héritage grâce au mot clé "extends" 
// Grâce à l'héritage toutes les propriétés et méthodes de la classe Perso sont directement accessible dans la classe Mario
// ATTENTION, seul les éléments de visibilité public et private se transmettent à la classe fille ! 

class Mario extends Perso 
{
    public function quiSuisJe()
    {
        return "Je m'appelle Mario et j'ai " . $this->pointDeVie . " points de vie ! Et puis " . $this->sauter() . " ou encore " . $this->deplacement();
    }
}

########################################################
$mario = new Mario; 

echo $mario->quiSuisJe();

/* 

    L'héritage représente la récupération de tous les éléments public et protected d'une classe par une autre, c'est un concept important de l'orienté objet 

    Les propriétés ainsi que les méthodes sont récupérées tant qu'elles respectent ces niveaux de visibilité 

    ATTENTION à respecter un contexte cohérent dans l'héritage : 

        Il faut pouvoir dire que A est un B 
            Admin est un User 
            Voiture est un Vehicule etc

*/