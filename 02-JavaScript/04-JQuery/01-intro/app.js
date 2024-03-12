// Pour tester si on a bien relié JQuery à notre page, dans la console on tape "$", si cela nous retourne bien quelque chose, alors c'est bon ! JQuery est bien relié ! 

// La fonction $ : C'est l'outil principal de JQuery, c'est la fonction qui nous sert à sélectionner les éléments du DOM

// Première chose à faire : 
// Je sélectionne le document, donc toute la page, puis j'appelle la méthode ready qui me permet de dire que je lance la suite de ce code uniquement lorsque la page est entièrement chargée ! C'est une recommandation de la doc de JQuery pour que tout fonctionne correctement
$(document).ready(function(){

    console.log("Hello World !");

    // $(document) => Je sélectionne le DOM (Document Object Model)
    // DOM c'est un objet qui contient tous les éléments HTML de la page (c'est la page en gros)
    // Tous les éléments HTML en JS sont des objets (objets HTML, ils possèdent des méthodes/fonctions qui leurs sont propres)

    // .ready() => Je fais appel à la méthode .ready() qui permet de capter le moment où la page est entièrement chargée 

    // function(){}
    // => fonction anonyme c'est une fonction qui n'a pas de nom et qui s'execute quand un évèenement survient 

    // Si je veux manipuler le H1 de la page HTML, en js natif 
    // Première chose, je récupère l'élément html en appelant le bon sélecteur
    // on pourrait utiliser getElementsByTagName, mais, bonne pratique de developpement vu que l'on utilise uniquement querySelector ou querySelectorAll qui à eux deux, nous permettent de sélectionner n'importe quel type d'élément
    // Ensuite je peux appliquer du style à cet élément
    const titre = document.querySelector("h1"); 
    titre.style.color = "red";

    // En JQuery 
    $("h1").css("color", "blue");
    // Très raccourci ! En gros la fonction $ est équivalente à faire un querySelectorAll




})