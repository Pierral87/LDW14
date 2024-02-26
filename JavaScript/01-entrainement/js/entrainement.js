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
// Documentation : https://developer.mozilla.org/fr/docs/Web/JavaScript

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

A = 3.5;
B = 1.5;
C = A + B;
B = A + C;
A = B;

console.log("Voici la valeur de A : " + A);
console.log("Voici la valeur de B : " + B);
console.log("Voici la valeur de C : " + C);
console.log("Voici la valeur de D : " + D);

// ------------------------------------------------
// EXERCICE 02 
let conducteur = "Pierra";
let passager = "Jean";
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


// -------------------------------------------------
// Chapitre 4 : Quotes
// -------------------------------------------------

// Les quotes pour les chaines de caractères : 
const elementChapitre4 = document.getElementById("contenuChapitre4");

// Simple quote (apostrophe)
elementChapitre4.innerHTML += 'Hello<br>';
// Double quote (guillemets) 
elementChapitre4.innerHTML += "Bonjour<br>";
// '' ou "" : aucune différence en JavaScript, juste un choix de préférence 

// Par contre...

// Quote Inversée - Back Quote (accent grave)
let prenom = "Pierra";
elementChapitre4.innerHTML += "Bonjour ${prenom}<br>"; // Bonjour ${prenom}<br> 
elementChapitre4.innerHTML += `Bonjour ${prenom}<br>`; // Bonjour Pierra


elementChapitre4.innerHTML += "Bonjour " + prenom + " bienvenue sur notre site";
elementChapitre4.innerHTML += `Bonjour ${prenom} bienvenue sur notre site`;

// A l'intérieur des back quote, pour peu que l'on respecte la syntaxe d'écriture avec le $ et les accolades, alors une variable sera "interprétée" c'est à dire, que c'est le contenu de la variable qui sera affiché dans la phrase 

// -------------------------------------------------
// Chapitre 5 : Concaténation
// -------------------------------------------------

const elementChapitre5 = document.getElementById("contenuChapitre5");
// La concaténation permet d'assembler des chaines de caractères les unes avec les autres (texte ou contenues dans une variable)
// Le signe de la concaténation en JavaScript c'est le "+", que l'on peut toujours traduire par "suivi de"

let prenom4 = "Pierre";
let prenom5 = "Alexandre";

elementChapitre5.innerHTML += "<hr>Bonjour " + prenom4 + "-" + prenom5 + ", bienvenue sur notre site<br>";

// On peut rajouter une valeur à une variable ou un element, sans l'écraser en utilisant l'affectation concaténée 

let prenom6 = "Pierre";
prenom += "-Alexandre"; // Raccourci d'écriture équivalent à : prenom = prenom + "-Alexandre";
// avec le += on indique que l'on RAJOUTE une valeur à la suite de la valeur d'origine de cet élément (que ce soit une variable ou un element HTML)

// Exemple : Lorsque je génère des messages d'erreurs par exemple sur la saisi des champs d'un formulaire, je peux rajouter les messages d'erreurs les uns à la suite des autres via une affectation concaténée 

let erreur = "<hr><p>Erreur sur le pseudo</p>";
erreur += "<p>Erreur sur l'email</p>";
erreur += "<p>Mot de passe trop court</p>";
elementChapitre5.innerHTML += erreur;

// -------------------------------------------------
// Chapitre 6 : Opérateurs arythmétiques
// -------------------------------------------------

const elementChapitre6 = document.getElementById("contenuChapitre6");

let resultat = 10 + 5; // Addition
elementChapitre6.innerHTML += resultat + "<br>"; // Affiche 15

resultat = 10 - 5;
elementChapitre6.innerHTML += resultat + "<br>"; // Soustraction, affiche 5

resultat = 10 * 5;
elementChapitre6.innerHTML += resultat + "<br>"; // Multiplication, affiche 50

resultat = 10 / 5;
elementChapitre6.innerHTML += resultat + "<br>"; // Division, affiche 2

