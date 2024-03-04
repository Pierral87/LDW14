// Pour jouer un son
// Il faut créer un objet "Audio" de Javascript 
// On crée une variable qui reçoit un objet Audio qui a pour param le lien vers le fichier son
// Ensuite, la méthode .play() sur cette variable permet de jouer le son
// let tom1 = new Audio("sounds/sounds_tom-1.mp3");
//     tom1.play();

// Sur le fichier index.html, se trouvent 7 boutons, vous devez créer des évènements sur chacun de ces boutons pour créer les objets Audio en rapport avec l'élément cliqué et jouer le son associé
// Egalement, créer l'évènement qui joue le son lorsque la bonne touche est pressée
// Aussi, il faut changer le style du bouton lorsqu'il y a un clic ou une touche pressée (voir la classe .pressed dans le css, il faut la mettre et l'enlever aussitot (delay 100 ?))


// Je vais d'abord gérer l'évènement click sur tous mes boutons et en récupérer le contenu html
// Car le contenu html contient la lettre du bouton 
$("button").click(function(event){
    // console.log($(this).html());
    makeSound($(this).html())
})

// Ici avec l'event keypress je récupère la touche qui a été pressée
$(document).keypress(function(event){
    // console.log(event.key);
    makeSound(event.key);
})

// Maintenant une fonction qui me permet de lancer le son 
// Je récupère en param la lettre qu'elle soit cliquée ou pressée
function makeSound(lettre){

    // En fonction de la valeur de la lettre, je crée l'objet Audio, et je lance le son
    switch(lettre) {
        case "w":
            let tom1 = new Audio("sounds/sounds_tom-1.mp3");
            tom1.play();
            break;

        case "a":
            let tom2 = new Audio("sounds/sounds_tom-2.mp3");
            tom2.play();
            break;

        case "s":
            let tom3 = new Audio("sounds/sounds_tom-3.mp3");
            tom3.play();
            break;

        case "d":
            let tom4 = new Audio("sounds/sounds_tom-4.mp3");
            tom4.play();
            break;

        case "j":
            let snare = new Audio("sounds/sounds_snare.mp3");
            snare.play();
            break;

        case "k":
            let crash = new Audio("sounds/sounds_crash.mp3");
            crash.play();
            break;

        case "l":
            let kick = new Audio("sounds/sounds_kick-bass.mp3");
            kick.play();
            break;
    }
    // la fonction makeSound lance aussi la fonction qui gère l'animation du bouton
    buttonAnimation(lettre);
}


// L'animation du bouton ici, en fonction de la lettre pressée, va récupérer l'élément HTML ayant la même classe que la lettre (class a class w etc) et y appliquer la classe, puis la retirer avec un timer de 0.1 seconde 
function buttonAnimation(lettre){
    $("." + lettre).addClass("pressed");

    setTimeout(function(){
        $("." + lettre).removeClass("pressed");
    }, 100);
}