<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bases PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        h3 {
            padding: 20px;
            color: white;
            background-color: royalblue;
            margin-top: 30px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12 mt-5 border p-3">
                <h2 class="pb-3 border-bottom">Bases PHP</h2>

                <?php

                // au dessus la balise ouvrante php

                // ceci est un commentaire sur une seule ligne
                #  ceci est un commentaire sur une seule ligne

                /*
                    Ceci est un commentaire
                    sur plusieurs
                    lignes
                */

                // Il est possible d'écrire de l'html dans un fichier .php, en revanche l'inverse n'est pas possible
                // chaque ligne doit se terminer par un ;

                // Liens utiles :
                //---------------
                // Doc officielle :
                // https://www.php.net/

                // Les bonnes pratiques
                // https://phptherightway.com/
                // https://www.php-fig.org/psr/ 

                // Débuggage :
                // https://stackoverflow.com/

                // en dessous, la balise fermante php

                // Instructions d'affichage
                echo '<h3>01 - Instructions d\'affichage</h3>';
                // echo permet de générer un affichage dans le code source de la page
                echo 'Bonjour ';
                echo 'à tous';
                echo '<br>'; // c'est à nous de gérer les retours à la ligne.
                echo 'Bonjour ';
                echo 'à tous';

                echo '<br>';

                print 'Bonjour à tous<br>'; // print est une autre instruction du langage permettant de faire un affichage. print est quasiment similaire à echo, nous utiliserons toujours echo.

                // Variables : déclaration affectation et type
                echo '<h3>02 - Variables : déclaration affectation et type</h3>';
                // variable : un espace nommé permettant de conserver une valeur qu'il est possible de modifier

                // gettype($variable) est une fonction prédéfinie permettant de nous renvoyer une chaine de caractère représentant le type de l'information conservée dans la variable fournie.

                // Une variable se déclare avec le signe $
                // Caractères autorisés : az AZ 09 et _ (une variable ne peut pas commencer par un chiffre)
                // PHP est sensible à la casse

                $a = 123; // déclaration de la variable nommée "a" et affectation de la valeur numérique 123
                // on regarde le type de 123
                echo gettype($a); // integer (int) : un entier
                echo '<br>';

                $a = 'une chaine';
                echo gettype($a); // string : une chaine de caractère
                echo '<br>';

                $a = 1.5;
                echo gettype($a); // double / float : un chiffre avec décimale
                echo '<br>';

                $a = '123'; // ou "123"
                echo gettype($a); // string : une chaine de caractère
                echo '<br>';

                $a = true; // ou TRUE ou false ou FALSE
                echo gettype($a); // boolean (valeurs : 1 pour true et 0 pour false)
                echo '<br>';


                // La concaténation
                echo '<h3>03 - La concaténation</h3>';
                // raccourci d'écriture
                // La concaténation est le fait d'assembler des chaines de caractères les unes avec les autres qu'elles proviennent de texte brut ou stockée dans un variable ou en résultat d'une fonction
                // le caractère permettant la concaténation est le point . que l'on peut toujours traduire par "suivi de"

                $x = 'Bonjour';
                $y = 'à tous';

                // sans concaténation :
                echo $x;
                echo ' ';
                echo $y;
                echo '<br>';

                // avec concaténation :
                echo $x . ' ' . $y . '<br>';

                // Spécificité de php : dans des guillemets les variables sont reconnues et interprétées.
                echo "$x $y <br>";

                $prenom = 'Mathieu ';
                $prenom = 'Marie'; // on écrase la valeur Mathieu par la valeur Marie

                echo $prenom . '<br>'; // Marie

                // Concaténation lors de l'affectation
                $prenom2 = 'Mathieu ';
                $prenom2 .= 'Marie'; // raccourci d'acriture, équivaut à écrire : 
                // $prenom2 = $prenom2 . 'Marie'; 

                echo $prenom2 . '<br>'; // Mathieu Marie


                // Les constantes
                echo '<h3>04 - Les constantes</h3>';
                // Une constante comme une variable permet de conserver une valeur sauf que, comme son nom l'indique cette valeur restera constante et ne pourra pas être modifiée.

                // déclaration et affectation :
                // define('NOM_DE_LA_CONSTANTE', $valeur);
                define('TVA', 1.2);

                echo '1000€ avec 20% de tva = ' . (1000 * TVA) . '€<br>';

                // TVA = 1.3; // impossible de changer la valeur d'une constante après sa déclaration
                // define('TVA', 1.3); // erreur car déjà déclarée

                // Constante magique : (inscrite au langage)
                echo __FILE__ . '<br>'; // C:\wamp64\www\PHP_altrh_ld14\base.php // chemin complet vers le fichier où l'on se trouve.

                echo __LINE__ . '<br>'; // 145 // le numéro de la ligne

                echo __DIR__ . '<br>'; // le chemin jusqu'au dossier contenant le fichier sur lequel on se trouve


                // Exercice
                echo '<h3>05 - Exercice</h3>';
                // déclarer 3 variables contenant chacune une des valeurs suivantes : lundi, mardi, mercredi
                // Ensuite avec un echo faire en sorte d'avori l'affichage suivant dans la page :
                // lundi - mardi - mercredi
                // Il est possible de gérer le " - " via une variable.

                $a = 'lundi';
                $b = 'mardi';
                $c = 'mercredi';
                $t = ' - ';

                echo $a . ' - ' . $b . ' - ' . $c . '<br>';
                echo $a . $t . $b . $t . $c . '<br>';
                echo "$a - $b - $c<br>";


                // Opérateurs arithmétiques
                echo '<h3>06 - Opérateurs arithmétiques</h3>';

                $m = 10;
                $n = 5;

                // addition 
                echo $m + $n . '<br>'; // 15
                // soustraction 
                echo $m - $n . '<br>'; // 5
                // multiplication 
                echo $m * $n . '<br>'; // 50
                // division 
                echo $m / $n . '<br>'; // 2

                //--------------------

                // modulo (le restant de la division en terme d'entier)
                echo $m % $n . '<br>'; // 0

                // puissance 
                echo $m ** $n . '<br>'; // 100 000


                // Condition et opérateur de comparaison
                echo '<h3>07 - Condition et opérateur de comparaison</h3>';

                // 2 outils importants de controle, important lorsque l'on manipule des variables venant d'actions utilisateur :

                // isset($variable)
                // permet de savoir si une variable existe.

                //-----------------

                // empty($variable)
                // permet de savoir si une variable existe mais va plus loin afin de savoir si la variable contient quelquechose ou si elle est vide.

                // isset()

                // echo $existe_pas; // Warning: Undefined variable $existe_pas
                $autre = 'Hello';

                if (isset($autre)) {
                    // la variable existe
                    echo $autre . '<br>';
                } else {
                    // la variable n'existe pas
                    echo 'La variable n\'existe pas, veuillez vérifier votre code.<br>';
                }

                // empty()
                $vide = 'Lundi'; // valeur équivalente à vide : 0 | 0.0 | -0 | la chaine "0" | une chaine vide $vide = ''; | false | un tableau array qui ne contient rien 
                // https://www.php.net/manual/fr/language.types.boolean.php#language.types.boolean.casting

                if (empty($vide)) {
                    echo 'La variable ne contient rien<br>';
                } else {
                    echo 'Voici la valeur dans cette variable : ' . $vide . '<br>';
                }


                //----------------

                $a = 10;
                $b = 5;
                $c = 2;

                if ($a > $b) {
                    // true 
                    echo 'True, la valeur de "$a" est bien supérieure à "$b"<br>';
                } else {
                    echo 'False, la valeur de "$a" n\'est pas supérieure à "$b"<br>';
                }

                // Plusieurs conditions obligatoires : et : &&
                if ($a > $b && $b > $c) {
                    echo 'True, ok pour les deux conditions<br>';
                } else {
                    echo 'False, l\'une ou l\'autre ou les deux conditions sont fausses<br>';
                }

                // L'une ou l'autre d'un ensemble de condition : ou : ||
                if ($a == 20 || $b > $c) {
                    echo 'True, au moins une des conditions est true<br>';
                } else {
                    echo 'False, toutes les conditions sont false<br>';
                }

                $a = 10;
                $b = 5;
                $c = 2;

                if ($a == 9) {
                    echo 'Réponse 1<br>';
                } elseif ($a != 10) {
                    echo 'Réponse 2<br>';
                } elseif ($a <= $c) {
                    echo 'Réponse 3<br>';
                } else {
                    echo 'Réponse 4<br>';
                }

                // comparaison stricte : comparaison des valeurs et des types
                $var1 = 1; // integer
                $var2 = '1'; // string
                $var3 = true; // boolean

                // Controle sur les valeurs uniquement
                if ($var1 == $var2) {
                    echo 'Les valeurs sont similaires<br>';
                } else {
                    echo 'Les valeurs sont différentes<br>';
                }

                // Controle sur les valeurs et les types
                if ($var1 === $var2) {
                    echo 'Les valeurs et les types sont similaires<br>';
                } else {
                    echo 'Les valeurs et/ou les types sont différents<br>';
                }

                /*
                    Opérateurs de comparaison :
                    ---------------------------
                    =   ⚠️, ceci n'est comparaison mais une affectation !!!
                    ==  est égal à (en terme de valeur uniquement)
                    !=  est différent de (en terme de valeur uniquement)
                    === est strictement égal à (en terme de valeur et de type)
                    !== est strictement différent de (en terme de valeur et/ou de type)
                    >   est strictement supérieur à
                    >=  est supérieur ou égal à
                    <   est strictement inférieur à
                    <= est inférieur ou égal à
                */

                // Autres possibilités d'écriture
                //-------------------------------
                // écriture classique :
                if ($var1 == $var2) {
                    echo 'Les valeurs sont similaires<br>';
                } else {
                    echo 'Les valeurs sont différentes<br>';
                }

                // Il n'est pas obligatoire d'avoir un else (si nous ne voulons pas le gérer)
                if ($var1 == $var2) {
                    echo 'Les valeurs sont similaires<br>';
                }

                // Il est possible de remplacer les {} par : et un end... à la fin
                if ($var1 == $var2) :
                    echo 'Les valeurs sont similaires<br>';
                else :
                    echo 'Les valeurs sont différentes<br>';
                endif;

                // il est possible de ne pas mettre  les accolades {} ou même les : end... unqiuement s'il n'y a qu'une seule instruction par cas
                if ($var1 == $var2)
                    echo 'Les valeurs sont similaires<br>';
                else
                    echo 'Les valeurs sont différentes<br>';


                // Autre façon de faire une condition : switch()
                $couleur = 'jaune';
                switch ($couleur) {
                    case 'rouge':
                        echo 'Vous aimez le rouge<br>';
                        break;
                    case 'bleu':
                        echo 'Vous aimez le bleu<br>';
                        break;
                    case 'vert':
                        echo 'Vous aimez le vert<br>';
                        break;
                    default:
                        echo 'Vous n\'aimez ni le rouge, ni le bleu, ni le vert.<br>';
                        break;
                }

                // Refaire la même condition en utilisant "if"
                if ($couleur == 'rouge') {
                    echo 'Vous aimez le rouge<br>';
                } elseif ($couleur == 'bleu') {
                    echo 'Vous aimez le bleu<br>';
                } elseif ($couleur == 'vert') {
                    echo 'Vous aimez le vert<br>';
                } else {
                    echo 'Vous n\'aimez ni le rouge, ni le bleu, ni le vert.<br>';
                }


                // Fonctions prédéfinies
                echo '<h3>🐼 08 - Fonctions 🐯 prédéfinies 🤖 </h3>';
                // déjà incrites au langage

                // date() permet d'afficher une date en choississant le format d'affichage
                // https://www.php.net/manual/fr/function.date
                // https://www.php.net/manual/fr/datetime.format.php (pour voir les formats disponibles)

                // Pour forcer le fuseau horaire que l'on souhaite
                date_default_timezone_set('Europe/Paris');

                echo 'Nous sommes le : ' . date('d/m/Y') . ', et l\'heure est : ' . date('H:i:s') . '<hr>';

                separateur(); // il est possible d'appeler une fonction avant sa déclaration !!!

                echo 'Copyright &copy; ' . date('Y') . '<hr>';

                // strlen() permet de compter la taille d'une chaine (en taille (octets))
                // iconv_strlen() permet de compter le nombre de caractères dans une chaine

                // https://www.php.net/manual/fr/function.iconv-strlen.php
                $variable = 'bonjour';
                echo 'Taille de la chaine $variable : ' . iconv_strlen($variable) . ' caractères<hr>';

                $mdp = 'sol'; // un mot de passe provenant d'un formulaire d'inscription par exemple
                if (iconv_strlen($mdp) < 4) {
                    echo '<div class="alert alert-danger">Le mdp doit avoir au moins 4 caractères.</div><br>';
                } else {
                    echo '<div class="alert alert-success">mdp ok.</div><br>';
                }


                // Fonctions utilisateur
                echo '<h3>09 - Fonctions utilisateur</h3>';
                // déclarée et exécutée par le développeur.

                // Fonction toute simple permettant d'afficher 3 balises hr
                // déclaration :
                function separateur()
                {
                    echo '<hr><hr><hr>';
                }

                // exécution
                separateur();

                // il est possible d'appeler une fonction avant sa déclaration !!!
                // effectivement, le script est lu une première fois pour isoler toutes les fonctions, ensuiye le script est lu pour etre exécuté.

                // Fonction avec argument
                // un argument permet de modifier le comportement de la fonction
                // si la fonction attend un argument, nous sommes obligé de le fournir sinon erreur fatale !
                function bonjour($qui)
                {
                    return 'Bonjour ' . $qui . ', bienvenue sur notre site<hr>';
                }
                // avec un return, c'est à nous d'appeler le echo si on souhaite un affichage

                // echo bonjour(); // erreur fatale sans l'argument attendu
                echo bonjour('Mathieu');

                $pseudo = 'Admin';
                echo bonjour($pseudo);

                separateur();

                //----------------------------------
                // fonction avec argument facultatif
                function calcul_ttc($prix, $tva = 1.2)
                {
                    return 'Le prix ttc pour la somme de ' . $prix . ' est de : ' . ($prix * $tva) . ' € TTC <br>';
                }
                echo calcul_ttc(1000, 1.2);
                // avec tva à 5.5
                echo calcul_ttc(1000, 1.055);

                separateur();

                echo calcul_ttc(1000); // s'il n'est pas fourni, le deuxième argument aura sa valeur par défaut (ici la valeur 1.2 (voir la déclaration de la fonction))

                separateur();

                //----------------------------------
                // environnement local et global

                // L'environnement global représente tout le script
                // L'environnement local représente à l'intérieur d'une fonction
                // Une variable locale n'existe que dans la fonction où elle est déclarée

                $animal = 'chat'; // espace global

                function jardin()
                {
                    $animal = 'chien'; // espace local
                    return $animal;
                }

                echo $animal . '<br>'; // chat
                echo jardin() . '<br>'; // chien
                echo $animal . '<br>'; // chat

                $ville = 'Paris'; // espace global

                function location()
                {
                    global $ville; // sans cette ligne, la ligne suivante provoque une erreur, la variable globale n'existe pas par défaut dans la fonction mais on peut l'appeler avec le mot clé "global"
                    return 'Je suis dans ' . $ville . '<br>';
                    echo 'TEST'; // cette ligne ne sera jamais exécutée, aprè_s un return, on sort immédiatement de la fonction !
                }

                echo location();

                separateur();

                // Fonction pour afficher la meteo : saison et temperature
                function meteo($saison, $temperature)
                {
                    $debut = 'Nous sommes en ' . $saison;
                    $fin = ', et il fait ' . $temperature . ' degré(s)<br>';

                    return $debut . $fin;
                }
                echo meteo('automne', 10);
                echo meteo('hiver', -1);
                echo meteo('printemps', 20);
                echo meteo('été', 30);

                // Exercice : refaire la fonction suivante afin :
                // d'avoir le bon article devant la saison : pour printemps ce devra être "au printemps" pour les autres "en ..."
                // de gérer le s sur dégré : valeur n'ayant pas de s : -1, 0 et 1 

                separateur();

                function meteo2($saison, $temperature)
                {
                    if ($saison == 'printemps') {
                        $debut = 'Nous sommes au ' . $saison;
                    } else {
                        $debut = 'Nous sommes en ' . $saison;
                    }

                    // if($temperature == 0 || $temperature == 1 || $temperature == -1 ) 
                    if ($temperature >= -1 && $temperature <= 1) {
                        $fin = ', et il fait ' . $temperature . ' degré<br>';
                    } else {
                        $fin = ', et il fait ' . $temperature . ' degrés<br>';
                    }

                    return $debut . $fin;
                }
                echo meteo2('automne', 10);
                echo meteo2('hiver', -1);
                echo meteo2('printemps', 20);
                echo meteo2('été', 30);

                // boucles
                echo '<h3>10 - Boucles</h3>';

                // Pour mettre en place une boucle : nous avons besoin de 3 informations
                // valeur de départ (compteur)
                // une condition d'entrée (tant que la réponse est vrai on continu les tours de la boucle)
                // un incrémentation ou décrémentation (afin de changer la valeur du compteur pour bloquer la boucle à un moment)

                // while()
                $i = 0; // valeur de départ

                while ($i < 10) { // condition d'entrée
                    echo $i . ' ';
                    $i++; // incrémentation // ++ rajoute 1 à chaque tour 
                    // équivaut à écrire $i = $i + 1
                }

                separateur();

                // for()
                // for(valeur_de_depart; condition; incrementation)

                for ($i = 0; $i < 10; $i++) {
                    echo $i . ' ';
                }

                // EXERCICE :
                // Faire une boucle qui affiche de 0 à 99
                // Le  chiffre 50 doit être en rouge

                separateur();

                for ($i = 0; $i < 100; $i++) {
                    if ($i == 50) {
                        echo '<span class="text-danger fw-bold">' . $i . '</span> ';
                    } else {
                        echo $i . ' ';
                    }
                }


                // inclusion
                echo '<h3>11 - Inclusion</h3>';
                // créez un fichier au même niveau que base.php nommé : exemple.inc.php
                // et mettez du contenu texte, html, image ... (voir même du php)

                echo '<hr>Premier appel avec include : <hr>';
                include 'exemple.inc.php';

                echo '<hr>Deuxième appel avec include_once : <hr>';
                include_once 'exemple.inc.php'; // le _once vérifie si le fichier a déjà été appelé, si c'est le cas, on ne le rappelle pas

                echo '<hr>Premier appel avec require : <hr>';
                require 'exemple.inc.php';

                echo '<hr>Deuxième appel avec require_once : <hr>';
                require_once 'exemple.inc.php'; // le _once vérifie si le fichier a déjà été appelé, si c'est le cas, on ne le rappelle pas

                // Différence entre include et require :
                // en cas d'erreur (fichier non trouvé), include va provoquer un warning et la suite du code pourra s'exécuter, en revanche, require provoquera une erreur fatale et bloquera l'exécution du code à la suite.


                // Tableau de données array
                echo '<h3>12 - Tableau de données array</h3>';
                // Outil de base : une variable simple : contient une information typée
                // Outil amélioré : une variable de type array : contient un ensemble d'information
                // Outil encore amélioré : une variable de type objet : contient un ensemble d'information mais aussi des fonctions (methodes) 

                // Un tableau array est toujours composé de deux colonnes :
                // une colonne contenant l'indice (la position)
                // une colonne contenant la valeur correspondante
                // On appelera toujours l'indice afin de récupérer la valeur

                // déclaration d'un tableau array avec array()
                $tab_fruits = array('pommes', 'cerises', 'ananas', 'poires', 'oranges');

                // echo $tab_fruits . '<br>'; // erreur : il n'est pas possible d'afficher le tableau complet avec un echo
                // En revanche nous pouvons appeler un des éléments du tableau avec un echo

                // Pour voir le contenu complet du tableau : deux outils d'affichage améliorés : 
                // var_dump() ou print_r()

                print_r($tab_fruits);

                // la balise html <pre> permet de respecter les retours à la ligne et les espaces
                echo '<pre>';
                print_r($tab_fruits);
                echo '</pre>';

                /*
                Array
                (
                    [0] => pommes
                    [1] => cerises
                    [2] => ananas
                    [3] => poires
                    [4] => oranges
                )
                */

                var_dump($tab_fruits);

                /*
                C:\wamp64\www\PHP_altrh_ld14\base.php:608:
                array (size=5)
                0 => string 'pommes' (length=6)
                1 => string 'cerises' (length=7)
                2 => string 'ananas' (length=6)
                3 => string 'poires' (length=6)
                4 => string 'oranges' (length=7)
                */

                // affichage de cerise, on pioche dans le tableau via l'indice
                echo $tab_fruits[1] . '<br>';

                // il est possible de rajouter des éléments :
                $tab_fruits[] = 'fraises';
                echo '<pre>';
                print_r($tab_fruits);
                echo '</pre>';

                // il est possible de mofidier une valeur
                $tab_fruits[1] = 'bananes';
                echo '<pre>';
                print_r($tab_fruits);
                echo '</pre>';

                // autre façon de rajouter des éléments dans le tableau :
                // array_push($tableau, 'valeur1', 'valeur2', 'valeur3', 'valeur4', ...);
                array_push($tab_fruits, 'abricots', 'mandarines', 'grenades');
                echo '<pre>';
                print_r($tab_fruits);
                echo '</pre>';

                // Boucle for (ou while) pour afficher tous les éléments du tableau
                // count() nous renvoie le nombre d'élément dans le tableau :
                $taille = count($tab_fruits);
                echo 'Il y a ' . $taille . ' éléments dans le tableau<hr>';

                echo '<ul class="list-group">';
                for ($i = 0; $i < $taille; $i++) {
                    echo '<li class="list-group-item">' . $tab_fruits[$i] . '</li>';
                }
                echo '</ul>';

                //-------------------
                // autres façon de déclarer un tableau array
                $tab_jours = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];
                echo '<pre>';
                print_r($tab_jours);
                echo '</pre>';

                //-------------
                $tab_categories[] = 'pantalon';
                $tab_categories[] = 'tshirt';
                $tab_categories[] = 'chemise';
                $tab_categories[] = 'short';
                $tab_categories[] = 'polo';
                $tab_categories[] = 'chapeau';
                echo '<pre>';
                print_r($tab_categories);
                echo '</pre>';

                // Il est possible d'avoir des indices en chaine de caractères (exemple : lorsque ça vient de la bdd)
                $password = password_hash('soleil', PASSWORD_DEFAULT); // hashage du mot de passe
                $user = array('id' => 123, 'pseudo' => 'admin', 'password' => $password, 'postal_code' => 75000);
                $user['address'] = '1 rue du truc';
                $user['city'] = 'Paris';
                $user['email'] = 'admin@mail.fr';

                echo '<pre>';
                print_r($user);
                echo '</pre>';

                // pour supprimer un élément du tableau :
                unset($user['password']);

                echo '<pre>';
                print_r($user);
                echo '</pre>';

                // foreach() est une boucle qui ne fonctionne que sur un tableau array ou sur un objet

                echo '<ul>';
                // avec une seule variable après le mot clé obligatoire "AS" : cette variable recevra à chaque tour la valeur en cours
                foreach ($user as $info) {
                    echo '<li>' . $info . '</li>';
                }

                echo '</ul>';

                separateur();

                echo '<ul>';
                // avec deux variables après le mot clé obligatoire "AS" : la premiere recevra à chaque tour l'indice en cours et la deuxième la valeur correspondante.
                foreach ($user as $index => $valeur) {
                    echo '<li>' . $index . ' : ' . $valeur . '</li>';
                }

                echo '</ul>';

                // Il est possible d'avoir un ou des tableaux dans un autre tableau : tableau array multidimensionnel

                $panier = array();
                $panier['produit'] = array();
                $panier['quantite'] = array();
                $panier['prix'] = array();

                echo '<pre>';
                print_r($panier);
                echo '</pre>';

                $panier['produit'][] = 'Pantalon';
                $panier['quantite'][] = '1';
                $panier['prix'][] = '35';

                $panier['produit'][] = 'Tshirt';
                $panier['quantite'][] = '3';
                $panier['prix'][] = '7';

                $panier['produit'][] = 'Echarpe';
                $panier['quantite'][] = '1';
                $panier['prix'][] = '14';

                echo '<pre>';
                print_r($panier);
                echo '</pre>';



                // Objet
                echo '<h3>12 - Objet</h3>';
                // Outil de base : une variable simple : contient une information typée
                // Outil amélioré : une variable de type array : contient un ensemble d'information
                // Outil encore amélioré : une variable de type objet : contient un ensemble d'information mais aussi des fonctions (methodes) 

                // La class est le modèle de construction

                class User
                {
                    // public est un mot clé en objet permettant de dire que l'on peut récupérer l'information directement sur l'objet
                    public $pseudo = 'admin';
                    public $mail = 'admin@mail.fr';
                    public $address = '1 rue du truc';
                    public $postal_code = '75000';
                    public $city = 'Paris';
                }

                // Pour construire l'objet :
                $mon_objet = new User();

                var_dump($mon_objet);

                // Pour piocher dans un array, on utilise les crochets []
                // Pour piocher dans un objet, on utilise la fleche -> 

                echo 'Bonjour ' . $mon_objet->pseudo . ', vous habitez à ' . $mon_objet->city;

                separateur();







                ?>


                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>