resultat = 10 ** 5;
elementChapitre6.innerHTML += resultat + "<br>"; // Puissance, affiche 100 000

resultat = 10 % 3;
elementChapitre6.innerHTML += resultat + "<br>"; // Modulo, affiche 1 (le restant de la division en terme d'entier, oui, si je divise 10 par 3, cela fait trois part valant 3, et il reste 1, c'est ça le modulo)

// Attention, si on cumule des opérations et des concaténations, JavaScript n'arrive pas à bien comprendre le sens ! Pour éviter les incohérences, on n'hésite pas à utiliser des parenthèses
// Si je ne mets pas de parenthèses à l'opération ci-dessous, JS me renvoie "NaN" voulant dire "Not a Number"
elementChapitre6.innerHTML += "Voici un autre résultat : " + (50 - 5) + "<br>";

let chiffre1 = 10;
let chiffre2 = 5;

chiffre1 += chiffre2; // équivalent à : chiffre1 = chiffre1 + chiffre2;
console.log(chiffre1);
// chiffre1 -= chiffre2;
// chiffre1 *= chiffre2;
// chiffre1 /= chiffre2;
// chiffre1 **= chiffre2;
// chiffre1 %= chiffre2;

// -------------------------------------------------
// Chapitre 7 : Conditions et opérateurs de comparaison
// -------------------------------------------------

const elementChapitre7 = document.getElementById("contenuChapitre7");
// Une condition permet de prévoir différents cas possibles 
// Une condition ne peut recevoir qu'une réponse de type true ou

var a = 8, b = 5, c = 2;

if (a > b) { // si "a" est strictement supérieur à "b", ici, c'est ma condition d'entrée dans le bloc if
    // si la condition ci dessus est vrai, je tombe ici dans ce bloc et le code va s'éxécuter 
    elementChapitre7.innerHTML += "La valeur de la variable 'a' est bien supérieure à la valeur de la variable 'b' <br>";
} else {  // JAMAIS de parenthèses de condition dans le else, car il représente toutes les autres possibilités sans exception
    elementChapitre7.innerHTML += "Non, la valeur de la variable 'a' n'est pas supérieure à la valeur de la variable 'b' <br>";
}
// Si on ne rentre pas dans le if, on rentre obligatoirement dans le else s'il y en a un, et le code se poursuit après (sinon le code se poursuit simplement sans rien exécuter)

// Plusieurs conditions obligatoires => AND : && 
if (a > b && b > c) {
    elementChapitre7.innerHTML += "Ok pour les deux conditions <br>";
}

// Au moins une des conditions => OR : ||
if (a > b || b > c) {
    elementChapitre7.innerHTML += "Ok pour au moins une des deux conditions <br>";
}

// if / else if / else
if (a == 8) { // ici le "==" me permet de faire une comparaison, est ce que "a" a la valeur 8
    elementChapitre7.innerHTML += "Réponse 1<br>";
} else if (a != 10) { // ici le "!=" me permet de poser la question, est ce que "a" est différent de 10 
    // else if ici me permet de tester une autre condition spécifique avant de passer au else, je peux mettre autant de else if que je le souhaite
    elementChapitre7.innerHTML += "Réponse 2<br>";
} else {
    elementChapitre7.innerHTML += "Réponse 3<br>";
}

// Dans le cas d'un 'a' à valeur 8, les cas réponse 1 et réponse 2 sont tous les deux vrais ! 
// Par contre, le système nous fait sortir du bloc entier if, dès la première condition respectée, il n'ira pas tester les autres ! 
// On sort donc à la Réponse 1 

let testbool = false;

if (!testbool) {
    // lorsque j'écris un "!" devant quelque chose, il signifie généralement "l'inverse de"
    // Dans le cas d'une variable testée seule, cela peut se retranscrire comme : "est ce que cette variable est false ?" cela équivaut à testbool == false  
}

