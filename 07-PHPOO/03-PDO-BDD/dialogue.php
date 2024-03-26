<?php

/* 
EXERCICE : 
--------------

- Création d'un espace de dialogue - Tchat en ligne

- 01 - Création de la BDD : dialogue 
        - Table : commentaire 
        - Champs de la table commentaire : 
            - id_commentaire        INT(3) PRIMARY KEY, AUTO-INCREMENT
            - pseudo                VARCHAR (255)
            - message               TEXT
            - date_enregistrement   DATETIME

- 02 - Créer une connexion à cette base avec PDO (création de l'objet PDO)
- 03 - Création d'un formulaire permettant de poster un message (html)
        - Champs du formulaire : 
                - pseudo (input type text)
                - message (textarea)
                - bouton de validation (submit)
- 04 - Récupération des saisies du form avec contrôles (vérif du POST et contrôles des saisies)
- 05 - Déclenchement d'une requête d'enregistrement pour enregistrer les saisies dans la BDD (on insère ce qui a été récupéré et controlé à l'étape 4)
- 06 - Requête de selection des messages afin de les afficher dans cette page (pdo -> pdostmt -> fetch -> data à utiliser)
- 07 - Affichage des commentaires avec un peu de mise en forme 
- 08 - Affichage en haut des messages du nombre de messages présents dans la BDD
- 09 - Affichage de la date en français dans les messages 
- 10 - Amélioration du css
*/




// 02 - Créer une connexion à cette base avec PDO (création de l'objet PDO)
$host = "mysql:host=localhost;dbname=dialogue";
$login = "root";
$password = "";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
);

// Création de l'objet : 
$pdo = new PDO($host, $login, $password, $options);
// var_dump($pdo);
$messageErreur = "";
$requete = "";

// - 04 - Récupération des saisies du form avec contrôles (vérif du POST et contrôles des saisies)
if (isset($_POST["pseudo"]) && isset($_POST["message"])) {
    // var_dump($_POST);

    $pseudo = trim($_POST["pseudo"]);
    $message = trim($_POST["message"]);
    $erreur = "non";

    if (empty($pseudo) || empty($message)) {
        // cas d'erreur
        $erreur = "oui";
        $messageErreur .= "<div class='alert alert-danger' role='alert'>Attention, veuillez bien saisir les deux champs du formulaire !</div>";
    }

    if (iconv_strlen($pseudo) < 3 || iconv_strlen($pseudo) > 30) {
        $erreur = "oui";
        $messageErreur .= "<div class='alert alert-danger' role='alert'>Attention, le pseudo doit être compris entre 3 et 30 caractères !</div>";
    }

    if (iconv_strlen($message) < 3) {
        $erreur = "oui";
        $messageErreur .= "<div class='alert alert-danger' role='alert'>Attention, le message ne peut pas faire moins de 3 caractères !</div>";
    }

    if ($erreur == "non") {
        // - 05 - Déclenchement d'une requête d'enregistrement pour enregistrer les saisies dans la BDD (on insère ce qui a été récupéré et controlé à l'étape 4)
        $requete = "INSERT INTO commentaire (pseudo, message, date_enregistrement) VALUES ('$pseudo', '$message', NOW())";
        // $pdoStmt = $pdo->query($requete);
        $pdoStmt = $pdo->prepare("INSERT INTO commentaire (pseudo, message, date_enregistrement) VALUES (:pseudo, :message, NOW())");
        $pdoStmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $pdoStmt->bindParam(':message', $message, PDO::PARAM_STR);
        $pdoStmt->execute();
    }
}

// On teste la suppression des messages, ici condition qui permet d'être sûr qu'une suppression est demandée
if (isset($_GET["action"]) && $_GET["action"] == "delete" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $pdoStmt = $pdo->prepare("DELETE FROM commentaire WHERE id_commentaire = :id");
    $pdoStmt->bindParam(':id', $id, PDO::PARAM_STR);
    $pdoStmt->execute();

}

// - 06 - Requête de selection des messages afin de les afficher dans cette page (pdo -> pdostmt -> fetch -> data à utiliser)
// - 09 - Affichage de la date en français dans les messages 
$data = $pdo->query("SELECT id_commentaire, pseudo, message, DATE_FORMAT(date_enregistrement, '%d/%m/%Y à %T') AS date_fr FROM commentaire ORDER BY date_enregistrement DESC");

// $commentaires = $data->fetchAll(PDO::FETCH_ASSOC);
// var_dump($commentaires);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Chat en ligne</title>
</head>

<body class="bg-secondary">
    <div class="container bg-light">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center text-dark p-5 border-bottom">Espace de dialogue</h2>
                <!-- - 03 - Création d'un formulaire permettant de poster un message (html) -->
                <form method="post" class="mt-5 mx-auto w-50 border p-3 bg-white">
                    <?= $messageErreur ?>
                    <?= $requete ?>
                    <div class="mb-3">
                        <label for="pseudo" class="form-label">Pseudo</label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-secondary w-100">Enregistrer</button>
                </form>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <!-- - 08 - Affichage en haut des messages du nombre de messages présents dans la BDD -->
                <p>Il y a : <b><?= $data->rowCount() ?></b> messages</p>
                <?php
                while ($commentaire = $data->fetch(PDO::FETCH_ASSOC)) : ?>
                    <!-- - 07 - Affichage des commentaires avec un peu de mise en forme  -->
                    <div class="card w-75 mx-auto mb-3">
                        <div class="card-header bg-dark text-white">
                            Par : <?= $commentaire["pseudo"] ?>, le : <?= $commentaire["date_fr"] ?> ----- <a href="?action=delete&id=<?= $commentaire["id_commentaire"]?>">Suppr</a>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><?= $commentaire["message"] ?></p>
                        </div>
                    </div>

                <?php endwhile;
                ?>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>