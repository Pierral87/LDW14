CREATE DATABASE bibliotheque;
USE bibliotheque;

CREATE TABLE abonne (
  id_abonne INT(3) NOT NULL AUTO_INCREMENT,
  prenom VARCHAR(15) NOT NULL,
  PRIMARY KEY (id_abonne)
) ENGINE=InnoDB ;

INSERT INTO abonne (id_abonne, prenom) VALUES
(1, 'Guillaume'),
(2, 'Benoit'),
(3, 'Chloe'),
(4, 'Laura');


CREATE TABLE livre (
  id_livre INT(3) NOT NULL AUTO_INCREMENT,
  auteur VARCHAR(25) NOT NULL,
  titre VARCHAR(30) NOT NULL,
  PRIMARY KEY (id_livre)
) ENGINE=InnoDB ;

INSERT INTO livre (id_livre, auteur, titre) VALUES
(100, 'GUY DE MAUPASSANT', 'Une vie'),
(101, 'GUY DE MAUPASSANT', 'Bel-Ami '),
(102, 'HONORE DE BALZAC', 'Le pere Goriot'),
(103, 'ALPHONSE DAUDET', 'Le Petit chose'),
(104, 'ALEXANDRE DUMAS', 'La Reine Margot'),
(105, 'ALEXANDRE DUMAS', 'Les Trois Mousquetaires');

CREATE TABLE emprunt (
  id_emprunt INT(3) NOT NULL AUTO_INCREMENT,
  id_livre INT(3) DEFAULT NULL,
  id_abonne INT(3) DEFAULT NULL,
  date_sortie DATE NOT NULL,
  date_rendu DATE DEFAULT NULL,
  PRIMARY KEY  (id_emprunt)
) ENGINE=InnoDB ;

INSERT INTO emprunt (id_emprunt, id_livre, id_abonne, date_sortie, date_rendu) VALUES
(1, 100, 1, '2016-12-07', '2016-12-11'),
(2, 101, 2, '2016-12-07', '2016-12-18'),
(3, 100, 3, '2016-12-11', '2016-12-19'),
(4, 103, 4, '2016-12-12', '2016-12-22'),
(5, 104, 1, '2016-12-15', '2016-12-30'),
(6, 105, 2, '2017-01-02', '2017-01-15'),
(7, 105, 3, '2017-02-15', NULL),
(8, 100, 2, '2017-02-20', NULL);

SHOW TABLES;
+------------------------+
| Tables_in_bibliotheque |
+------------------------+
| abonne                 |
| emprunt                |
| livre                  |
+------------------------+
 SELECT * FROM abonne;
+-----------+-----------+
| id_abonne | prenom    |
+-----------+-----------+
|         1 | Guillaume |
|         2 | Benoit    |
|         3 | Chloe     |
|         4 | Laura     |
+-----------+-----------+
SELECT * FROM emprunt;
+------------+----------+-----------+-------------+------------+
| id_emprunt | id_livre | id_abonne | date_sortie | date_rendu |
+------------+----------+-----------+-------------+------------+
|          1 |      100 |         1 | 2016-12-07  | 2016-12-11 |
|          2 |      101 |         2 | 2016-12-07  | 2016-12-18 |
|          3 |      100 |         3 | 2016-12-11  | 2016-12-19 |
|          4 |      103 |         4 | 2016-12-12  | 2016-12-22 |
|          5 |      104 |         1 | 2016-12-15  | 2016-12-30 |
|          6 |      105 |         2 | 2017-01-02  | 2017-01-15 |
|          7 |      105 |         3 | 2017-02-15  | NULL       |
|          8 |      100 |         2 | 2017-02-20  | NULL       |
+------------+----------+-----------+-------------+------------+
 SELECT * FROM livre;
+----------+-------------------+-------------------------+
| id_livre | auteur            | titre                   |
+----------+-------------------+-------------------------+
|      100 | GUY DE MAUPASSANT | Une vie                 |
|      101 | GUY DE MAUPASSANT | Bel-Ami                 |
|      102 | HONORE DE BALZAC  | Le pere Goriot          |
|      103 | ALPHONSE DAUDET   | Le Petit chose          |
|      104 | ALEXANDRE DUMAS   | La Reine Margot         |
|      105 | ALEXANDRE DUMAS   | Les Trois Mousquetaires |
+----------+-------------------+-------------------------+


-- Quels sont les id_livre des livres qui n'ont pas été rendus à la bibliothèque ?
SELECT id_livre FROM emprunt WHERE date_rendu IS NULL;
+----------+
| id_livre |
+----------+
|      105 |
|      100 |
+----------+
-- La valeur NULL se teste avec IS NULL   IS NOT NULL 

-- Pour avoir les titres des livres ?... Ces informations se trouvent sur une autre table ! La table Livre 
-- 2 possibilités : 
    -- Requêtes Imbriquées 
    -- Requêtes en Jointure 