let valeurImplicite = "Hello";
if (valeurImplicite) {
    elementChapitre7.innerHTML += "Je rentre ici car la variable valeurImplicite existe, elle a donc la valeur implicite : True<hr>";
}

console.log("Valeur boolean : " + Boolean(valeurImplicite));
// Une condition ne peut recevoir qu'une réponse de type true ou false, une conversion de valeur est effectuée par le langage pour comprendre si l'on rentre dans le cas ou pas
// Boolean() permet d'évaluer une valeur à true ou false 

// Dans l'absolu tout est évalué à true sauf certains cas particulier : 
// 0, -0, null, false, NaN, undefined, un string vide, un array vide 

// Comparaison stricte (en terme de valeur et de type)
let var1 = 1;  // number
let var2 = "1"; // string 

// Comparaison uniquement des valeurs (double égal)
if (var1 == var2) {
    // Ici JS accepte, la comparaison de deux valeurs typées différemment, et on rentre dans le if
    elementChapitre7.innerHTML += "var1 et var2 sont égales, c'est la même chose.<hr>";
}

// Comparaison stricte : comparaison des valeurs et des types (triple égal)
if (var1 === var2) {
    elementChapitre7.innerHTML += "Yes, var1 et var2 sont identiques aussi bien en valeur qu'en type<br>";
} else {
    elementChapitre7.innerHTML += "Nope, var1 et var2 sont différents, soit en type, soit en valeur, soit les deux !<br>";
}

/* 
    OPERATEURS DE COMPARAISON :
    ----------------------------------

    =                   Affectation (ATTENTION ce n'est pas un opérateur de comparaison)
    ==                  est égal à (compare uniquement les valeurs)
    ===                 est strictement égal à (compare les valeurs et les types)
    !=                  est différent de (en valeur)
    !==                 est strictement différent de (valeur et ou type)
    >                   strictement supérieur à 
    >=                  supérieur ou égal à 
    <                   strictement inférieur à 
    <=                  inférieur ou égal à 

*/

// Quelques autres syntaxes de if 

// La même condition qu'au dessus mais dans les accolades {}
// Syntaxe ne fonctionne QUE s'il n'y a qu'une seule instruction après la condition
if (var1 === var2) elementChapitre7.innerHTML += "Yes, var1 et var2 sont identiques aussi bien en valeur qu'en type<br>";
else elementChapitre7.innerHTML += "Nope, var1 et var2 sont différents, soit en type, soit en valeur, soit les deux !<br>";

// Je peux aussi, peu importe la syntaxe, me passer de mettre le else si jamais je n'ai pas d'utilité à le gérer
if (var1 === var2) elementChapitre7.innerHTML += "Yes, var1 et var2 sont identiques aussi bien en valeur qu'en type<br>";


// Ecriture ternaire
// C'est la syntaxe la plus courte des if, on s'en sert lorsque l'action engendré par le if et le else sont les mêmes, par exemple un affichage ou bien une affectation
// Dans le if ci dessous, l'action est la même dans les deux cas, 
// l'action c'est "elementChapitre7.innerHTML +="
// vient ensuite la condition du if "(var1 === var2) ?"
// Puis vient ensuite direction le résultat si la condition est vérifiée et après les ":" le resultat du else
elementChapitre7.innerHTML += (var1 === var2) ? "YES<br>" : "NO<br>";

// let statut = (connecAdmin == true) ? "admin" : "user";

// isNaN (is Not a Number)
// Cette fonction me permet de faire directement une vérification sur l'élément en demandant est ce que la var1 is NaN (n'est pas un number), auquel cas je rentre dans la condition du if 
if (isNaN(var1)) {
    elementChapitre7.innerHTML += "Je rentre ici si la valeur de var n'est PAS numérique (Not a Number)<hr>";
} else {
    elementChapitre7.innerHTML += "Je rentre ici si la valeur est bien numérique<hr>";
}

elementChapitre7.innerHTML += "<b>Les conditions Switch</b><hr>";


