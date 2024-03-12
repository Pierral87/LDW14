$(document).ready(function(){

    // On bloque l'evenement click sur tous les liens de la page 
    $("a").click(function(event){
        event.preventDefault();
    })


    // ANIMATIONS FADE 

    // Disparaition : fadeOut(temps)
    // temps : en milliseconde sinon soit slow soit fast pour la durée de l'animation
    $("#fadeDisparition").click(function(){
        $("#rouge").fadeOut(2000);
    });

    // Apparition : fadeIn(temps)
    $("#fadeApparition").click(function(){
        $("#darkslateblue").fadeIn(2000);
    })

    // Toggle : Apparition ou Disparition
    $("#fadeToggle").click(function(){
        $("#navy").fadeToggle(2000);
    })

    // Fade to : fondu vers une valeur spécifique d'opacité
    $("#fadeTo").click(function(){
        // fadeTo(temps, opacity)
        $("#darkorchid").fadeTo(2000, 0.3);
    })

    // SLIDE
    // slideDown()
    $("#slideOpen").click(function(){
        $("#slideOpenContenu").slideDown(1000); // Slide vers le bas pour ouvrir le contenu
    //     $("#slideOpenContenu").slideToggle(1000);
    //   $("#slideCloseContenu").slideToggle(1000);

    })

    // slideUp()
    $("#slideClose").click(function(){
        $("#slideCloseContenu").slideUp(1000); // Slide vers le haut pour fermer le contenu
    //   $("#slideCloseContenu").slideToggle(1000);
    //   $("#slideOpenContenu").slideToggle(1000);
    })    

    // slideToggle()
    $("#slideToggle").click(function(){
        $("#slideToggleContenu").slideToggle(1000); // Gère les deux, fermer et ouvrir
    })     

    // ACCORDEON 

    $(".accordionTitre").click(function(){

        // $(".accordionContenu").slideToggle(1000); // Ici problème, le premier element s'ouvre et les deux autres fonctionnent ensemble... ce n'est pas ce qu'on veut ! On aimerait un accordeon donc un seul element ouvert à la fois maximum ! 
        $(".accordionContenu").not( $(this).next()).slideUp(1000);  // le .not($this).next() me permet d'exclure le contenu cliqué du slideUp, grâce à cette ligne, je ferme tous les contenus sauf celui que je viens de cliquer
        // Le toggle d'après permet soit d'ouvrir soit de fermer le contenu cliqué 
        $(this).next().slideToggle(1000);
    })

    // ANIMATE
    // Nous permet d'appliquer du css à un élément et de gérer une transition entre les deux états 

    $("#simple").mouseenter(function(){
        $(this).animate({left : "200px", backgroundColor: "red"}, 2000)
    });

    $("#double").dblclick(function(){
        $(this).animate({left : "280px", top : "280px"}, 2000).fadeOut(2000);
    });

    $("#toggle").dblclick(function(){
        $("#double").animate({width: "toggle", height: "toggle", left: "0px", top: "0px"}, 2000);
    });

    $("#animation").click(function(){
        $(this).animate({left: "280px"}, 1000)
        .animate({bottom: "280px", width : "280px", height: "280px"}, 1000)
        .animate({borderRadius: "50%"}, 1000)
        .delay(3000) // delay() permet de mettre un timer d'attente
        .animate({width : "140px", height : "140px"}, 1000)
        .animate({bottom: "0", left: "0"}, 1000)
        .animate({borderRadius: "0"}, 1000);
    })

    $("#monBloc input").keyup(function(){
        $("#monBloc input").val($(this).val());
    })


})