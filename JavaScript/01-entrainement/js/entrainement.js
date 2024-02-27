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
for (let i = 1; i <= 10; i++) {
    sum += i;
    // sum = sum + i;
}
console.log(sum);
// EXERCICE 8 : Afficher dans un tableau HTML une seule ligne avec un chiffre dans chaque cellule 0 jusqu'à 9
let tableau = "";
// elementChapitre8.innerHTML += "<table border='1' style='width: 50%; margin: 0 auto;'><tr>";
tableau += "<table border='1' style='width: 50%; margin: 0 auto;'><tr>"
// boucle des td
for (let i = 0; i < 10; i++) {
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
let maFonction2 = function () {
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
addition(100, 500);

// Plusieurs param dans la fonction sont possible, par exemple une fonction d'addition entre deux number 
function addition(nb1, nb2) {
    console.log(`${nb1} + ${nb2} = ` + (nb1 + nb2));
}

addition(20, 500);

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

elementChapitre10.innerHTML += separateur();

elementChapitre10.innerHTML += "<h3>Les Immediately Invoked Functions Expressions (IIFE) - Fonctions anonymes</h3>";
// En JS nous avons la possibilité de créer des fonctions anonymes et de les exécuter immédiatement sans passer par l'étape de la déclaration
// Le but de ces fonctions est en fait "d'englober" une portion de code dans un bloc, pour éviter des problèmes de conflits avec par exemple des noms de variables qui pourraient se dédoubler

(function () {
    elementChapitre10.innerHTML += "Cette ligne de code, intégrée dans une fonction anonyme est directement exécutée !<hr>";
}());   // syntaxe crockford

(function () {
    elementChapitre10.innerHTML += "Cette ligne de code, intégrée dans une fonction anonyme est directement exécutée aussi !<hr>";
})();

// En gros, on déclare le corps de notre fonction à l'intérieur des accolades, et la paire de parenthèses ouvrante/fermante () permet de l'exécuter immédiatement et de mettre fin à cette portion de code.

elementChapitre10.innerHTML += "<h3>Les fonctions fléchées</h3>";
// On peut déclarer une fonction classique via le système de fonctions fléchées, généralement utilisé pour des fonctions très simple 
// let nomDeFonction = (....argument...) => return 
let ajouteTva = (prixHT, taux = 20) => "La valeur TTC de " + prixHT + " au taux de " + taux + "% est de : " + (prixHT * (1 + (taux / 100))) + "<br>";

elementChapitre10.innerHTML += ajouteTva(1000);
elementChapitre10.innerHTML += ajouteTva(10000, 25);

elementChapitre10.innerHTML += "<h3>Environnement Global et Local (scope)</h3>";

// Selon l'endroit où est déclarée une variable, celle ci pourra être accessible dans tout le script ou uniquement dans une partie.
// On parle de portée, d'environnement, de scope, d'espace

// Scope Local et le scope Global
// Le scope Global c'est ce qui défini l'intégralité de votre code
// Le scope Local est généralement, du code englobé dans des accolades (dans un if, dans une boucle, dans une fonction)

let animal = "loup"; // variable déclarée dans l'espace global 

function foret() {
    let animal = "lapin"; // variable déclarée dans l'espace local car dans une fonction, on se trouve ici dans le script local de la fonction foret()
    return animal;
}

elementChapitre10.innerHTML += animal + "<hr>"; // Affiche loup
foret(); // là rien ne se passe, je n'ai pas demandé d'afficher le return de foret()
elementChapitre10.innerHTML += animal + "<hr>"; // Affiche loup
elementChapitre10.innerHTML += foret() + "<hr>"; // Affiche lapin (car on affiche le string que nous renvoie la fonction foret())
elementChapitre10.innerHTML += animal + "<hr>"; // Affiche loup
animal = foret(); // Ici on réaffecte la variable animal avec une nouvelle valeur, celle qui nous est renvoyée par la fonction foret(), animal vaut maintenant "lapin" à partir de cette ligne
elementChapitre10.innerHTML += animal + "<hr>"; // Affiche lapin (la nouvelle valeur de animal)


// -------------------------------------------------
// Chapitre 11 : Tableaux de données - Array
// -------------------------------------------------

const elementChapitre11 = document.getElementById("contenuChapitre11");
// Un tableau array est un peu comme une variable, sauf qu'au lieu de conserver une seule valeur, le tableau peut contenir un ensemble de plusieurs valeurs 
// C'est un nouveau type ! Après les number, string, boolean, voilà maintenant les "array"

// Déclaration
let tabFruits = ["fraises", "bananes", "poires", "pommes", "kiwis", "mangues"];

console.log(tabFruits); // grâce au console log je peux récupérer des informations concernant ce array. Information très importante, je peux voir les INDICES/CLES/KEYS de chacun de mes éléments, ici ce sont des indices numériques
// 0: "fraises"  -- Ici à l'indice 0 est stocké le string "fraises"
// 1: "bananes" -- Ici à l'indice 1 est stocké le string "bananes"
// 2: "poires" -- etc
// 3: "pommes"
// 4: "kiwis"
// 5: "mangues"
// Dans ce console log on remarque aussi une propriété "length" qui m'indique la taille du tableau 
// Aussi on remarque une liste deroulante Prototype - Array, sur laquelle nous reviendrons plus tard, on peut malgré tout comprendre que ce sont des fonctions rattachées aux éléments de type Array 

elementChapitre11.innerHTML += tabFruits + "<hr>"; // Affiche la totalité du tableau array avec des valeurs séparées par des virgules

elementChapitre11.innerHTML += tabFruits[4] + "<hr>"; // Affiche kiwis - Pour un tableau array lorsque l'on souhaite piocher un indice spécifique, on doit lui spécifier le numéro entre crochets !!! On note bien que les crochets [] c'est vraiment ce qui représente la syntaxe des tableaux array ! 
elementChapitre11.innerHTML += tabFruits[0] + "<hr>"; // fraises
elementChapitre11.innerHTML += tabFruits[1] + "<hr>"; // bananes
elementChapitre11.innerHTML += tabFruits[2] + "<hr>"; // poires
tabFruits[2] = "coco"; // On change la valeur présente dans le tableau au niveau de l'indice 2 
elementChapitre11.innerHTML += tabFruits[2] + "<hr>"; // coco 
console.log(tabFruits);

// Pour connaitre la taille d'un tableau, je peux appeler sa propriété "length" - (on l'avait vu dans le console log, c'est une propriété commune à tous les éléments de type tableau array)
elementChapitre11.innerHTML += "Nombre d'éléments dans le array tabFruits : " + tabFruits.length + "<hr>";

// Il est possible d'ajouter des éléments au tableau 
tabFruits[6] = "kakis"; // On peut ajouter en spécifiant un nouvel indice entre les crochets et lui donner une valeur 
console.log(tabFruits);

// Si je ne sais pas à quel numéro en sont les indices, je vais utiliser une fonction (c'est d'ailleurs toujours de cette manière que l'on procèdera par défaut)
// En utilisant la fonction array.push() 
// array.push() va ajouter un élément en fin de tableau
tabFruits.push("cerises");
console.log(tabFruits);
// array.unshift() va ajouter un élément en fin de tableau 
tabFruits.unshift("abricots");
console.log(tabFruits);
elementChapitre11.innerHTML += tabFruits + "<hr>";
elementChapitre11.innerHTML += "Nombre d'éléments dans le array tabFruits : " + tabFruits.length + "<hr>";
// Attention, on évitera de faire unshift, car cela décale les indices de tous nos éléments, cela pourrait peut être nous causer des problèmes 
// On préfèrera donc toujours utiliser push 

// fonction pour réordonner un array en ordre alphabétique : 
// array.sort()
tabFruits.sort();
console.log(tabFruits);

// EXERCICE : Affichez l'intégralité du tableau array tabFruits sous forme de liste html non ordonnée
// ul li 
// <ul> 
// <li></li>
// <li></li>

// compteur de boucle doit être appelé dans les crochets du array
// tabFruits[i]

// condition de boucle à trouver
// le nombre d'élément dans le array est compris grâce à length 

let liste = "<ul>"; // j'ouvre le ul, c'est lui qui contient tous les li 

for (let i = 0; i < tabFruits.length; i++) { // je me sers du compteur pour piocher les éléménets un à un dans l'array, j'utilise aussi length pour comprendre la condition de fin de boucle
    liste += "<li>" + tabFruits[i] + "</li>"; // création de chaque li 
}
liste += "</ul>"; // fin de liste

elementChapitre11.innerHTML += liste; // affichage de la liste contenant dans la variable liste
// Tout comme pour les table, le flux html est perturbé car corrigé par le navigateur, on a donc l'absolu nécessité de construire notre liste ul li dans une variable avant de l'appeller pour l'affichage 

// Il est possible de réduire le tableau avec la propriété length 
elementChapitre11.innerHTML += tabFruits + "<hr>";
elementChapitre11.innerHTML += tabFruits.length + "<hr>";
tabFruits.length = 3; // On dit maintenant au tableau d'avoir une taille de 3 éléments, donc il sera coupé à 3 éléments ! 
elementChapitre11.innerHTML += tabFruits + "<hr>";
elementChapitre11.innerHTML += tabFruits.length + "<hr>";

elementChapitre11.innerHTML += separateur();

// Il existe d'autres syntaxes pour créer des array 
let tabPrenom = Array("Pierra", "Jean", "Anisse");
let tabNumero = new Array(10, 11, 12);

// En javascript, pas de possibilité d'avoir des array avec des indices en toutes lettres... (ce que l'on appelle un tableau associatif, généralement c'est pourtant ce qu'on préfère utiliser !)
// Par contre, on verra dans un chapitre suivant que pour avoir des "indices" nommés, on pourra plutôt créer un objet 

// ---------------------------
// ---- Boucle for in
// ---------------------------
// Boucle for in spécifique aux tableaux array (et aux objets)
for (let indice in tabFruits) {
    elementChapitre11.innerHTML += "- " + tabFruits[indice] + "<br>";
}
// let indice représente l'indice en cours à chaque tour de boucle
// En fait, la boucle comprend d'elle même qu'elle doit boucler sur chaque élément du tableau array, et à chaque tour, la variable que je défini (au nom que je souhaite, mais ici je l'ai appelé logiquement "indice"), va recevoir, l'indice en question de ce tour, donc au premier tour de boucle, indice récupère la valeur 0, puis après la valeur 1 puis 2 etc 

// ---------------------------
// ---- Boucle for of
// ---------------------------
// boucle for of spécifique aux tableaux (et aux objets)
for (let valeur of tabFruits) {
    elementChapitre11.innerHTML += "- " + valeur + "<br>";
}
// Ici à chaque tour de boucle la variable valeur récupère la valeur de chaque indice du tableau array !
// la boucle est capable de tourner autant de fois qu'il y a d'élément dans notre tableau, elle le comprends d'elle même.
// C'est la boucle que l'on préfèrera utiliser pour les array (alors que pour les objets, il sera intéressant d'utiliser for in)

// -------------------------------------
// -- Les tableaux array à plusieurs niveaux - Array Multidimensionnel 
// ---------------------------------------
elementChapitre11.innerHTML += "<h3>Les Array multidimensionnels</h3>";

let personnes = [
    ["Marie", "Dupont", "marie@gmail.com", "0102030405"],  // à l'indice 0 j'ai l'array qui concerne Marie
    ["Bernard", "Durand", "beber@gmail.com", "0908070605"], // ici indice 1 pour Bernard
    ["Julie", "André", "juju@hotmail.fr", "0405060302"] // et le 2 pour Julie 
]

console.log(personnes);

// Si je veux afficher "Bernard" ?
elementChapitre11.innerHTML += personnes[1][0];
// Pour piocher dans un tableau à plusieurs niveaux, on fait une succession de crochets ! dans le array personne, on pioche l'indice 1 qui concerne Bernard, puis l'indice 0 qui concerne le prénom 
for (let i = 0; i < personnes.length; i++) {
    elementChapitre11.innerHTML += " - " + personnes[i][2] + "<br>";
}

// EXERCICE : Utilisez vos connaissances de boucles et array pour arriver à afficher chaque élément du tableau array personnes 
// Ici on aura besoin de deux boucles ! (peu importe lesquelles), une qui va parcourir les personnes donc d'abord marie, bernard puis julie, et une deuxieme à l'intérieur de la première, qui va parcourir chacune des informations marie, dupont, marie@gmail, 0102030405, etc 

for (let i = 0; i < personnes.length; i++) {

    elementChapitre11.innerHTML += "<hr>";
    for (let j = 0; j < personnes[i].length; j++) {
        elementChapitre11.innerHTML += personnes[i][j] + " - ";
    }
    // Retrait du dernier séparateur inutile
    elementChapitre11.innerHTML = elementChapitre11.innerHTML.slice(0, -3); // slice avec l'argument 0 permet de dire qu'on commence à la fin de l'élément, et -3 pour indiquer que l'on coupe 3 caractères pour supprimer le " - " 
    elementChapitre11.innerHTML += "<br>";
}


elementChapitre11.innerHTML += separateur();

for (let i = 0; i < personnes.length; i++) {  // i représente le passage sur chaque "sous tableau" (marie, bernard, julie)
    for (j = 0; j < personnes[i].length; j++) { // j représente le passage sur chaque "info" (prenom, nom, email, telephone)
        elementChapitre11.innerHTML += personnes[i][j] + " ";
    }
    elementChapitre11.innerHTML += "<br>";
}

elementChapitre11.innerHTML += separateur();


// avec la boucle for of, on ne se soucis plus des indices car on peut piocher directement les valeurs
for (let personne of personnes) { // cette première boucle me permet de récupérer les "personnes" une à une (les sous tableaux en fait), cette appelation de ma variable, veut plus ou moins dire, je récupère UNE personne parmis LES personnes
    for (let information of personne) {
        elementChapitre11.innerHTML += information + " "
    }
    elementChapitre11.innerHTML += "<br>";
}



for (let i = 0; i < personnes.length; i++) {
    for (j = 0; j < personnes[i].length; j++) {
        if (j === personnes[i].length - 1) {
            elementChapitre11.innerHTML += personnes[i][j];
        } else
            elementChapitre11.innerHTML += personnes[i][j] + " - ";
    }
    elementChapitre11.innerHTML += "<br>";
}


// -------------------------------------------------
// Chapitre 12 : Les Objets Globaux
// -------------------------------------------------

const elementChapitre12 = document.getElementById("contenuChapitre12");
// https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Global_Objects

// Un objet c'est un conteneur virtuel possédant des informations (propriétés ou attributs, ce sont des "valeurs") mais EN PLUS, peut contenir du fonctionnel (méthodes)

// Une variable = une information
// un tableau array = un ensemble d'informations
// un objet = un ensemble d'informations ainsi qu'un ensemble de méthodes(fonctions)

// En JS, c'est un peu particulier, car tous les éléments héritent d'un type d'objet, par exemple, si je défini une variable let prenom = "pierra" alors cette variable prenom, est de type string, et donc de type OBJET string (on a accès à des tas d'informations en plus que sa simple valeur stockée).
// On dit, qu'en JavaScript, TOUT est objet 

// -----------------------------------------------------------
// ----- STRING 
// -----------------------------------------------------------

// https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Global_Objects/String
elementChapitre12.innerHTML += "<h3>Objet string</h3>";
let phrase = "Bonjour je m'appelle Pierra, nous sommes mardi";
elementChapitre12.innerHTML += phrase + "<hr>";
// Cette variable contient du texte. mais en réalité, c'est un objet JavaScript, un objet de type String, il possède des méthodes et des propriétés

// Un objet string possède la propriété length (comme un tableau array, cela m'indiquera la taille de la chaine de caractère)
elementChapitre12.innerHTML += "Taille de la chaine contenue dans phrase : " + phrase.length + "<br>";

// indexOf()
// indexOf() nous permet de connaitre la position d'une chaine de caractères dans une autre chaine 
elementChapitre12.innerHTML += "Position du mot Pierra dans la phrase : " + phrase.indexOf("Pierra") + "<br>"; // affiche 21 (attention le premier caractère de la phrase est celui numéro 0, donc 21 m'indique que le mot Pierra débute au 22eme caractère)

// substring()
// permet de découper une chaine en fournissant une position de départ et une position de fin 
let positionDepart = phrase.indexOf("Pierra");
let positionFin = phrase.indexOf("Pierra") + "Pierra".length;
console.log(positionFin);
elementChapitre12.innerHTML += phrase.substring(positionDepart, positionFin) + "<hr>";

// toUpperCase() pour transformer en maj
// toLowerCase() pour transformer en min 
let maj = "BONJOUR";
let min = "mardi";
elementChapitre12.innerHTML += maj.toLowerCase() + "<hr>";
elementChapitre12.innerHTML += min.toUpperCase() + "<hr>";

// EXERCICE 
// déclarer une variable contenant votre prenom en minuscule
// faire en sorte en utilisant substring et toUpperCase, de mettre en majuscule UNIQUEMENT la première lettre et ensuite afficher votre prénom entier sur la page
// Il faut d'abord découper la première lettre grâce à substring et la passer en upperCase et ensuite concaténer la suite de la chaine en commençant au second caractère

let prenomMin = "pierra";

let prenomMaj = prenomMin.substring(0, 1).toUpperCase() + prenomMin.substring(1);

// Je le mets dans une fonction comme ça je pourrais le réutiliser une prochaine fois ! 
function ucFirst(chaine) {
    return chaine.substring(0, 1).toUpperCase() + chaine.substring(1);
}

elementChapitre12.innerHTML += prenomMaj;
elementChapitre12.innerHTML += ucFirst("ridowane");
elementChapitre12.innerHTML += ucFirst("tokyo");


// -----------------------------------------------------------
// ----- MATH
// -----------------------------------------------------------
// https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Global_Objects/Math
elementChapitre12.innerHTML += "<h3>Objet Math</h3>";
// Math est un objet regroupant des tas de fonctions en lien avec la manipulation de chiffre 
// Par exemple :

// Math.floor(chiffre) arrondi à l'entier inférieur
elementChapitre12.innerHTML += Math.floor(7.9) + "<br>";

// Math.ceil(chiffre) arrondi à l'entier supérieur
elementChapitre12.innerHTML += Math.ceil(6.1) + "<br>";

// Math.round() arrondi à l'entier le plus proche
elementChapitre12.innerHTML += Math.round(7.9) + "<br>";
elementChapitre12.innerHTML += Math.round(6.1) + "<br>";

// -----------------------------------------------------------
// ----- DATE
// -----------------------------------------------------------
elementChapitre12.innerHTML += "<h3>Objet Date</h3>";
// https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Global_Objects/Date
// L'objet Date, est un type d'objet appelé "constructeur", on a besoin de créer un objet Date avec l'opérateur "new"
// L'opérateur new, concept universel dans l'orienté objet, permet de créer un nouvel objet d'une classe spécifique
let today = new Date();
console.log(today);
// console.log(Date.now()); // ici je peux appeler le timestamp en millisecondes, ce sont le nombre de millisecondes écoulées depuis le 1er janvier 1970, c'est le temps UNIX, en gros "l'an 0 de l'informatique"

// Pour avoir l'année en 4 chiffre :
elementChapitre12.innerHTML += today.getFullYear() + "<hr>";
// Pour avoir le numéro du jour dans le mois :
elementChapitre12.innerHTML += today.getDate() + "<hr>";
// Pour avoir le numéro du jour dans la semaine (dimanche étant le 0)
elementChapitre12.innerHTML += today.getDay() + "<hr>";
// Pour avoir le numéro du mois de l'année (janvier étant le 0)
elementChapitre12.innerHTML += today.getMonth() + "<hr>";

// Si on souhaite écrire la date en français, on formaterait de la sorte : 
elementChapitre12.innerHTML += today.getDate() + "/" + (today.getMonth() + 1) + "/" + today.getFullYear() + "<hr>";

// EXERCICE 
// Refaire la fonction direBonjour pour rajouter une condition afin de dire Bonjour ou Bonsoir en fonction de l'heure de la journée 
// On considèrera dire Bonjour entre 5h du matin et 18h et Bonsoir le reste du temps 
// On doit recréer un objet Date à l'intérieur de la fonction (espace local oblige...) et ensuite récupérer uniquement les heures de cet élément date pour comprendre si c'est Bonjour ou Bonsoir

function direBonsoir(qui) {
    // Création objet date dans l'espace local
    let date = new Date();

    let heure = date.getHours(); // on récup l'heure
    console.log(heure);

    let salutation; 
    if (heure > 5 && heure < 18) {
        // if (heure < 5 || heure > 18) {
        salutation = "Bonjour"
    } else {
        salutation = "Bonsoir"
    }

    let message = salutation + " " + qui + ", bienvenue sur le site !";

    return message;
}

elementChapitre12.innerHTML += direBonsoir("Pierro") +  "<hr>";


// -------------------------------------------------
// Chapitre 13 : Les Objets
// -------------------------------------------------

const elementChapitre13 = document.getElementById("contenuChapitre13");

// Création d'un objet, en utilisant les accolades (création littérale)

let monObjet = {}; // création d'un objet vide 
console.log(typeof (monObjet));

// Remplissage de l'objet
// Par exemple je lui rajoute une propriété "pseudo"
monObjet.pseudo = "Pierro"; // syntaxe propre aux objets
monObjet["mail"] = "pierro@gmail.com"; // syntaxe ressemblante aux array... on évite de tout mélanger ! A eviter 

elementChapitre13.innerHTML += monObjet.pseudo;
elementChapitre13.innerHTML += monObjet.mail;

// Je peux également définir dès l'initialisation de l'objet, des propriétés et des fonctions 

// Par exemple, un objet "étudiant"

let etudiant = 
{
    nom: "Dupond",
    prenom: "Arthur",
    age: 25,
    competences: { // un objet dans l'objet
        // array dans l'objet 
        web: ["html", "css", "js", "php"],
        design: ["photoshop", "illustrator"]
    },
    contact: {
        mail: "dupont@arthur.com",
        tel: "0608070908"
    },
    ajouterCompetenceWeb: function (nouvelleComp) {
        this.competences.web.push(nouvelleComp);
    },
    ajouterCompetenceDesign: function (nouvelleComp) {
        this.competences.design.push(nouvelleComp);
    }
}

console.log(etudiant);

elementChapitre13.innerHTML += "Prenom de l'étudiant " + etudiant.prenom;

etudiant.ajouterCompetenceWeb("mysql");

console.log(etudiant);