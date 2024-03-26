<?php

abstract class Joueur
{
    public function seConnecter()
    {
        return "Je me connecte";
    }

    abstract public function etreMajeur(); // Les méthodes abstraites n'ont pas de contenu, ouvrir les accolades provoque une erreur

    abstract public function devise(); // Les méthodes abstraites n'ont pas de contenu, ouvrir les accolades provoque une erreur
}


class JoueurFr extends Joueur
{
    public function etreMajeur() // Je suis obligé de redéfinir mes deux méthodes héritées de la classe mère sinon erreur ! 
    {
        return "18";
    }

    public function devise() 
    {
        return "€";
    }
}

class JoueurUS extends Joueur 
{
    public function etreMajeur() 
    {
        return "21";
    }

    public function devise() 
    {
        return "$";
    }
}

// $joueur = new Joueur; // Impossible d'instancier une classe abstract, elle sert uniquement à être héritée, c'est un modèle pour les sous classes

/* 

    - Une classe abstraite n'est pas instanciable
    - Les méthodes abstraites n'ont pas de contenu 
    - Lorsque l'on hérite de méthodes abstraites, nous sommes obligés de les redéfinir 
    - Pour définir de méthodes abstraites, il est nécessaire que la classe qui les contient soit abstraite
    - Une classe abstraite peut contenir des méthodes normales 

*/
