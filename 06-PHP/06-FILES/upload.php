<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Galerie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header class="bg-dark p-5 text-center text-white">
        <h1>Galerie</h1>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-sm-6 mt-5 mx-auto">
                <?php
                    // l'attribut enctype avec cette valeur est obligatoire pour récupèrer les pièces jointes dans un form.
                    // Les fichiers seront dans la superglobale $_FILES
                    var_dump($_FILES);
                    /*
                    array (size=1)
                        'image' => 
                            array (size=6)
                            'name' => string '' (length=0)
                            'full_path' => string '' (length=0)
                            'type' => string '' (length=0)
                            'tmp_name' => string '' (length=0)
                            'error' => int 4
                            'size' => int 0
                    */

                    if( ! empty($_FILES['image']['name']) ) { 
                        // si le name du fichier n'est pas vide : un fichier est chargé

                        // On crée un tableau array contenant les extension autorisées
                        $tab_extensions = array('.png', '.jpg', '.jpeg', '.gif', '.webp');

                        // strrchr() permet de découper une chaine en partant de la fin selon un caractère fourni en argment, on récupère le morceau avec le caractère fourni
                        // exemple : strrchr('fichier.txt', '.') => on récupère .txt
                        // exemple : strrchr('truc.pdf', '.') => on récupère .pdf
                        $extension = strrchr($_FILES['image']['name'], '.');
                        // on force les minuscules sur le nom au cas où
                        $extension = strtolower($extension);

                        // in_array() renvoie true ou false selon si le premier est trouvé parmis les valeurs du tableau fourni en deuxième argument.
                        if(in_array($extension, $tab_extensions)) {
                            // le format est ok
                            // Pour éviter d'écraser une image du même nom, on réécrit le nom de l'image avec uniqid() qui donne une chaine normalement "unique" (voir la doc)
                            $nom_fichier = uniqid() . $extension;

                            // on enregistre depuis son emplacement temporaire (tmp_name) vers le dossier de notre choix
                            // Pour enregistrer un fichier, on doit passer par le chemin du serveur (pas l'url) exemple ! c:/wamp64/...
                            // copy(emplacement_temporaire, emplacement_cible/nom_fichier)
                            copy($_FILES['image']['tmp_name'], __DIR__ . '/img/' . $nom_fichier);

                        } else {
                            echo '<div class="alert alert-danger">Format non valide, formats acceptés : jpg, jpeg, png, gif et webp</div>';
                        }
                    }

                    // echo uniqid();
                    // echo __DIR__ ;
                ?>
                <form action="" method="POST" enctype="multipart/form-data" class="border p-3">
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>                  
                    <button type="submit"  class="btn btn-outline-primary w-100">Valider 🖼️</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-5 d-flex flex-wrap justify-content-between p-3 border">
                <?php
                    // on récupère les images présentent dans le dossier img (on précise les fomrats que l'on souhaite)
                    // on récupère un tableau array avec le nom des images
                    $liste_images = glob('img/*.{webp,jpg,jpeg,png,gif}', GLOB_BRACE);
                    // var_dump($liste_images);

                    // pour supprimer un fichier : unlink()

                    // EXERCICE : affichez dans la page html les images récupérées dans le tableau $liste_images
                    foreach($liste_images AS $img) {
                        echo '<img src="' . $img . '" class="mb-3" width="24%" alt="">';
                    }
                ?>
            </div>
            <div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>