------------------------------------------------------------------------------
------------------------------------------------------------------------------
------------ REQUETES IMBRIQUEES (sur plusieurs tables) ----------------------
------------------------------------------------------------------------------
------------------------------------------------------------------------------

-- Quels sont les titres des livres qui n'ont pas été rendus à la bibliothèque ?


-- Cherchons d'abord en réfléchissant sur une seule table, si je veux le titre du livre id 100 ?
SELECT titre FROM livre WHERE id_livre = 100;  
+---------+
| titre   |
+---------+
| Une vie |
+---------+
-- Cherchons maintenant, à récupérer les titres des livres id 100 et id 105  (les deux non rendus)
SELECT titre FROM livre WHERE id_livre IN (100,105);  


-- Et maintenant, on peut le faire sans écrire directement 100 et 105, le but étant de récupérer les titres des livres non rendus à la bibliothèque
-- En gros, je me sers du résultat d'une autre requête, pour mener à bien la première
-- Les requêtes imbriquées s'executent, si on voulait l'imaginer de façon logique, par la fin, la sous requête s'exécute en premier que la requête principale (sinon celle ci ne pourrait pas fonctionner)
SELECT titre FROM livre WHERE id_livre IN 
    (SELECT id_livre FROM emprunt WHERE date_rendu IS NULL);  
-- Aussi attention un WHERE id_livre =  ne pourrait pas fonctionner car la sous requête renvoi deux valeurs, donc j'ai la nécessité de mettre toujours "IN"
-- Pour lancer une requête imbriquée il faut TOUJOURS un champ commun 
-- Egalement, la condition de liaison, doit pointer sur le même champ qui est sélectionné par la sous-requête (ici la condition c'est sur id_livre, donc c'est obligatoirement id_livre uniquement que je dois SELECT dans la sous requête)

-- EXERCICE 1 : Quels sont les prénoms des abonnés n'ayant pas rendu un livre à la bibliotheque.
SELECT prenom FROM abonne WHERE id_abonne IN 
    (SELECT id_abonne FROM emprunt WHERE date_rendu IS NULL);
+--------+
| prenom |
+--------+
| Benoit |
| Chloe  |
+--------+
-- EXERCICE 2 : Nous aimerions connaitre le(s) n° des livres empruntés par Chloé
SELECT id_livre FROM emprunt WHERE id_abonne IN 
    (SELECT id_abonne FROM abonne WHERE prenom = "Chloe");
+----------+
| id_livre |
+----------+
|      100 |
|      105 |
+----------+
-- EXERCICE 3 : Affichez les prénoms des abonnés ayant emprunté un livre le 07/12/2016.
SELECT prenom FROM abonne WHERE id_abonne IN 
    (SELECT id_abonne FROM emprunt WHERE date_sortie = "2016-12-07");
+-----------+
| prenom    |
+-----------+
| Guillaume |
| Benoit    |
+-----------+
-- EXERCICE 4 : combien de livre Guillaume a emprunté à la bibliotheque ?
SELECT COUNT(*) AS "Nombre livre emprunte par Guillaume" FROM emprunt WHERE id_abonne = 
    (SELECT id_abonne FROM abonne WHERE prenom = "Guillaume");
+-------------------------------------+
| Nombre livre emprunte par Guillaume |
+-------------------------------------+
|                                   2 |
+-------------------------------------+
-- EXERCICE 5 : Affichez la liste des abonnés (les prenoms) ayant déjà emprunté un livre d'Alphonse Daudet
SELECT prenom FROM abonne WHERE id_abonne IN 
    (SELECT id_abonne FROM emprunt WHERE id_livre IN 
        (SELECT id_livre FROM livre WHERE auteur = "Alphonse Daudet"));
+--------+
| prenom |
+--------+
| Laura  |
+--------+
-- EXERCICE 6 : Nous aimerions connaitre les titres des livres que Chloe a emprunté à la bibliotheque.
SELECT titre FROM livre WHERE id_livre IN 
    (SELECT id_livre FROM emprunt WHERE id_abonne IN 
        (SELECT id_abonne FROM abonne WHERE prenom = "Chloe"));
+-------------------------+
| titre                   |
+-------------------------+
| Une vie                 |
| Les Trois Mousquetaires |
+-------------------------+
-- EXERCICE 7 : Nous aimerions connaitre les titres des livres que Chloe n'a pas emprunté à la bibliotheque.
SELECT titre FROM livre WHERE id_livre NOT IN 
    (SELECT id_livre FROM emprunt WHERE id_abonne IN 
        (SELECT id_abonne FROM abonne WHERE prenom = "Chloe"));
-- EXERCICE 8 : Nous aimerions connaitre les titres des livres que Chloe a emprunté à la bibliotheque ET qui n'ont pas été rendu.
SELECT titre FROM livre WHERE id_livre IN 
    (SELECT id_livre FROM emprunt WHERE id_abonne IN 
        (SELECT id_abonne FROM abonne WHERE prenom = "Chloe") AND date_rendu IS NULL);  

