<?php

    // $_COOKIE est une superglobale qui existe toujours car liée à l'HTTP 

    if(isset($_GET['choix'])) {
        // si l'utilisateur a choisi une langue en cliquant sur un des liens
        $langue = $_GET['choix'];
    } elseif(isset($_COOKIE['LANG'])) {
        // l'utilisateur a un cookie avec son choix précédant
        $langue = $_COOKIE['LANG'];
    } else {
        // sinon une langue par défaut
        $langue = 'fr';
    }

    // on va créer un cookie dans le navigateur de l'utilisateur afin de conserver son choix de langue.
    // setcookie('SON_NOM', 'sa_valeur', 'sa_duree_de_vie')

    // on calcule le nombre de seconde dans une année :
    $un_an = 365*24*3600;
    // La durée de vie du cookie se base sur le timestamp, lorsque le timestamp a dépassé la durée de vie du cookie, le navigateur va le supprimer.
    $duree_de_vie = time() + $un_an;

    // ⚠️ setcookie() ne fonctionnera pas s'il y a un affichage dans la page avant !!!  
    setcookie('LANG', $langue, $duree_de_vie);
    

?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Galerie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header class="bg-success p-5 text-center text-white">
        <h1>Langue</h1>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-sm-3 mt-5">
                <ul class="list-group">
                    <li class="list-group-item"><a href="?choix=fr">Français</a></li>
                    <li class="list-group-item"><a href="?choix=es">Espagnol</a></li>
                    <li class="list-group-item"><a href="?choix=it">Italien</a></li>
                    <li class="list-group-item"><a href="?choix=en">Anglais</a></li>
                </ul>
            </div>
            <div class="col-sm-9 mt-5">
                <?php 
                    if($langue == 'fr') {
                        echo '<h2 class="text-center">Bonjour, bienvenue sur notre site,<br>vous visitez actuellement le site en langue française.</h2>';
                    } elseif($langue == 'en') {
                        echo '<h2 class="text-center">Hello, welcome to our site,<br>you are currently visiting the site in English.</h2>';
                    } elseif($langue == 'es') {
                        echo '<h2 class="text-center"> Hola, bienvenido a nuestro sitio,<br>actualmente estás visitando el sitio en español.</h2>';
                    } elseif($langue == 'it') {
                        echo '<h2 class="text-center">Ciao, benvenuto sul nostro sito,<br>al momento stai visitando il sito in italiano.</h2>';
                    } else {
                        // la valeur de la langue est modifiée dans l'url
                        echo '<h2 class="text-center">Bonjour, bienvenue sur notre site,<br>vous visitez actuellement le site en langue française.</h2>';
                    }

                    echo '<hr><p class="mt-5">Timestamp actuel : ' . time() . '</p>';
                    echo '<hr><p class="mt-5">Liste des cookies : </p>';
                    echo '<pre>';
                    print_r($_COOKIE);
                    echo '</pre>';

                    // $_SERVER superglobale qui existe toujours contenant des informations sur le serveur et sur l'utilisateur

                    // il est possible de récupérer la langue du navigateur
                    echo '<p>Langue du navigateur : ' . substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) . '</p>';

                    echo '<pre>';
                    print_r($_SERVER);
                    echo '</pre>';


               
                ?>
            </div>
            
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>