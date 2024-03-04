// Pour jouer un son
// Il faut créer un objet "Audio" de Javascript 
// On crée une variable qui reçoit un objet Audio qui a pour param le lien vers le fichier son
// Ensuite, la méthode .play() sur cette variable permet de jouer le son
let tom1 = new Audio("sounds/sounds_tom-1.mp3");
    tom1.play();

// Sur le fichier index.html, se trouvent 7 boutons, vous devez créer des évènements sur chacun de ces boutons pour créer les objets Audio en rapport avec l'élément cliqué et jouer le son associé
// Egalement, créer l'évènement qui joue le son lorsque la bonne touche est pressée
// Aussi, il faut changer le style du bouton lorsqu'il y a un clic ou une touche pressée (voir la classe .pressed dans le css, il faut la mettre et l'enlever aussitot (delay 100 ?))