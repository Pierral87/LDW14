/* 

Plusieurs façons de mettre en place un évènement en JS :
--------------------------------------------------------

Anciennement : 
------------------------
- Par un attribut html d'évènement, par exemple : onclick="" on écrit notre code JS entre les guillemets 
C'est une façon de faire obsolète ! On ne l'utilise plus, sauf dans de rares cas pratique par exemple un évènement tout simple sur un clic


La bonne façon :
--------------------------
On utilise un "écouteur d'évènement" dans notre fichier javascript 

document.querySelection("#unId").addEventListener("click", function() {
    // Code........
})

*/

// EVENEMENT CLICK 
document.querySelector("#div1").addEventListener('click', function () {
    console.log("ok, élément cliqué");
    // Dans un évènement le mot clé this représente l'élément ayant reçu l'évènement (ici le this représente notre #div1)

    // Ainsi je peux changer par exemple son backgroundColor
    // this.style.backgroundColor = "red";

    let couleurActuelle = this.style.backgroundColor;

    if (couleurActuelle == 'cornflowerblue') {
        this.style.backgroundColor = "red";
        this.style.width = "200px";
    } else if (couleurActuelle == 'red') {
        this.style.backgroundColor = "orange";
        this.style.height = "200px";
    } else if (couleurActuelle == 'orange') {
        this.style.backgroundColor = "purple";
        this.style.width = "100px";
    }
    else {
        this.style.backgroundColor = "cornflowerblue";
        this.style.height = "100px";
    }
}); // fin de cet évènement click 

// EVENEMENT DBLCLICK 
document.querySelector("#div2").addEventListener("dblclick", function() {

    let posTop = this.style.top;
    console.log(posTop);
    let posLeft = this.style.left;
    console.log(posLeft);

    // On veut déplacer notre élément au double click à divers endroit et le ramener après à son état d'origine, on va créer un if à 4 conditions comme l'evenement click ci dessus 

    if (posTop == "0px" && posLeft == "0px"){
        this.style.left = "100px"; // avec cette ligne je déplace l'élément vers la droite (car cela rajoute 100px à sa gauche, entre sa position d'origine et lui même)
    } else if (posTop == "0px" && posLeft == "100px"){
        this.style.top = "100px";
    } else if (posTop == "100px" && posLeft == "100px"){
        this.style.left = "0px";
    } else {
        this.style.top = "0px";
    }
}) // fin de l'evènement double click

// EVENEMENT MOUSEENTER & MOUSELEAVE 

const listeImage = document.querySelectorAll("#blocImage1 img");

document.querySelector("#blocImage1").addEventListener("mouseenter", function() {
    console.log("Evenement mouse enter ok sur le bloc image");
    listeImage[0].style.top = '-360px';
    listeImage[1].style.top = '-360px';
})

// EXERCICE : Remettre les images dans leur position initiale lorsque l'on sort du survol avec la souris (evenement nommé mouseleave)

document.querySelector("#blocImage1").addEventListener("mouseleave", function() {
    console.log("Evenement mouse enter ok sur le bloc image");
    listeImage[0].style.top = '0px';
    listeImage[1].style.top = '0px';
})

// CAROUSEL avec les transparences/opacité

// je crée l'évènement click sur le lien changerImage
/* document.querySelector("#changerImage").addEventListener("click", function(event){
    // le fait de mettre un argument à la function, me permet de recuperer l'évènement qui aurait eu normalement lieu
    console.log("Clic sur le lien");
    event.preventDefault(); // permet d'annuler l'évènement par défaut de ce lien (la redirection vers google)

    // Je récupère la valeur de l'attribut data-image
    // Les "data-attribute" sont des attributs nommés comme on le souhaite
    // Ce sont des attributs qui nous servent de repère pour certains fonctionnements de notre site
    // Ici, ce data-image nous sert à comprendre quelle est l'image actuellement affiché à l'utilisateur

    // Pour ce carousel de transparence, on joue sur l'opacité des images
    // Les images sont toutes superposées les unes aux autres (grâce à la position absolute) et on en affiche une seule grâce à opacity:1; et on rend transparente les autres grâces à opacity:0;
    let imageEnCours = document.querySelector("#blocImage2").getAttribute('data-image'); // je récupère ici l'image en cours 
    console.log(imageEnCours);
    if (imageEnCours == "image1") {
        // si l'image en cours est image1, je rends image1 transparente et je rends image2 visible, puis je change le contenu de data-image à image2 pour spécifier que c'est l'image 2 qui est actuellement visible
        document.querySelector("#image1").style.opacity = 0;
        document.querySelector("#image2").style.opacity = 1;
        document.querySelector("#blocImage2").setAttribute("data-image", "image2");
    } else if (imageEnCours == "image2") {
        document.querySelector("#image2").style.opacity = 0;
        document.querySelector("#image3").style.opacity = 1;
        document.querySelector("#blocImage2").setAttribute("data-image", "image3");
    } else if (imageEnCours == "image3") {
        document.querySelector("#image3").style.opacity = 0;
        document.querySelector("#image4").style.opacity = 1;
        document.querySelector("#blocImage2").setAttribute("data-image", "image4");
    } else if (imageEnCours == "image4") {
        document.querySelector("#image4").style.opacity = 0;
        document.querySelector("#image5").style.opacity = 1;
        document.querySelector("#blocImage2").setAttribute("data-image", "image5");
    } else {
        document.querySelector("#image5").style.opacity = 0;
        document.querySelector("#image1").style.opacity = 1;
        document.querySelector("#blocImage2").setAttribute("data-image", "image1");
    }

})
*/