let couleur = "rouge";
// let couleur = prompt("Choisissez une couleur entre le bleu, vert, rouge");
// Ici l'utilisateur choisit une couleur que je saisi dans le prompt
// Je compare ensuite la valeur de sa saisie ici dans mon switch

// Switch s'utilise dans un seul cas bien précis, lorsque l'on veut tester différentes valeurs d'une même variable !
// Cette syntaxe ne se prête pas DU TOUT à d'autres types de conditions
switch (couleur) {
    case "bleu":
        elementChapitre7.innerHTML += "Vous avez choisi le bleu<br>";
        break;
    case "vert":
        elementChapitre7.innerHTML += "Vous avez choisi le vert<br>";
        break;
    case "rouge":
        elementChapitre7.innerHTML += "Vous avez choisi le rouge<br>";
        break;
    default:
        elementChapitre7.innerHTML += "Vous n'avez choisi ni le bleu ni le vert ni le rouge !<br>";
        break;
}

// EXERCICE 1 : Refaire la condition switch ci dessus, mais, en if / else if / else 
// Permettez également à l'utilisateur de saisir une couleur 

if (couleur == "bleu") {
    elementChapitre7.innerHTML += "Vous avez choisi le bleu<br>";
} else if (couleur == "vert") {
    elementChapitre7.innerHTML += "Vous avez choisi le vert<br>";
} else if (couleur == "rouge") {
    elementChapitre7.innerHTML += "Vous avez choisi le rouge<br>";
} else {
    elementChapitre7.innerHTML += "Vous n'avez choisi ni le bleu ni le vert ni le rouge !<br>";
}

// EXERCICE 2 : Tester la majorité de l'utilisateur
// Je veux savoir si un utilisateur est majeur 
// Demandez l'âge de l'utilisateur (et le stocker dans une variable)
// Faire une condition qui vient tester si l'âge est supérieur ou égal à 18 
// Si oui, lui souhaiter la bienvenue, si non, un message lui disant de poursuivre ailleurs 
// let ageUser = prompt("Quel est votre âge ?");
// let ageLegal = 18;
// if (ageUser >= ageLegal) {
//     elementChapitre7.innerHTML += "Bienvenue";
// } else {
//     elementChapitre7.innerHTML += "Seulement pour les majeurs";
// }

// EXERCICE 3 : Tester un mot de passe utilisateur 
// Permettez à l'utilisateur de saisir un mot de passe
// Ensuite, faite lui ressaisir ce même mot de passe
// Si les deux se correspondent : Souhaitez lui la bienvenue
// Si c'est incorrect dites lui, les deux password ne se correspondent pas et faites lui ressaisir le second mot de passe jusqu'à ce qu'il corresponde.

// let password = prompt("Tapez votre mot de passe");
// let confirmPassword = prompt("Retapez le même mot de passe");

// if (password == confirmPassword) {
//     alert("C'est bon ! Les passwords sont les mêmes")
// } else {
//     alert("Les deux passwords ne se correspondent pas...");
//     confirmPassword = prompt("Retapez le mot de passe");
// }

// while (password != confirmPassword) {
//     alert("Mauvais mot de passe...");
//     confirmPassword = prompt("Retentez de saisir la confirmation du password");
// }

// if (password == confirmPassword) {
//     alert("Mdp OK !");
// }



// -------------------------------------------------
// Chapitre 8 : Structure itérative : Boucles
// -------------------------------------------------

const elementChapitre8 = document.getElementById("contenuChapitre8");

// Une boucle permet de répéter un ensemble d'instructions selon une condition d'entrée 
// 3 informations nécessaires : 
// 1 - Valeur de départ (un compteur, pour les boucles numériques en tout cas)
// 2 - Condition d'entrée (basée sur notre compteur ou pas)
// 3 - Incrémentation ou décrémentation du compteur (pour les boucles numériques)

