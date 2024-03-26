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