---------------------------- FONCTIONS PREDEFINIES ---------------------------------

-- Doc SQL : https://sql.sh 
-- Nous allons voir ici quelques exemples de fonctions prédéfinies 


USE bibliotheque;  

SELECT DATABASE(); -- Fonction indiquant quelle est la bdd actuellement utilisée

SELECT CONCAT("a", "b", "c"); -- Permet de concaténer (faire suivre) des informations 

SELECT CONCAT_WS(' - ', 'a', 'b', 'c'); -- Permet de concaténer des informations avec un supérateur WS = With Separator 

SELECT CONCAT_WS(" ", id_abonne, prenom) AS "Liste" FROM abonne;
-- Cette fonction nous permet d'afficher dans un seul et même champ de résultat,  plusieurs champs de notre table
-------------+
| Liste       |
+-------------+
| 1 Guillaume |
| 2 Benoit    |
| 3 Chloe     |
| 4 Laura     |
| 5 Pierra    |
+-------------+
SELECT * FROM abonne;
-----------+-----------+
| id_abonne | prenom    |
+-----------+-----------+
|         1 | Guillaume |
|         2 | Benoit    |
|         3 | Chloe     |
|         4 | Laura     |
|         5 | Pierra    |
+-----------+-----------+

SELECT SUBSTRING("bonjour", 4); -- Permet de couper une chaine 
+-------------------------+
| SUBSTRING("bonjour", 4) |
+-------------------------+
| jour                    |
+-------------------------+

SELECT LOCATE("j", "aujourdhui"); -- Locate nous permet de retourner la position d'une chaine dans une autre
SELECT REPLACE("www.monsite.fr", "fr", "com"); -- Replace nous permet de remplacer un element par un autre dans une chaine 
SELECT UPPER("Salut"); -- Mets toute la section en majuscule 

SELECT LENGTH("bonjour"); -- La longueur de la chaine 

SELECT PASSWORD('test'); -- Permet de crypter une chaine (ne fonctionne pas sous le MySQL de WAMP) 
                        -- ATTENTION, on préfèrera toujours crypter les password grâce à notre langage back, cela permet l'utilisation de meilleurs algorithme de cryptage

SELECT TRIM("      Pierra"); -- Permet de supprimer tous les espaces en début et en fin de chaine (pas au milieu !)
----------------------+
| TRIM("      Pierra") |
+----------------------+
| Pierra               |
+----------------------+

SELECT CURDATE(); -- La date du jour
SELECT CURTIME(); -- L'heure de l'instant
SELECT NOW(); -- La date et l'heure

SELECT prenom, date_sortie 
FROM abonne, emprunt 
WHERE abonne.id_abonne = emprunt.id_abonne;

-- DATE_ADD nous permet d'ajouter une valeur de temps à un format date
SELECT DATE_ADD(CURDATE(), INTERVAL 7 DAY);
SELECT DATE_ADD("2024-01-01", INTERVAL 2 MONTH);
SELECT DATE_ADD("2024-01-01", INTERVAL 1 YEAR);

-- Nous permet de calculer une date limite de retour pour les emprunts de la biblio, max un mois après la date d'emprunt 
SELECT date_sortie, DATE_ADD(date_sortie, INTERVAL 1 MONTH) FROM emprunt;

-- DAYNAME nous présente le nom du jour fourni en paramètre (en anglais, Monday, Tuesday, etc)
SELECT DAYNAME(CURDATE());

-- DATEDIFF nous donne l'intervale de temps en jour, entre deux dates 
SELECT DATEDIFF( CURDATE(), "2024-04-01" );

-- DATE_FORMAT(date_concernée, format_attendu); nous permet de choisir le format de sortie d'un champ date 
-- Le deuxieme argument de cette fonction est une chaine de caractères contenant des tokens de remplacement
-- Doc de DATE_FORMAT https://sql.sh/fonctions/date_format
SELECT prenom, DATE_FORMAT(date_sortie, "%d/%m/%Y") AS "date de sortie fr"
FROM abonne, emprunt 
WHERE abonne.id_abonne = emprunt.id_abonne;

    -- Quelques Tokens de remplacement :
-- %Y : l'année sur 4 chiffres
-- %y : l'année sur 2 chiffres
-- %m : le mois sur 2 chiffres
-- %d : le jour sur 2 chiffres 

-- EXERCICE : Avec DATE_FORMAT, affichez : "Nous sommes Thu 14/03/2024, et il est : 10:53:50"
SELECT CONCAT(DATE_FORMAT(NOW(), "Nous sommes %a %d/%m/%Y"), DATE_FORMAT(NOW(), " et il est : %H:%i:%s"));
SELECT DATE_FORMAT(NOW(), "Nous sommes %a %d/%m/%Y et il est : %H:%i:%s");
SELECT DATE_FORMAT(NOW(), "Nous sommes %a %d/%m/%Y et il est : %T") AS "Message de bienvenue";