// BOUCLE WHILE() {}
// On utilise pas tant while pour des conditions avec compteur numérique, mais c'est quand même possible
// On préfèra l'utiliser sur des conditions non numérique, par exemple le test du password de l'exercice ci dessus chapitre 7
// En gros cela veut dire "tant que la condition est vraie, on poursuit, si la condition renvoie false, on arrête"
let compteur = 0; // valeur de départ 

while (compteur < 10) { // condition d'entrée
    elementChapitre8.innerHTML += compteur;
    compteur++; // Equivaut à ecrire : compteur = compteur +1 // incrémentation
}

// BOUCLE FOR() {}
// for ne peut être utilisé QUE pour des boucles à compteur numérique car sa syntaxe est prévue exactement pour ça 
// for(compteur; condition; incrementation) {}
for (let i = 0; i < 10; i++) {
    elementChapitre8.innerHTML += i;
}
elementChapitre8.innerHTML += "<hr>";

// EXERCICE 1 : Refaire la boucle ci dessus, mais en ayant une valeur par ligne
elementChapitre8.innerHTML += "<h2>Exercice 1</h2>";

let compteur1 = 0;
while (compteur1 < 10) {
    elementChapitre8.innerHTML += compteur1 + "<br>";
    compteur1++;
}
// EXERCICE 2 : Faire une boucle qui affiche de 0 à 99 avec le chiffre 50 de couleur rouge
for (let i = 0; i < 100; i++) {
    if (i === 50) {
        elementChapitre8.innerHTML += "<br><span style='color:red;'>" + i + '</span><br>';
    } else {
        elementChapitre8.innerHTML += i + "";
    }
}
elementChapitre8.innerHTML += "<hr>";

// EXERCICE 3 : Afficher la chaine de caractère suivante à l'aide d'une boucle 0 - 1 - 2 - 3 - 4 - 5 - 6 - 7 - 8 - 9
let compteur2 = 0;
while (compteur2 <= 9) {
    if (compteur2 == 9) {
        elementChapitre8.innerHTML += compteur2;
    } else {
        elementChapitre8.innerHTML += compteur2 + " - ";
    }
    compteur2++;
}
elementChapitre8.innerHTML += "<hr>";

// EXERCICE 4 : Afficher des nombres allant de 2000 à 1930
for (let i = 2000; i >= 1930; i--) {
    elementChapitre8.innerHTML += i + " ";
}
// EXERCICE 5 : Afficher le titre suivant 10 fois : "<h2>Je m'affiche 10 fois</h2>";
for (let i = 0; i < 10; i++) {
    elementChapitre8.innerHTML += "<h3>Je m'affiche 10 fois</h3>";
}
// EXERCICE 6 : Afficher le titre suivant 10 fois mais en changeant le numéro à l'intérieur du titre "<h2>Je m'affiche pour la Nème fois</h2>" (gérer l'exception pour 1 qui doit s'écrire 1ère)
for (let i = 1; i <= 10; i++) {
    if (i == 1) {
        elementChapitre8.innerHTML += "<h3>Je m'affiche pour la " + i + "ère fois</h3>";
    } else {
        elementChapitre8.innerHTML += "<h3>Je m'affiche pour la " + i + "ème fois</h3>";
    }
}
// EXERCICE 7 : Déclarer une variable sum avec la valeur 0, utilisez une boucle pour parcourir les chiffres de 1 à 10, à chaque tour de boucle, on ajoute la valeur du tour de boucle à sum, à la fin de la boucle on affiche la somme dans la console
let sum = 0;
for(let i = 1; i <= 10; i++) {
    sum += i;
    // sum = sum + i;
}
console.log(sum);
// EXERCICE 8 : Afficher dans un tableau HTML une seule ligne avec un chiffre dans chaque cellule 0 jusqu'à 9
let tableau = "";
// elementChapitre8.innerHTML += "<table border='1' style='width: 50%; margin: 0 auto;'><tr>";
tableau += "<table border='1' style='width: 50%; margin: 0 auto;'><tr>"
// boucle des td
for(let i = 0; i < 10 ; i++){
    // elementChapitre8.innerHTML += "<td>" + i + "</td>";
    tableau += "<td>" + i + "</td>";
}
// elementChapitre8.innerHTML += "</tr></table>";
tableau += "</tr></table>";