// Ici j'ai englobé dans une fonction, le système de fonctionnement du carousel à transparence
function activeCarrousel(event = "") {

    if (event != "") { // ici ce if sert à dire que l'ont stoppe le comportement par defaut de l'evenement clic sur lien, UNIQUEMENT si cette fonction est lancé par un evenement (le clic sur le bouton)
        // Sinon, nous avons une erreur d'event undefined
    event.preventDefault();

    // clearInterval me permet d'arreter un timer
    clearInterval(animationCarousel);
}

    let imageEnCours = document.querySelector("#blocImage2").getAttribute('data-image');
    // console.log(imageEnCours);
    if (imageEnCours == "image1") {
        document.querySelector("#image1").style.opacity = 0;
        document.querySelector("#image2").style.opacity = 1;
        document.querySelector("#blocImage2").setAttribute("data-image", "image2");
    } else if (imageEnCours == "image2") {
        document.querySelector("#image2").style.opacity = 0;
        document.querySelector("#image3").style.opacity = 1;
        document.querySelector("#blocImage2").setAttribute("data-image", "image3");
    } else if (imageEnCours == "image3") {
        document.querySelector("#image3").style.opacity = 0;
        document.querySelector("#image4").style.opacity = 1;
        document.querySelector("#blocImage2").setAttribute("data-image", "image4");
    } else if (imageEnCours == "image4") {
        document.querySelector("#image4").style.opacity = 0;
        document.querySelector("#image5").style.opacity = 1;
        document.querySelector("#blocImage2").setAttribute("data-image", "image5");
    } else {
        document.querySelector("#image5").style.opacity = 0;
        document.querySelector("#image1").style.opacity = 1;
        document.querySelector("#blocImage2").setAttribute("data-image", "image1");
    }
}


// Ici je crée l'évènement click à nouveau sur le lien, sauf que au lieu de développer directement le code, j'insère plutôt la fonction activeCarrousel
document.querySelector("#changerImage").addEventListener("click", activeCarrousel);

// Pour déclencher une fonction selon un timer
// On utilise setInterval(nomDeFonction, tempsEnMillisecondes)
let animationCarousel = setInterval(activeCarrousel, 5000);

/*
Liste d'exemples d'évènements :
- abort     => Lorsque l'utilisateur interrompt le chargement d'une image
- blur      => lorsque l'utilisateur sort d'un champ d'un formulaire 
- change    => lorsque l'utilisateur change la valeur d'un champ de formulaire
- click     => lorsque l'utilisateur click sur l'élément concerné
- dblclick  => lorsque l'utilisateur double click sur l'élément concerné
- dragdrop  => lorsque l'utilisateur fait un glisser déposer dans la page web
- error     => lorsqu'une erreur se produit lors du chargement de la page
- focus     => lorsque l'utilisateur rentre dans un champ de formulaire
- input     => lorsque l'utilisateur écrit ou modifie dans un champ <input >
- keypress  => lorsque l'utilisateur appuie sur une touche
- keyup     => lorsque l'utilisateur relache une touche
- keydown   => lorsque l'utilisateur reste appuyé sur une touche
- load      => lorsque la page est chargée.
- mousedown => lorsque l'utilisateur garde le bouton de la souris appuyé
- mouseup   => lorsque l'utilisateur relache le bouton de la souris
- mouseover => le survol de l'élément avec la souris
- mouseout  => le fait de sortir du survol avec la souris
- reset     => le fait d'annuler toutes les saisies dans un formulaire
- select    => lorsque l'utilisateur selectionne du texte dans un champ de formulaire (input ou textarea)
- submit    => la validation d'un formulaire
- unload    => lorsque le navigateur quitte la page en cours.
*/

// EVENEMENT FOCUS (lorsque l'on rentre dans un champ de formulaire) 

const mesInputs = document.querySelectorAll("input");
// Je récupère ici un Array qui contient mes deux input html, j'ai besoin de faire une boucle pour appliquer l'évènement à chaque input ! 

// J'applique un event focus à chaque input pour leur donner une grosse bordure lorsqu'on les selectionne
for (let i = 0; i < mesInputs.length; i++) {
    mesInputs[i].addEventListener('focus', function() {
        this.style.border = "10px solid steelblue";
    })
}

// EVENEMENT BLUR (lorsque l'on sort d'un champ de formulaire)
for (let i = 0; i < mesInputs.length; i++) {
    mesInputs[i].addEventListener('blur', function() {
        this.style.border = "1px solid lightslategray";
    })
}

// EVENEMENT SUBMIT - la validation d'un formulaire 
document.querySelector('#monForm').addEventListener('submit', function (event){

    // preventDefault me permet de stopper l'envoie automatique du formulaire lorsque je clique sur le bouton submit
    event.preventDefault();

    // Je récupère ici le contenu de l'input, et je peux donc en comprendre sa taille que je vais pouvoir controler !
    let pseudoValue = document.querySelector("#pseudo").value;
    console.log(pseudoValue);
    console.log(pseudoValue.length);

    // Je fais une verif sur la longueur du pseudo
    if (pseudoValue.length < 5 || pseudoValue.length > 15) {
        console.log("erreur");

        // Je crée un message d'erreur que j'insère dans le div message 
        document.querySelector("#message").innerHTML = "<p style='padding: 10px; background-color:red;color:white'>ATTENTION, votre pseudo ne respecte pas la taille autorisée ! Seulement entre 5 et 15 caractères inclus !</p>"

        // je met une bordure rouge autour du champ concerné
        document.querySelector("#pseudo").style.border = "3px solid red";
    } else {
        document.querySelector("#message").innerHTML = "";
        document.querySelector("#pseudo").style.border = "1px solid lightslategray";
    }

    // Si le champ div id message est vide, c'est à dire il n'y a pas d'erreur, je peux valider le formulaire 
    if (document.querySelector("#message").innerHTML == "") {
        this.submit();
    }
})