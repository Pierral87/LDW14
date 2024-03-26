<?php 

final class Application 
{
    public function lancementApp()
    {
        return "L'app se lance";
    }
}

#####################################################

// class Extension extends Application {} // ATTENTION ! Il n'est pas possible d'hériter d'une classe finale ! 
// Une classe finale a pour but d'être FINALE, afin qu'elle ne soit plus modifiable par la suite 

$app = new Application;
echo $app->lancementApp();


class Application2 
{
    final public function lancementApp2()
    {
        return "Lancement de l'app2";
    }
}

class Extension2 extends Application2 
{
    // On hérite sans problèmes de la méthode finale lancementApp2()
    // Par contre ! Impossible de la surcharger ! Elle est finale ! 
    // public function lancementApp2() {}
}

$ext = new Extension2;
echo $ext->lancementApp2();

/* 

    - Une classe finale ne peut pas être héritée 
    - Une classe finale aura forcément des méthodes qui ne pourront pas être surchargées ou redéfinies 
    - Une classe finale reste instanciable
    - Une méthode finale peut être présente dans une classe normale 
    - Le but de final est de vérouiller une classe ou une méthode à un comportement souhaité

*/

