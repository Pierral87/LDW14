<?php 
// Faire un formulaire avec les champs suivants :

    // nom type="text"
    // prénom type="text"
    // email type="text"
    // sujet type="text"
    // message textarea

    // faire les if isset
    // renommer les infos dans des variables simples en appliquant un trim() au passage

if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['sujet']) && isset($_POST['message'])) {

    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $email = trim($_POST['email']);
    $sujet = trim($_POST['sujet']);
    $message = trim($_POST['message']);

    // Controles sur les données ! (à faire)
    // Pour envoyer un mail :
    // mail()
    // Pour aller plus loin voir les outils suivants : PHPMailer (voir sur Github) et/ou Mailer (symfony)

    // mail($destinataire, $sujet, $message, $expediteur);
    $message = 'Nom : ' . $nom . PHP_EOL . 'Prénom : ' . $prenom . PHP_EOL . 'Message : ' . $message;

    // Pour une meilleure acceptation du mail on rajoute From: devant l'expéditeur
    $email = 'From: ' . $email;

    // on envoi
    mail('mail@gmail.com', $sujet, $message, $email);

}
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulaire contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header class="bg-primary p-5 text-center text-white">
        <h1>🤖 Contact 🧐</h1>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-sm-6 mt-5 mx-auto">
                <form action="" method="POST" class="border p-3">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom 🐯</label>
                        <input type="text" class="form-control" id="nom" name="nom">
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom 🐼</label>
                        <input type="text" class="form-control" id="prenom" name="prenom">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email 😺</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="sujet" class="form-label">Sujet 🐰</label>
                        <input type="text" class="form-control" id="sujet" name="sujet">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message 👻</label>
                        <textarea class="form-control" id="message" name="message"></textarea>
                    </div>
                    <button type="submit"  class="btn btn-outline-primary w-100">✉️ Valider ✉️</button>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>