elementChapitre8.innerHTML += tableau;
// Pour l'exercice 8 on fait face à une problématique du JS face au navigateur. Le navigateur referme automatiquement les balises ouvrantes de notre tableau, il n'est donc pas possible pourl e javascript d'insérer les éléments un à un, on va donc devoir tout insérer dans une variable et ensuite envoyer cette variable à l'innerHTML

// EXERCICE 9 : Définir aléatoirement un nombre entre 1 et 50, demandez ensuite à l'utilisateur de retrouver ce nombre et l'informer si celui saisi est plus grand ou plus petit que celui défini. Le jeu s'arrète une fois que l'utilisateur a trouvé le nombre en lui affichant un message.

// let nbrMystere = Math.round(1+49*Math.random());
// console.log(nbrMystere);

// let nbUser = prompt("Trouvez le numéro mystère entre 1 et 50");

// while(nbrMystere != nbUser) {
//     if (nbUser > nbrMystere) {
//         alert("Non ! Le nombre est plus petit !");
//     } else {
//         alert("Non ! Le nombre est plus grand !");
//     }
    
//     nbUser = prompt("Trouvez le numéro mystère entre 1 et 50");
// }

// alert("Bravo ! Vous avez trouvé le bon nombre !");

// BOUCLE DO{} WHILE()
// La boucle do while va faire un tour avant de tester la condition d'entrée
// C'est à dire qu'elle s'executera au moins une fois même si la condition n'est pas respectée (car elle est vérifiée à la fin)
let i = 5;
do {
    elementChapitre8.innerHTML += "<hr>La boucle do while va exécuter ce code au moins une fois !<hr>";
    i--;
} while (i > 10);


// -------------------------------------------------
// Chapitre 9 : Fonctions prédéfinies (fonctions globales)
// -------------------------------------------------

const elementChapitre9 = document.getElementById('contenuChapitre9');
// Deja inscrite au langage, le développeur ne fait que les exécuter, à l'inverse d'une fonction utilisateur qui elle est créée par le développeur
// On parle en JS de fonctions "globales", elles ne sont pas liées à un élément variable tel qu'un élément string ou un élément number, elles appartiennent directement au langage. Il y en a très peu !


// parseInt()
// https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Global_Objects/parseInt
// parseInt() attend un ou deux arguments
// premier argument, un string à "transformer"/"interpreter" sous forme de number (attention, nombre entier) et le deuxième argument pour comprendre la "base numérique" souhaité pour le parseInt.
// On utilisera toujours 10 comme base numérique, cela représente la base décimale, en gros, les chiffres de 0 à 9

let chaine = "123";
elementChapitre9.innerHTML += "La variable 'chaine' est de type : " + typeof chaine + "<br>";
chaine = parseInt(chaine, 10);
elementChapitre9.innerHTML += "La variable 'chaine', après parseInt est de type : " + typeof chaine + "<br>";

elementChapitre9.innerHTML += "Addition entre 2 + 2 un type number et un type string : " + ('2' + 2) + "<br>"; // Ici cela affiche 22 car JS n'arrive pas à additionner deux éléments s'ils ne sont pas tout deux des number, cela pratiquera plutôt, la concaténation
elementChapitre9.innerHTML += "Addition entre 2 + 2 un type number et un type string avec parseInt() : " + (parseInt('2', 10) + 2) + "<br>"; // Ici c'est ok, le parseInt permet de transformer le string en number et on peut faire notre addition, cela affichera bien 4

elementChapitre9.innerHTML += "je transmet une décimale ici, 10.5 voyons voir avec parseInt() : " + parseInt("10.5", 10) + "<br>";

