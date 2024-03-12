/* 
    DOM : DOCUMENT OBJECT MODEL
    ----------------------
    - Le DOM est une interface interne aux navigateurs qui réprésente notre page et nous permet d'intéragir dessus
    - Le DOM permet que chaque élément html (balises), chaque attribut (width, href, alt, id, class, ...) et chaque évènement (chargement de page, click, double click, touche de clavier, ...) soit un objet récupérable et manipulable avec JS
    - Les selecteurs en JS me permettent de sélectionner ces éléments pour y appporter des modifications, des évènements ou tout autre traitement.

*/

// ----------------------------------
// - SELECTION PAR l'ID
// ----------------------------------
const sectionElem = document.getElementById('maSection');
console.log(sectionElem); // on voit ici le code html de ce que je viens de sélectionner
console.log("Section : " + sectionElem); // object HTMLElement

console.log(sectionElem.innerHTML); // Je peux récupérer son contenu HTML
console.log(sectionElem.textContent); // Je peux récupérer son texte uniquement

// Pour modifier : 
// Par exemple je modifie son contenu HTML 
sectionElem.innerHTML = "<h3>Bonjour à tous </h3>";
// Je peux manipuler le css de l'élément en appelant son attribut style, à l'intérieur duquel je peux appeler n'importe quelle propriété css 
sectionElem.style.backgroundColor = "steelblue";
sectionElem.style.fontSize = "42px";
sectionElem.style.padding = "30px";

sectionElem.title = "Test sur title";

// ----------------------------------
// - SELECTION PAR LA CLASSE
// ----------------------------------
const mesElemDiv = document.getElementsByClassName("mesDivs");
console.log(mesElemDiv); // Je récupère une HTML Collection ! Cela ressemble tout à fait à un array 

// D'ailleurs, on manipulera ça, tout à fait comme un array 

// On va changer le texte du premier élément 
mesElemDiv[0].textContent = "Nous sommes mercredi";

// Pour impacter tous les éléments : une boucle ! Pas le choix en JS Natif 

for (let i = 0; i < mesElemDiv.length; i++) {
    // style.cssText : Remplace tout le contenu de l'attribut style de la balise
    mesElemDiv[i].style.cssText = "font-family: sans-serif; font-size: 20px; color: orange; background-color: lightblue; padding: 10px;";
    mesElemDiv[i].style.marginTop = "10px";

    // Autre façon de pointer un attribut et changer sa valeur 
    mesElemDiv[i].setAttribute("title", "Le title des divs");
    // getAttribute() // permet de récupérer la valeur d'un attribut

    // EXERCICE : Affichez une background-color différente sur le deuxième élément
    if (i == 1) {
        mesElemDiv[i].style.backgroundColor = "dodgerblue";
    }
}

// ----------------------------------
// - SELECTION PAR LE NOM DE BALISE
// ----------------------------------
const mesElemP = document.getElementsByTagName("p");
console.log(mesElemP);

// EXERCICE : Appliquez du css sur ces balises via une boucle 
// Si vous pouvez, essayez d'appliquer une couleur différente sur chaque p  

let bgColor = 248965
for (let i = 0; i < mesElemP.length; i++) {
    // on peut gérer en hexadécimal avec une incrémentation d'une grosse valeur, par exemple en dessous +4000
    // on sinon gérer la couleur aléatoire en rgb avec 3 fois l'appel à Math.random entre 0 et 255
    mesElemP[i].style.backgroundColor = "#" + bgColor;
    mesElemP[i].style.padding = "20px";

    bgColor += 4000; // en faisant ça, je change la valeur de bgColor pour mon appel de couleur en hexadécimal 
}

// const couleurs = ["red", "blue", "green", "orange", "purple"];
// for (let i = 0; i < mesElemP.length; i++) {
//     mesElemP[i].style.backgroundColor = couleurs[i];
// }

// for (let o = 0; o < mesElemP.length; o++) {
//     // style.cssText : Remplace tout le contenu de l'attribut style de la balise
//     mesElemP[o].style.cssText = "font-family: sans-serif; font-size: 10px; color: white; background-color: gray; padding: 10px;";
//     if (o == 1) {
//         mesElemP[o].style.backgroundColor = "green";
//     }
//     else if (o == 2) {
//         mesElemP[o].style.backgroundColor = "blue";
//     }
// }


// ----------------------------------
// - SELECTION CAS PARTICULIER
// ----------------------------------

// par un id directement ---- On évite cette syntaxe...
const idResultat = resultat; // on appelle directement le nom de l'id 
console.log(idResultat); 

// body et head 
const monElemBody = document.body;
console.log(monElemBody);


// ----------------------------------
// - SELECTION AVEC UN SELECTEUR CSS 
// ----------------------------------
// querySelector() nous renvoie le premier élément correspondant au sélecteur css mis entre parenthèses
// querySelectorAll() nous renvoie TOUS les éléments correspondant au sélecteur css mis entre parenthèses 

// Si je veux récupérer le premier <p> de ma page 
const premierElementP = document.querySelector("p")
console.log(premierElementP);

const tousDivEtP = document.querySelectorAll("p, div");
console.log(tousDivEtP);

/* 
RESUME DES SELECTEURS
-------------------------
- Par l'id => getElementById
- Par la classe => getElementsByClassName
- Par balise => getElementsByTagName()

MAIS
On utilisera TOUJOURS la sélection par SELECTEUR CSS 
- querySelector() sélectionnera un seul élément (le premier trouvé) en rapport avec un sélecteur css
- querySelectorAll() sélectionne TOUS les éléments trouvés en rapport avec un sélecteur css 



*/

