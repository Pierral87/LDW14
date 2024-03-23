
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulaire 2 affichage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header class="bg-danger p-5 text-center text-white">
        <h1>Formulaire 2 affichage</h1>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-5">
                <a href="formulaire2.php" class="btn btn-outline-dark">Retour</a><hr>
                <?php 
                    /*
                    echo '<pre>';
                    print_r($_POST);
                    echo '</pre>';
                    */
                    if( isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) ) {

                        $nom = trim($_POST['nom']);
                        $prenom = trim($_POST['prenom']);
                        $email = trim($_POST['email']);

                        // on crée une variable avec une valeur afin de pouvoir tester plus bas s'il y a eu des erreurs dans les controles réalisés
                        $erreur = 'non';

                        if(empty($nom)) {
                            echo '<div class="alert alert-danger mb-3">Attention, le nom est obligatoire.</div>';
                            // cas d'erreur
                            $erreur = 'oui';
                        } else {
                            echo 'Nom : <b>' . $nom . '</b><hr>';
                        }

                        if(iconv_strlen($prenom) < 1) {
                            echo '<div class="alert alert-danger mb-3">Attention, le prénom est obligatoire.</div>';
                            // cas d'erreur
                            $erreur = 'oui';
                        } else {
                            echo 'Prénom : <b>' . $prenom . '</b><hr>';
                        }

                        // avec le ! on attend l'inverse : il faut que le format ne soit pas correct pour rentrer dans le if
                        if( ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            echo '<div class="alert alert-danger mb-3">Attention, le format est incorrect.</div>';
                            // cas d'erreur
                            $erreur = 'oui';
                        } else {
                            echo 'Email : <b>' . $email . '</b><hr>';
                        }

                        // s'il n'y a pas eu d'erreur on enregistre sur un fichier text
                        if($erreur == 'non') {
                            // si la variable $erreur est égale à 'oui', on ne fait rien car l'utilisateur devrait d'abord corriger son ou ses erreurs

                            // fopen() permet d'écrire ou de lire et aussi de créer un fichier selon le deuxième argument fourni (voir la doc pour le détail)
                            // le mode "a" permet d'ouvrir ou de créer le fichier et d'écrire à la suite chaque nouvelle entrée.
                            // https://www.php.net/manual/fr/function.fopen.php
                            $fichier = fopen('liste.txt', 'a');

                            // on conserve le nom, prénom et email dans le fichier
                            // PHP_EOL permet de mettre le bon caractère de retour à la ligne dans un fichier.
                            // fwrite permet d'écrire dans un fichier
                            $ligne = $nom . ' | ' . $prenom . ' | ' . $email . PHP_EOL;
                            fwrite($fichier, $ligne);

                            // fclose() permet de fermer un fichier pour récupérer de la mémoire
                            fclose($fichier);
                        }
                    } // fin des isset


                    // Maintenant que nous avons enregistré ces données, nous allons les récupérer depuis le fichier afin de les afficher dans cette page.
                    // file_exists() permet de savoir si un fichier ou un dossier existe selon le chemin fourni en argument
                    if( file_exists('liste.txt') ) {

                        // file() fait tout le travail pour nous.
                        // cette fonction récupère chaque ligne d'un fichier et nous renvoie un tableau array avec toutes les lignes dans des indices différents
                        $contenu_fichier = file('liste.txt');
                        /*
                        echo '<pre>';
                        print_r($contenu_fichier);
                        echo '</pre>';
                        */
                        // Exercice : affichez chaque ligne du tableau dans une liste ul li
                        echo '<ul>';

                        foreach($contenu_fichier AS $info) {

                            // echo '<li>' . $info . '</li>';
                            
                            // implode() regroupe les éléments d'un tableau array en une chaine.
                            // explode() découpe une chaine selon un séparateur et nous renvoie un tableau array
                            $infos = explode(' | ', $info);
                            /*
                            echo '<pre>';
                            print_r($infos);
                            echo '</pre>';
                            */
                            echo '<li><b>Nom : </b> ' . $infos[0] . '<br> <b>Prénom : </b> ' . $infos[1] . '<br> <b>Email : </b> ' . $infos[2] . '<hr></li>';
                            
                            
                        }

                        echo '</ul>';
                    }




                
                ?>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>