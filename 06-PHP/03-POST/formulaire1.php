<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulaire 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header class="bg-primary p-5 text-center text-white">
        <h1>Formulaire</h1>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-sm-6 mt-5 mx-auto">
                <?php
                // Attributs du form :
                    // action="" : représente l'url cible lors de la validation du form (si vide, on reste sur la page lors de la validation)
                    // method="" : la methode utilisée pour envoyer les données (get par defaut si non précisé), on priviligera la method post sur les form
                    // enctype="multipart/form-data" : Obligatoire s'il y a une pièce jointe dans le form (input type="file")

                // Attributs des champs :
                    // for="" : pour lier le label au champ (lié à l'id du champ)
                    // name="" : représente le nom du champ que l'on retrouvera comme indice dans le tableau $_GET ou $_POST (on ne récupère pas la valeur si le champ n'a pas de name="")

                    /*
                    echo '<pre>';
                    print_r($_POST);
                    echo '</pre>';
                    */

                    // Affichez proprement (avec des echo) les informations provenants de la validation du form

                    if(isset($_POST['pseudo']) && isset($_POST['email'])) { // est-ce que le form a été validé ?
                        echo 'Le pseudo est : ' . $_POST['pseudo'] . '<br>';
                        echo 'Le mail est : ' . $_POST['email'] . '<br>';

                        // trim() est une fonction prédéfinie permettant d'enlever les espaces en début et en fin de chaine (pas au milieu)
                        // Au passage on en profite pour renommer les variable de manière plus simple en écriture
                        $pseudo = trim($_POST['pseudo']);
                        $email = trim($_POST['email']);

                        $taille_pseudo = iconv_strlen($pseudo);

                        // Exercice : faire un if qui vérifie la taille du pseudo :
                            // Si le pseudo fait moins de 4 caractères ou plus de 14, on affiche un message d'erreur
                            // Sinon on affiche "taille du pseudo ok"

                        if($taille_pseudo < 4 || $taille_pseudo > 14) {
                            echo '<div class="alert alert-danger">Attention, le pseudo doit avoir entre 4 et 14 caractères inclus.</div>';
                        } else {
                            echo '<div class="alert alert-success">Taille du pseudo ok !</div>';
                        }


                        // https://stackoverflow.com/questions/19220158/php-filter-validate-email-does-not-work-correctly

                        // Pour tester le format du mail
                        // filter_var()
                        // https://www.php.net/manual/fr/function.filter-var.php
                        // https://www.php.net/manual/fr/filter.filters.validate.php

                        if( filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            echo '<div class="alert alert-success">Format du mail ok !</div>';
                        } else {
                            echo '<div class="alert alert-danger">Attention, Format du mail incorrect.</div>';
                        }
                        






                    }

                
                
                ?>
                <form action="" method="POST" enctype="multipart/form-data" class="border p-3">
                    <div class="mb-3">
                        <label for="pseudo" class="form-label">Pseudo</label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <button type="submit"  class="btn btn-outline-primary w-100">Valider 🐿️</button>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>