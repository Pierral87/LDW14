// Commentaire JS sur une seule ligne 

/*
    Commentaire JS
    sur plusieurs
    lignes
*/



/* 
    SOMMAIRE :
    ---------------
        Chapitre 1 : Affichage
        Chapitre 2 : Variables - Déclaration, affectation
        Chapitre 3 : Type de données
        Chapitre 4 : Quotes/Guillemets/Apostrophes
        Chapitre 5 : Concaténation
        Chapitre 6 : Opérateurs arythmétique
        Chapitre 7 : Conditions & opérateurs de comparaison (if)
        Chapitre 8 : Structure itérative : Boucles
        Chapitre 9 : Fonctions prédéfinies (fonctions globales)
        Chapitre 10 : Fonctions utilisateurs
        Chapitre 11 : Tableau de données ARRAY
        (Chapitre 12 : Les objets globaux)
        (Chapitre 13 : Les objets)

*/

// ECMAScript est un ensemble de normes concernant le langage de programmation JavaScript (et d'autres), cela va permettre que les navigateurs doivent respecter ces normes et donc que notre JS soit lu de la même façon par les différents navigateurs 

// Le JavaScript est exécuté par le navigateur lui même
// Nous avons un ensemble d'outils disponibles car prédéfinis par le langage :

// Par exemple window représente une fenêtre du navigateur, contenant un document web 
// document object model (DOM) c'est ce qui représente la page dans notre navigateur 

// Toutes les instructions JavaScript se finissent par un ";"

// Les erreurs JS sont visibles dans la console du navigateur (dans l'inspecteur F12)

// Le document nous permet d'aller récupérer afin de la manipuler n'importe quel élément de la page 
// Par exemple : document.getElementById("unId") // permet de récupérer un élément ayant l'id "unId" et ensuite d'intéragir dessus, par exemple en y ajoutant du code HTML en faisant document.getElementById("unId").innerHTML = "du texte, blabla<br> contenu texte ou autre html"


// -------------------------------------------------
// Chapitre 1 : Affichage --------------------------
// -------------------------------------------------

// Boite de dialogue : 
// -------------------------------
// alert("Bonjour tout le monde"); // Permet d'afficher un message à l'utilisateur sous forme de petite fenetre pop up
// confirm("Etes vous sûr ?"); // Permet d'afficher une demande de confirmation sous forme de fenetre pop up, on sera apte plus tard à récupérer le choix de l'utilisateur pour ensuite induire une action spécifique dans l'un ou l'autre des cas 
// prompt("Quel âge avez vous ?"); // Permet d'afficher un message à l'utilisateur lui demandant une saisie 
// let prenom = prompt("Quel est votre prénom ?"); ici je récupère dans une variable la saisie du prompt
// console.log(prenom); // Je peux ensuite faire ce que je souhaite avec cette variable, par exemple afficher le contenu dans un console.log

// Ces boites de dialogues sont utilisées pour délivrer une information à l'utilisateur

// Affichage dans la console du navigateur (F12)
// ------------------------------------
console.log("Affichage dans la console");
console.info("Attention je suis en console.info ici"); // console.info est similaire à console.log mais le comportement peut différer en fonction des navigateurs 

// Affiche dans la page (document, DOM)
// -------------------------------------------------------
// On va appeler ici l'élément ayant l'id contenuChapitre1 pour manipuler son contenu (actuellement vide)
document.getElementById("contenuChapitre1").textContent = "lorem ipsum<hr>"; // textConter nous permet d'insérer ici uniquement du texte, le HTML n'est pas interprété ! Il sera donc considéré comme du texte et simplement affiché
document.getElementById("contenuChapitre1").innerHTML = "<h3 style='color: steelblue;'>Lorem ipsum</h3>";

// let prenom = prompt("Quel est votre prénom ?"); // On récupère ici la saisie dans une variable 
// document.getElementById("contenuChapitre1").innerHTML += "Bonjour " + prenom;

// -------------------------------------------------
// Chapitre 2 : Variables - Déclaration et affectation
// -------------------------------------------------

// Une variable est un espace nommé permettant de conserver une valeur
// Une valeur possède un type, on parle de pseudo type ou type primitif 

// Deux façon de déclarer des variables en JS 

// -------------------
// DECLARATION avec "var"
// -------------------

var maBoite; // Déclaration d'une variable nommée "maBoite"
// Le mot clé var me permet de déclarer une variable, caractères autorisés : 0-9, A-Z, a-z $ _ 
// ATTENTION JavaScript est sensible à la casse, une minuscule n'a pas la meme valeur qu'une majuscule, var A et var a  sont deux variables différentes !!! 
// Attention il n'est pas possible de déclarer une variable commençant par un chiffre
// En JS on utilisera la convention de nommage "Camel Case", c'est à dire que chaque nom de variable/fonction/autre sera nommée de la façon suivante "une minuscule au début et une majuscule à chaque nouveau mot" par exemple camelCase, maSuperVariable, etc 

// -------------------
// AFFECTATION
// -------------------
maBoite = 10; // Affectation de la valeur numérique 10 dans la variable "maBoite"
console.log(maBoite); 
// Déclaration d'une variable permettant de recueillir un élément HTML afin de pouvoir le manipuler (ici d'y ajouter du contenu texte/html pour modéliser notre page)
var elementChapitre2 = document.getElementById("contenuChapitre2");
elementChapitre2.innerHTML = "Une variable est un espace nommé permettant de conserver une valeur."
// Ici le += me permet de rajouter une valeur au contenu déjà existant sans l'écraser (c'est une concaténation, voir chapitre 5)
elementChapitre2.innerHTML += "<br>Une valeur possède un type, on parle de pseudo type ou type primitif";