// parseFloat()
// https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Global_Objects/parseFloat
// parseFloat(), c'est la même chose que parseInt(), il transforme un string en number
// L'avantage de parseFloat, c'est qu'il est apte à traiter les chiffres décimaux

elementChapitre9.innerHTML += "je transmet une décimale ici, 10.5 voyons voir avec parseFloat() : " + parseFloat("10.5") + "<br>";


// -------------------------------------------------
// Chapitre 10 : Fonctions utilisateurs
// -------------------------------------------------

// En programmation revient souvent le terme, avoir un code "DRY"
// "Dont Repeat Yourself" - Philosophie informatique pour éviter la redondance d'actions. A chaque fois que l'on repète une action/un morceau de code, on aurait fort probablement plutôt intérêt à dévleopper une fonction.

const elementChapitre10 = document.getElementById("contenuChapitre10");

// Déclaration et exécution d'une fonction 

// Ici déclaration d'une fonction s'appellant "maFonction", cette façon là est appellée : function statement
function maFonction() {
    return "Bonjour à tous <br>";
}

// Exécution : 
elementChapitre10.innerHTML += maFonction();
elementChapitre10.innerHTML += maFonction();
elementChapitre10.innerHTML += maFonction();
elementChapitre10.innerHTML += maFonction();

// deuxième façon : function operator
// on déclare une fonction à l'intérieur d'une variable 
let maFonction2 = function() {
    return "Hello there! <br>";
}

// Exécution 
elementChapitre10.innerHTML += maFonction2();


// Fonction avec argument 
function direBonjour(qui) {
    return "Bonjour " + qui + ", bienvenue sur notre site<hr>";
}
// "qui" est un param/paramètre/argument, c'est une variable qui va réceptionner la valeur fourni à la fonction lors de son exécution
elementChapitre10.innerHTML += direBonjour("Pierra");
elementChapitre10.innerHTML += direBonjour("Anisse");

let prenomUser = "Laetitia";
elementChapitre10.innerHTML += direBonjour(prenomUser);
// A chaque appel de cette fonction, l'argument fourni à l'exécution (Pierra, puis Anisse, puis prenomUser (contenant Laetitia)) se repercute dans la variable "qui" et ainsi me retourne à chaque fois une phrase différente 

// fonction separateur toute simple permettant d'afficher 3<hr> dans la page 
function separateur() {
    return "<hr><hr><hr>";
}

elementChapitre10.innerHTML += separateur();

// Il est possible d'appeler une fonction avant sa declaration ! Le systeme fait une premiere lecture du document et "mémorise" les fonctions
addition(100,500);

// Plusieurs param dans la fonction sont possible, par exemple une fonction d'addition entre deux number 
function addition(nb1, nb2) {
    console.log(`${nb1} + ${nb2} = ` + (nb1+nb2));
}

addition(20,500);

// On va réaliser une fonction nous permettant de calculer un prix avec TVA
// Le but étant de fournir un prix HT (hors taxe) et de le transformer en prix TTC (Toutes Taxes Comprises)
function calculTva(prix) {
    elementChapitre10.innerHTML += (prix * 1.2);
}

calculTva(1000);

elementChapitre10.innerHTML += separateur();

// EXERCICE, en se basant sur la fonction calculTVA, on aimerait apporter une amélioration et permettre en plus de la saisie du prix à modifier, de choisir aussi le taux de TVA à appliquer

// calculTva(1000, 25); // On aimerait pouvoir faire des exécutions comme ceci, en choisissant nous même le nouveau taux

function calculTva2(prixHT, tauxTVA = 20) {
    let prixTTC = prixHT * (1 + tauxTVA / 100);
    return prixTTC;
}

let prixTTC = calculTva2(1000);
console.log("Le prix TTC est de " + prixTTC + "€");
let prixTTC2 = calculTva2(1000, 5.5);
console.log("Le prix TTC est de " + prixTTC2 + "€");