SELECT titre FROM livre WHERE id_livre IN 
    (SELECT id_livre FROM emprunt WHERE date_rendu IS NULL AND id_abonne IN
        (SELECT id_abonne FROM abonne WHERE prenom = "Chloe"));  
+-------------------------+
| titre                   |
+-------------------------+
| Les Trois Mousquetaires |
+-------------------------+
   

-- EXERCICE 9 : Qui a emprunté le plus de livre à la bibliotheque ?
SELECT prenom FROM abonne WHERE id_abonne = 
    (SELECT id_abonne FROM emprunt GROUP BY id_abonne ORDER BY COUNT(*) DESC LIMIT 1);
+--------+
| prenom |
+--------+
| Benoit |
+--------+

SELECT prenom FROM abonne WHERE id_abonne IN
    (SELECT id_abonne FROM emprunt GROUP BY id_abonne ORDER BY COUNT(*));

-- Malheureusement on ne peut pas afficher conjointement le prenom venant de la table abonné et le count venant de la table emprunt... C'est une limitation des requêtes imbriquées, on ne peut afficher des informations venant que d'une seule table !
-- Cette limitation n'existe pas lorsque l'on fait des requêtes en jointure !
-- C'est d'ailleurs les requêtes en jointure que l'on favorisera pour toutes nos requêtes compliquées 


-- Ici réalisée en jointure
SELECT prenom, COUNT(*) AS "nombre emprunts" 
FROM abonne, emprunt 
WHERE abonne.id_abonne = emprunt.id_abonne 
GROUP BY emprunt.id_abonne 
ORDER BY COUNT(*) DESC;


------------------------------------------------------------------------------
------------------------------------------------------------------------------
------------ REQUETES EN JOINTURE (sur plusieurs tables) ---------------------
------------------------------------------------------------------------------
------------------------------------------------------------------------------
-- Une jointure est toujours possible 
-- Une imbriquée est possible uniquement si les champs que l'on souhaite affichés ne proviennent que d'une seule table 

-- Avec des requêtes imbriquées on parcourt les tables les unes après les autres, requête par requête 
-- Avec des requêtes en jointure, on mélange les champs de sorties, les tables, les conditions sans que cela pose problème 

-- Nous aimerions connaître les dates de sortie et les dates de rendu pour l'abonne Guillaume 

SELECT prenom, date_sortie, date_rendu -- Ce que je veux obtenir, de plusieurs tables différentes sans que cela pose soucis 
FROM abonne, emprunt                   -- Les tables que je souhaite appeler 
WHERE prenom = "Guillaume"              -- Une condition
AND abonne.id_abonne = emprunt.id_abonne; -- La jointure ! C'est ici que l'on indique quel est le champ commun entre les deux tables pour créer la relation 

-- Même requête mais avec raccourci d'écriture pour les prefixes des tables, je peux leur donner des alias !
-- Pour ça il suffit de mettre un espace entre le nom de la table et le nom de l'alias
SELECT prenom, date_sortie, date_rendu 
FROM abonne a, emprunt e                  
WHERE prenom = "Guillaume"              
AND a.id_abonne = e.id_abonne;

-- Autres possibilités d'écriture
-- En utilisant INNER JOIN  ou JOIN 
-- Avec cette méthode, on ramène les tables une par une 
SELECT prenom, date_sortie, date_rendu 
FROM abonne 
INNER JOIN emprunt USING (id_abonne)
WHERE prenom = "Guillaume";

SELECT prenom, date_sortie, date_rendu 
FROM abonne 
INNER JOIN emprunt ON abonne.id_abonne = emprunt.id_abonne
WHERE prenom = "Guillaume";

SELECT prenom, date_sortie, date_rendu 
FROM abonne 
JOIN emprunt USING (id_abonne)
WHERE prenom = "Guillaume";
+-----------+-------------+------------+
| prenom    | date_sortie | date_rendu |
+-----------+-------------+------------+
| Guillaume | 2016-12-07  | 2016-12-11 |
| Guillaume | 2016-12-15  | 2016-12-30 |
+-----------+-------------+------------+

-- En imbriquée 
SELECT date_sortie, date_rendu FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = "Guillaume");


-- EXERCICE 1 : Nous aimerions connaitre les dates de sortie et les dates de rendu pour les livres écrit par Alphonse Daudet 
-- EXERCICE 2 : Qui a emprunté le livre "une vie" sur l'année 2016 
-- EXERCICE 3 : Nous aimerions connaitre le nombre de livre emprunté par chaque abonné 
-- EXERCICE 4 : Nous aimerions connaitre le nombre de livre emprunté à rendre par chaque abonné 
-- EXERCICE 5 : Qui (prenom) a emprunté Quoi (titre) et Quand (date_sortie) ?
