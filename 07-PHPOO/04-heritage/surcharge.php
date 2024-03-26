<?php 

// Surcharge ou Override : Lorsqu'une classe fille redéfinie au même nom, une méthode qu'elle a récupérée par héritage 

class A  
{
    public function calcul()
    {
        return 10;
    }
}


class B extends A 
{
    public function calcul() // Je redéfini ma méthode, donc elle écrase la méthode calcul() récupérée par héritage... Mais je peux malgré tout récupérer quand même, le return de la méthode d'origine
    {
        // return 50; // Si je me contente de faire ça, j'ai écrasé totalement le fonctionnement d'origine

        $nb = parent::calcul(); // ici grâce à parent:: j'arrive à atteindre la méthode de la classe mère et en récupérer son return dans la variable $nb

        if ($nb < 100) {
            return "$nb est inférieur à 100";
        } else {
            return "$nb est supérieur à 100";
        }
    }
}

/* 

    Une surcharge permet soit d'écraser totalement le comportement d'une méthode ou bien de prendre en compte le comportement d'une méthode héritée et y apporter un traitement complémentaire

*/
