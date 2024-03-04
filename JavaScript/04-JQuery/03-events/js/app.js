$(document).ready(function() {

    // Je vais mettre un event sur la premiere image
    // Je peux la selection avec un :first ou .first
    $("img").first().click(function(){
        alert("Vous m'avez cliqué !!!");
    })
    // Très simple en JQuery, les évents sont des méthodes directement rattachées à nos éléments HTML, j'appelle ici tout simplement .click  ce qui me crée un evenement click sur l'élément selectionné ! Ensuite j'ouvre ma fonction anonyme comme d'habitude

    // EXERCICE
    // On va rajouter des évènements sur nos autres images 

    // Sur la deuxieme image, rajouter un effet de survol, par exemple une bordure 
    // Je fais ici une sélection du deuxieme element grâce à eq(1) (on rappelle que l'élément 1 c'est l'indice 0)
    // Puis je développe un évènement hover, à la suite duquel je mets en place une "Call Back function", c'est une fonction qui s'exécutera lorsque le survol n'aura plus lieu
    $("img").eq(1).hover(function(){
        $(this).css("border", "4px solid green");
    }, function(){ // <------ callback function ici
        $(this).css("border", "none");
    })

    // Sur la troisieme image, rajouter un evenement dblclick et faire en sorte qu'elle disparaisse 
    $("img").eq(2).dblclick(function(){
        console.log("double clic image 3");
        // l'effet fadeOut fait disparaitre l'image en fondue
        $(this).fadeOut();
    })

    // Capter l'évenement "je tape sur une touche du clavier" keypress
    // Récupérer la valeur de la touche sur laquelle j'ai tapé en console
    $(document).keypress(function(event){
        console.log("Touche pressée");
        // Lors d'un évènement, je peux toujours récupérer dans une variable transmit à ma fonction anonyme, des informations sur l'évènement qui vient d'être déclenché
        // Là en locurence je peux récupérer une propriété s'appellant key qui représente la touche que j'ai pressée
        // event.key me donne la touche en question
        console.log(event);
        console.log(event.key);
    })

    // Quand je soumet le formulaire je veux annuler le comportement par defaut de rechargement de la page
    $("#myForm").submit(function(event){
        //Ici meme concept, je recupère dans la variable event, l'évènement précis que je viens de déclencher et j'annule son comportement par defaut grâce à la ligne en dessous .preventDefault()
        event.preventDefault(); 


        // Pour le valider après des vérifs : this.submit()
    })


})