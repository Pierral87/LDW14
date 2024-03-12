// On commence toujours par document.ready 
$(document).ready(function(){

    /*
     En JQuery, tout comme en JS natif, on sélectionne d'abord les éléments HTML pour ensuite les manipuler 

     01 - Selecteur de classe
     02 - Selecteur d'id
     03 - Selecteur de balise
     04 - Selecteur d'attributs
     05 - Selecteur multiple
     06 - Récupérer le parent d'un élément
     07 - Récupérer les enfants d'un élément

     */

    // la fonction $ de JQuery = querySelectorAll()

    // -------------------------------------------
    // 01 - SELECTION PAR CLASSE
    // -------------------------------------------
        // On aimerait sélectionner les éléments ayant la classe maClass et leur donner une couleur d'écriture rouge ainsi qu'un contenu html différent de celui d'origine
    $(".maClass").css("color", "red").html("Texte modifié");

    // Ci-dessous si on l'avait fait en JS Natif
    // const myElems = document.querySelectorAll(".maClass");
    // for (let i = 0; i < myElems.length; i++){
    //     myElems[i].style.color = "red";
    //     myElems[i].innerHTML = "Texte Modifié";
    // }

    // -------------------------------------------
    // 02 - SELECTION PAR L'ID
    // -------------------------------------------
        // On tente de récupérer l'élément ayant l'id "monId" et d'y appliquer un background color
    $("#monId").css("background-color", "blue");

    // -------------------------------------------
    // 03 - SELECTION PAR LE NOM DE BALISE
    // -------------------------------------------
        // On récupère tous les paragraphes et on y applique une modification de taille de police 
    $("p").css("font-size", "20px");
    

    // -------------------------------------------
    // 04 - SELECTION PAR L'ATTRIBUT D'UNE BALISE
    // -------------------------------------------
        // On récupère l'élément balise img ayant l'attribut title photo1 et on y applique une width de 400px
    $("img[title=photo1]").css("width", "400px");

    // -------------------------------------------
    // 05 - SELECTION MULTIPLE
    // -------------------------------------------    
        // Récupération de tous les p, les div, les span et on leur donne une background-color
    $("p, div, span").css("background-color", "yellow");

    // -------------------------------------------
    // 06 - SELECTION DU PARENT D'UN ELEMENT
    // -------------------------------------------    
    // On récupère ici le parent du p ayant l'id monP, (c'est donc le div id container)
    // donc sur cette instruction la selection est la suivante : $("#monP").parent()  je ne selectionne pas du tout le p ayant l'id monP, mais uniquement son parent !
    $("#monP").parent().css("border", "5px solid green");
    // On récupère donc l'élément parent d'un autre élément via la méthode parent()

    // -------------------------------------------
    // 07 - SELECTION D'ENFANTS D'UN AUTRE ELEMENT
    // -------------------------------------------  
    // Tentez de récupérer le 3eme paragraphe qui se trouve dans le div id container
    // On débute la selection par $("#container")
    // On y applique un background color 

    // Uniquement grâce à un selecteur css
    // $("#container p:nth-child(3)").css("background-color", "indianred");

    // Correct, children() nous récupère tous les enfants, on appelle ensuite l'enfant numéro 2 (donc représente le 3eme car on commence à 0) et on applique le style
    // ATTENTION QUAND MEME, ici on appelle le 3eme enfant peu importe sa balise, ici on veut quand même appeler le 3eme paragraphe (s'il y avait des éléments entre, ça ne fonctionnerait plus)
    // En fait on peut se protéger de ça en disant que l'on cherche que les enfants "p" en le spécifiant dans les parenthèses de children
    // $('#container').children().eq(2).css("background-color", "purple");
    $('#container').children("p").eq(2).css("background-color", "purple");

    // Ici on utilise find, ce qui nous permet de ne pas recherche forcement que les enfants direct mais aussi parmis les p de second niveau (j'ai rajouté un div qui contient un p, dans le div container, on voit que la selection n'est du coup pas la même)
    $('#container').find("p").eq(2).css("background-color", "purple");

    // On peut également faire en sorte de récupérer l'élément "suivant" d'un autre
    // Par exemple on récupère dans le container, l'élément html qui est après le span 
    $("#container span").next().css("font-size", "50px");

    // Je peux fournir plusieurs props css, attention je dois fournir ça sous forme d'objet donc entre accolades
    $("#container span").next().css({color: 'white', background : "steelblue"});

    /* 
        RESUME :
        ------------
        selection par nom de balise =>                $("p")
        selection par un id =>                        $("#monId")
        selection par une classe =>                   $(".maClasse")
        selection par un type="" =>                   $("input:text")
        selection par un attribut =>                  $("img[alt]")
        selection par un attribut selon sa valeur =>  $("img[title"image1"]")
        selection par un chemin css =>                $("div > p span")
        selection multiple =>                         $("span, div, p, #monId")

        // ----------------------------------
        Methodes de sélection : 
        .next()                 => le prochain élément html au même niveau que l'élément en cours
        .parent()               => l'élément parent immédiat
        .find()                 => va chercher les éléments répondant au selecteur peu importe le niveau
        .children()             => récupère uniquement les enfants direct répondant au selecteur
        .eq()                   => pour pointer un élément par son numéro à l'intérieur d'une selection (type selection de tableau array)
        .first()                => le premier élément d'une sélection
        .last()                 => le dernier élément d'une selection 

        Il en existe beaucoup, voir la doc ! 

    */


})