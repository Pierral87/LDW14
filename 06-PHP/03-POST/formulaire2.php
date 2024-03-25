<?php
// Faire un formulaire avec les champs suivants :
    // Nom (input type="text")
    // Prénom (input type="text")
    // Email (input type="text")

// Lors de la validation du form, nous devons arriver sur la page formulaire2_affichage.php et c'est sur cette page qu'on traite les données du form

// Contrôles à réaliser :
    // Le nom et le prénom ne doivent pas être vide
    // Le format du mail doit être correct

// Si les informations sont correctes, on les affiche
// Sinon des messages d'erreur
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulaire 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header class="bg-primary p-5 text-center text-white">
        <h1>Formulaire 2</h1>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-sm-6 mt-5 mx-auto">
                <form action="formulaire2_affichage.php" method="POST" enctype="multipart/form-data" class="border p-3">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom">
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom">
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