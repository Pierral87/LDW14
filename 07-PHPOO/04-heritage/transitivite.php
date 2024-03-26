<?php

class A
{
    public function testA()
    {
        return "testA";
    }
}


##########################################################

class B extends A
{
    public function testB()
    {
        return "testB";
    }
}

##########################################################

class C extends B
{
    public function testC()
    {
        return "testC";
    }
}


$c = new C;

var_dump(get_class_methods($c));

/* 

    Si C hérite de B 
        que B hérite de A 
            Alors C hérite de A même s'il n'y a pas de lien direct entre les deux 

        -- C'est ce qu'on appelle la transitivité -- 

    Autres détails sur l'héritage : 

    - Non reflexif : class D extends D // Erreur une classe ne peut pas hériter d'elle même 
    - Non symétique : class F extends E // F hérite de E mais E n'hérite pas de F 
    - Sans Cycle : class X extends Y ---- class Y extends X   // Erreur, il n'est pas possible que Y hérite de X puis que X hérite de Y  
    - Pas d'héritage multiple : Class G extends I, J, K // Erreur ! Mais cette limitation saute grâce aux traits et interfaces


*/