// -------------------
// DECLARATION avec "let"
// -------------------

let autreVar = "Test";

// Différences entre var et let 

// Une variable déclarée avec let n'existe que dans le bloc où elle a été déclarée 
// Un bloc en javascript est à l'intérieur d'accolades {}
// if (condition) {// bloc}
// function chose() { // bloc }
// while(condition) { // bloc }

{
    let testLet = "Un test";
    elementChapitre2.innerHTML += "<br> Affichage dans le même bloc d'une variable déclarée avec let : " + testLet;
}

// elementChapitre2.innerHTML += "<br>Affichage hors du bloc : " + testLet; // Erreur visible dans la console : testLet is not defined 
// Attention une erreur dans le code Javascript stoppe l'execution de la suite du code.

// Autre différence sur les redéclarations entre var et let 
var test1 = 123;
var test1 = 456; // Ici pas d'erreur même lorsque je rappelle le mot clé var pour une simple affectation... c'est en fait une réinitialisation d'une variable au même nom

let test2 = 123;
// let test2 = 456; // Ici pas possible ! Le système ne nous laisse pas redéclarer une variable au même nom lorsque l'on utilise "let", ce n'est pas une restriction, c'est plutôt une bonne façon de développer en suivant les normes, c'est ce qu'on appellera ici une "contrainte saine"
test2 = 456;

var prenom1 = "Pierra", prenom2 = "Bruce", prenom3 = "Frodon";


// -------------------
// DECLARATION avec "const"
// -------------------

// Similaire à let (const a uniquement une portée bloc comme let) sauf que l'on doit obligatoirement affecter une valeur lors de la déclaration et cette valeur ne pourra pas être modifiée lors de l'exécution du script 
// C'est ce qu'on appelle une "Constante"

const testConst = "Une constante";
console.log(testConst);

// testConst = "Autre valeur";

// Bonne pratique de code veut que pour les sélections d'élément HTML (getElementById, etc), on utilise toujours des const et non pas let ou var 

// EXERCICE 01 
// Quelles seront les valeurs des variables A B C et D après le code suivant ? 
let A = 0;
let B = 0;
let C = 0;
let D = 0;

A=3.5;
B=1.5;
C=A+B;
B=A+C;
A=B;

console.log("Voici la valeur de A : " + A);
console.log("Voici la valeur de B : " + B);
console.log("Voici la valeur de C : " + C);
console.log("Voici la valeur de D : " + D);

// ------------------------------------------------
// EXERCICE 02 
let conducteur="Pierra";
let passager="Jean";
// On souhaite échanger les deux valeurs de ces variables
// On veut que Jean passe conducteur et que Pierra passe passager 
// On doit trouver un moyen d'intervertir les deux, sans faire directement une réaffectation à la main
// On ne veut pas réaffecter comme ça : passager="Pierra" et conducteur="Jean"
// L'astuce consiste à créer une variable pour nous servir d'intermediaire 
let temp = conducteur;  // temp = Pierra
conducteur = passager;  // conducteur = Jean
passager = temp; // ici Pierra est stocké dans temp, donc je peux en donner la valeur au passager

console.log("Conducteur : " + conducteur);
console.log("Passager : " + passager);



// -------------------------------------------------
// Chapitre 3 : Type de données (pseudo type / type primitif)
// -------------------------------------------------

// A partir de maintenant je vais préférer stocker mes éléments HTML dans des const (comme indiqué au chapitre précédent)
const elementChapitre3 = document.getElementById("contenuChapitre3");

maBoite = 10;
elementChapitre3.innerHTML += "Valeur contenue dans la variable : " + maBoite;

// Pour voir le type de donnée d'une variable on utilisera l'opérateur "typeof"
// Cette opérateur va me renvoyer une chaine de caractère indiquant le type de la variable 
elementChapitre3.innerHTML += "<br>Type de la donnée contenue dans la variable maBoite : " + typeof maBoite;
// number : c'est le type numérique en JavaScript

maBoite = "10"; // On change la valeur contenue dans la variable maBoite
elementChapitre3.innerHTML += "<br>Type de la donnée contenue dans la variable maBoite : " + typeof maBoite;
// ici le 10 est entre des guillemets ! Donc ce n'est pas un number, c'est une chaine de caractère, on appelle ça le type "string"

maBoite = "Bonjour"; // On change la valeur contenue dans la variable 
elementChapitre3.innerHTML += "<br>Type de la donnée contenue dans la variable maBoite : " + typeof maBoite;
// Type string : chaine de caractère

maBoite = -10;
elementChapitre3.innerHTML += "<br>Type de la donnée contenue dans la variable maBoite : " + typeof maBoite;
// Type number ici 

maBoite = 5.6;
elementChapitre3.innerHTML += "<br>Type de la donnée contenue dans la variable maBoite : " + typeof maBoite;
// Ici aussi pour les chiffres décimaux, en JavaScript c'est le type number, cela sera par contre souvent différent dans les autres langages de programmation (float/double)

// Les booléens (boolean)
// Booléen => deux valeurs possibles : true ou false (vrai ou faux)
maBoite = true;
elementChapitre3.innerHTML += "<br>Type de la donnée contenue dans la variable maBoite : " + typeof maBoite;
maBoite = false;
elementChapitre3.innerHTML += "<br>Type de la donnée contenue dans la variable maBoite : " + typeof maBoite;

// Une variable qui n'existerait pas sera par contre undefined 
elementChapitre3.innerHTML += "<br>Type de la donnée contenue dans la variable maBoite : " + typeof existePas;



