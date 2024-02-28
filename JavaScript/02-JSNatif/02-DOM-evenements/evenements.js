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