// Dans un second temps, on aimerait pouvoir faire en sorte que si l'utilisateur ne saisi pas le taux de TVA, que cela applique par défaut le taux de 20%.  Par contre si un taux est bien saisi, c'est bien celui ci qui sera pris en compte
// Pour ce faire, très simple, il suffit dans la déclaration de la fonction, de donner directement une valeur à un des params, ce sera cette valeur qui sera utilisée par défaut si le param n'est pas fourni à l'exécution
// ATTENTION à l'ordre de vos params lors de la déclaration de vos fonctions, les params facultatifs doivent toujours être fournis en dernier ! 


// On développe une nouvelle fonction, la fonction météo 
// Cette fonction va prendre en paramètre une saison et une température et afficher une phrase 

function meteo(saison, temperature) {
    let debut = "Nous sommes en " + saison;
    let suite = " et il fait " + temperature + " degré(s)<br>";
    return debut + suite;
}

elementChapitre10.innerHTML += meteo("été", 42);
elementChapitre10.innerHTML += meteo("automne", 10);
elementChapitre10.innerHTML += meteo("hiver", 1);
elementChapitre10.innerHTML += meteo("printemps", 20);

// Nous sommes en été et il fait 42 degré(s)
// Nous sommes en automne et il fait 10 degré(s)
// Nous sommes en hiver et il fait 1 degré(s)
// Nous sommes en printemps et il fait 20 degré(s)

// Par rapport au résultat ci dessus, on voit que la préposition "en" ne convient pas pour la saison printemps...
// Egalement, on devrait être apte à pouvoir mettre le mot degré au singulier ou au pluriel en fonction de la température ! 

// EXERCICE : Réglez cette fonction pour la faire correspondre aux améliorations indiquées ci dessus
function meteo2(saison, temperature) {
    let debut = '';
    let suite = '';
    if (saison == "printemps") {
        debut = "Nous sommes au " + saison;
    } else {
        debut = "Nous sommes en " + saison;
    }

    if (temperature <= 1 && temperature >= -1) {
        suite = " et il fait " + temperature + " degré<br>";
    } else {
        suite = " et il fait " + temperature + " degrés<br>";
    }

    return debut + suite;
}

elementChapitre10.innerHTML += meteo2("été", 42);
elementChapitre10.innerHTML += meteo2("automne", 10);
elementChapitre10.innerHTML += meteo2("hiver", 1);
elementChapitre10.innerHTML += meteo2("printemps", 20);

function meteo3(saison, temperature) {
    let debut = "Nous sommes en " + saison;
    let suite = " et il fait " + temperature + " degrés<br>";

    if (saison == "printemps") {
        debut = "Nous sommes au " + saison;
    } 

    if (temperature <= 1 && temperature >= -1) {
        suite = " et il fait " + temperature + " degré<br>";
    } 

    return debut + suite;
}

// En plus court
function meteo4(saison, temperature) {
    let prep = "en "
    let s = "s";

    if (saison == "printemps") {
       prep = "au ";
    } 

    if (temperature <= 1 && temperature >= -1) {
      s = "";
    } 

    return "Nous sommes " + prep + saison + " et il fait " + temperature + " degré" + s + "<br>";
}

elementChapitre10.innerHTML += meteo4("été", 42);
elementChapitre10.innerHTML += meteo4("automne", 10);
elementChapitre10.innerHTML += meteo4("hiver", 1);
elementChapitre10.innerHTML += meteo4("printemps", 20);

// Le plus court du plus court grâce au if ternaire !!!
function meteo5(saison, temperature) {
    let prep = (saison == "printemps") ? "au" : "en";
    let s = (temperature <= 1 && temperature >= -1) ? "" : "s";
    return `Nous sommes ${prep} ${saison} et il fait ${temperature} degré${s}<br>`;
}

elementChapitre10.innerHTML += meteo5("été", 42);
elementChapitre10.innerHTML += meteo5("automne", 10);
elementChapitre10.innerHTML += meteo5("hiver", 1);
elementChapitre10.innerHTML += meteo5("printemps", 20);