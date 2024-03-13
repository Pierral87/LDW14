-- Ceci est un commentaire en MySQL, jusqu'à la fin de la ligne 
/* Ceci est un commentaire entre les deux indicateurs (sur plusieurs lignes si nécessaire) */

-- On évite de mettre des commentaires en SQL (sauf lorsqu'on développe des fonctions), on les mettra dans le PHP 

-- Lien utile, la documentation SQL : https://sql.sh/

-- Les requêtes ne sont pas sensibles à la casse, cependant, une convention d'écriture nous demande d'écrire les mots clés en majuscule 
-- SELECT prenom FROM utilisateurs; 

-- Chaque instruction doit se terminer par un ; 

-- Pour se connecter à la console MySQL :
    -- dans WAMP, facile, clic gauche sur l'icone de wamp dans les taches windows, menu MySQL, console MySQL, utilisateur root, pas de password et ça y est ! 
    -- dans XAMPP : On lance le "shell" et on écrit mysql -u root -p (et ensuite entrée)


CREATE DATABASE ma_base;
CREATE DATABASE entreprise;   -- CREATE DATABASE permet de créer une BDD 

SHOW DATABASES; -- Pour voir la liste des BDD sur le serveur
SHOW TABLES; -- Pour voir la liste des tables d'une BDD
SHOW WARNINGS; -- Pour voir les warnings, les détails d'erreurs de la dernière requête exécutée

USE ma_base;  -- Me permet de me positionner sur une bdd
SELECT DATABASE(); -- Me permet de comprendre sur quelle bdd je suis actuellement positionné
USE entreprise;

DROP DATABASE ma_base;  -- Pour supprimer une BDD
DROP TABLE nom_de_table; -- Pour supprimer une table 

TRUNCATE nom_de_table; -- Pour vider les données d'une table mais garder la structure 

DESC nom_de_table; -- Pour avoir un affichage de la structure de la table 

CREATE DATABASE entreprise;  -- Création de la base
USE entreprise;              -- Sélection de la base

CREATE TABLE IF NOT EXISTS employes (   -- Création de la table
  id_employes int(3) NOT NULL AUTO_INCREMENT,
  prenom varchar(20) DEFAULT NULL,
  nom varchar(20) DEFAULT NULL,
  sexe enum('m','f') NOT NULL,
  service varchar(30) DEFAULT NULL,
  date_embauche date DEFAULT NULL,
  salaire float DEFAULT NULL,
  PRIMARY KEY (id_employes)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

INSERT INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES   -- Insertion des données
(350, 'Jean-pierre', 'Laborde', 'm', 'direction', '2010-12-09', 5000),
(388, 'Clement', 'Gallet', 'm', 'commercial', '2010-12-15', 2300),
(415, 'Thomas', 'Winter', 'm', 'commercial', '2011-05-03', 3550),
(417, 'Chloe', 'Dubar', 'f', 'production', '2011-09-05', 1900),
(491, 'Elodie', 'Fellier', 'f', 'secretariat', '2011-11-22', 1600),
(509, 'Fabrice', 'Grand', 'm', 'comptabilite', '2011-12-30', 2900),
(547, 'Melanie', 'Collier', 'f', 'commercial', '2012-01-08', 3100),
(592, 'Laura', 'Blanchet', 'f', 'direction', '2012-05-09', 4500),
(627, 'Guillaume', 'Miller', 'm', 'commercial', '2012-07-02', 1900),
(655, 'Celine', 'Perrin', 'f', 'commercial', '2012-09-10', 2700),
(699, 'Julien', 'Cottet', 'm', 'secretariat', '2013-01-05', 1390),
(701, 'Mathieu', 'Vignal', 'm', 'informatique', '2013-04-03', 2500),
(739, 'Thierry', 'Desprez', 'm', 'secretariat', '2013-07-17', 1500),
(780, 'Amandine', 'Thoyer', 'f', 'communication', '2014-01-23', 2100),
(802, 'Damien', 'Durand', 'm', 'informatique', '2014-07-05', 2250),
(854, 'Daniel', 'Chevel', 'm', 'informatique', '2015-09-28', 3100),
(876, 'Nathalie', 'Martin', 'f', 'juridique', '2016-01-12', 3550),
(900, 'Benoit', 'Lagarde', 'm', 'production', '2016-06-03', 2550),
(933, 'Emilie', 'Sennard', 'f', 'commercial', '2017-01-11', 1800),
(990, 'Stephanie', 'Lafaye', 'f', 'assistant', '2017-03-01', 1775);


-------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------
--------- REQUETES DE SELECTION (On questionne la BDD) ------------------------------------
-------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------

-- Affichage complet des données de la table dans l'ordre demandé
SELECT  salaire, id_employes, nom, prenom, sexe, service, date_embauche FROM employes;

-- Affichage complet des données de la table dans l'ordre de création
SELECT * FROM employes;

-- Selection de simplement quelques champs de la table 
SELECT nom, prenom FROM employes;

-- Exercice : Affichez la liste des différents services de la table employes
SELECT service FROM employes;
-- Pour éviter les doublons, on utilise DISTINCT 
SELECT DISTINCT service FROM employes;
+---------------+
| service       |
+---------------+
| direction     |
| commercial    |
| production    |
| secretariat   |
| comptabilite  |
| informatique  |
| communication |
| juridique     |
| assistant     |
+---------------+

-- CONDITION WHERE
-- Affichage des employés du service informatique 
SELECT * FROM employes WHERE service = "informatique";
SELECT * FROM employes WHERE service = 'informatique';
+-------------+---------+--------+------+--------------+---------------+---------+
| id_employes | prenom  | nom    | sexe | service      | date_embauche | salaire |
+-------------+---------+--------+------+--------------+---------------+---------+
|         701 | Mathieu | Vignal | m    | informatique | 2013-04-03    |    2500 |
|         802 | Damien  | Durand | m    | informatique | 2014-07-05    |    2250 |
|         854 | Daniel  | Chevel | m    | informatique | 2015-09-28    |    3100 |
+-------------+---------+--------+------+--------------+---------------+---------+

-- BETWEEN 
-- Affichage des employés ayant été embauché entre 2015 et aujourd'hui 
SELECT * FROM employes WHERE date_embauche BETWEEN "2015-01-01" AND "2024-03-12";
+-------------+-----------+---------+------+--------------+---------------+---------+
| id_employes | prenom    | nom     | sexe | service      | date_embauche | salaire |
+-------------+-----------+---------+------+--------------+---------------+---------+
|         854 | Daniel    | Chevel  | m    | informatique | 2015-09-28    |    3100 |
|         876 | Nathalie  | Martin  | f    | juridique    | 2016-01-12    |    3550 |
|         900 | Benoit    | Lagarde | m    | production   | 2016-06-03    |    2550 |
|         933 | Emilie    | Sennard | f    | commercial   | 2017-01-11    |    1800 |
|         990 | Stephanie | Lafaye  | f    | assistant    | 2017-03-01    |    1775 |
+-------------+-----------+---------+------+--------------+---------------+---------+

-- Ici petite problématique, la date d'aujourd'hui, ne sera plus la même demain...
-- Pour cela on a une fonction CURDATE() qui nous renvoie la date du jour en cours 

SELECT CURDATE(); -- Nous renvoie la date du jour 
-- C'est une fonction, donc j'ai la nécessité de mettre les parenthèses 
+------------+
| CURDATE()  |
+------------+
| 2024-03-12 |
+------------+

SELECT * FROM employes WHERE date_embauche BETWEEN "2015-01-01" AND CURDATE(); -- Pour avoir la date du jour courant

-- LIKE la valeur approchante 
-- Like nous permet de rechercher une information sans l'écrire complètement 
-- Affichage des prénoms commençant par la lettre "s" 
SELECT prenom FROM employes WHERE prenom LIKE "s%";  -- le % signifie ici peu importe la suite 
+-----------+
| prenom    |
+-----------+
| Stephanie |
+-----------+

-- Affichage des prénoms finissant par les lettres "ie"
SELECT prenom FROM employes WHERE prenom LIKE "%ie";
+-----------+
| prenom    |
+-----------+
| Elodie    |
| Melanie   |
| Nathalie  |
| Emilie    |
| Stephanie |
+-----------+

-- Affichage des prénoms contenant les lettres "ie" (début, fin, milieu)
SELECT prenom FROM employes WHERE prenom LIKE "%ie%";
+-------------+
| prenom      |
+-------------+
| Jean-pierre |
| Elodie      |
| Melanie     |
| Julien      |
| Mathieu     |
| Thierry     |
| Damien      |
| Daniel      |
| Nathalie    |
| Emilie      |
| Stephanie   |
+-------------+

-- EXCLUSION 
-- Tous les employés sauf ceux d'un service particulier, par exemple, sauf le service commercial
SELECT * FROM employes WHERE service != "commercial"; --   != différent de 
+-------------+-------------+----------+------+---------------+---------------+---------+
| id_employes | prenom      | nom      | sexe | service       | date_embauche | salaire |
+-------------+-------------+----------+------+---------------+---------------+---------+
|         350 | Jean-pierre | Laborde  | m    | direction     | 2010-12-09    |    5000 |
|         417 | Chloe       | Dubar    | f    | production    | 2011-09-05    |    1900 |
|         491 | Elodie      | Fellier  | f    | secretariat   | 2011-11-22    |    1600 |
|         509 | Fabrice     | Grand    | m    | comptabilite  | 2011-12-30    |    2900 |
|         592 | Laura       | Blanchet | f    | direction     | 2012-05-09    |    4500 |
|         699 | Julien      | Cottet   | m    | secretariat   | 2013-01-05    |    1390 |
|         701 | Mathieu     | Vignal   | m    | informatique  | 2013-04-03    |    2500 |
|         739 | Thierry     | Desprez  | m    | secretariat   | 2013-07-17    |    1500 |
|         780 | Amandine    | Thoyer   | f    | communication | 2014-01-23    |    2100 |
|         802 | Damien      | Durand   | m    | informatique  | 2014-07-05    |    2250 |
|         854 | Daniel      | Chevel   | m    | informatique  | 2015-09-28    |    3100 |
|         876 | Nathalie    | Martin   | f    | juridique     | 2016-01-12    |    3550 |
|         900 | Benoit      | Lagarde  | m    | production    | 2016-06-03    |    2550 |
|         990 | Stephanie   | Lafaye   | f    | assistant     | 2017-03-01    |    1775 |
+-------------+-------------+----------+------+---------------+---------------+---------+

-- Les opérateurs de comparaison : 
--    =   est égal à   
--   !=   est différent de 
--   >    strictement supérieur
--   >=   supérieur ou égal
--   <    strictement inférieur
--   <=   inférieur ou égal 

-- Les employés ayant un salaire supérieur à 3000 
SELECT nom, prenom, service, salaire FROM employes WHERE salaire > 3000; -- pour les valeurs numériques, pas d'obligation de mettre les guillemets
+----------+-------------+--------------+---------+
| nom      | prenom      | service      | salaire |
+----------+-------------+--------------+---------+
| Laborde  | Jean-pierre | direction    |    5000 |
| Winter   | Thomas      | commercial   |    3550 |
| Collier  | Melanie     | commercial   |    3100 |
| Blanchet | Laura       | direction    |    4500 |
| Chevel   | Daniel      | informatique |    3100 |
| Martin   | Nathalie    | juridique    |    3550 |
+----------+-------------+--------------+---------+

-- ORDER BY pour ordonner les résultats 
-- Affichage des employés dans l'ordre alphabétique de leur nom de famille
SELECT * FROM employes ORDER BY nom;
SELECT * FROM employes ORDER BY nom ASC; -- ASC pour ascendant (cas par défaut si non précisé dans la requête)
-- Ordre inversé : DESC pour descendant 
SELECT * FROM employes ORDER BY nom DESC;

-- Il est possible d'ordonner par plusieurs champs. Si jamais le classement du premier champ a plusieurs lignes qui se suivent 
-- Affichage des employés par ordre de service alphabétique puis par nom alphabétique 
SELECT * FROM employes ORDER BY service;
SELECT * FROM employes ORDER BY service, nom; -- Simplement on continue de citer des champs en les séparant par des virgules, nous n'avons pas de limitation à ce niveau 
+-------------+-------------+----------+------+---------------+---------------+---------+
| id_employes | prenom      | nom      | sexe | service       | date_embauche | salaire |
+-------------+-------------+----------+------+---------------+---------------+---------+
|         990 | Stephanie   | Lafaye   | f    | assistant     | 2017-03-01    |    1775 |
|         547 | Melanie     | Collier  | f    | commercial    | 2012-01-08    |    3100 |
|         388 | Clement     | Gallet   | m    | commercial    | 2010-12-15    |    2300 |
|         627 | Guillaume   | Miller   | m    | commercial    | 2012-07-02    |    1900 |
|         655 | Celine      | Perrin   | f    | commercial    | 2012-09-10    |    2700 |
|         933 | Emilie      | Sennard  | f    | commercial    | 2017-01-11    |    1800 |
|         415 | Thomas      | Winter   | m    | commercial    | 2011-05-03    |    3550 |
|         780 | Amandine    | Thoyer   | f    | communication | 2014-01-23    |    2100 |
|         509 | Fabrice     | Grand    | m    | comptabilite  | 2011-12-30    |    2900 |
|         592 | Laura       | Blanchet | f    | direction     | 2012-05-09    |    4500 |
|         350 | Jean-pierre | Laborde  | m    | direction     | 2010-12-09    |    5000 |
|         854 | Daniel      | Chevel   | m    | informatique  | 2015-09-28    |    3100 |
|         802 | Damien      | Durand   | m    | informatique  | 2014-07-05    |    2250 |
|         701 | Mathieu     | Vignal   | m    | informatique  | 2013-04-03    |    2500 |
|         876 | Nathalie    | Martin   | f    | juridique     | 2016-01-12    |    3550 |
|         417 | Chloe       | Dubar    | f    | production    | 2011-09-05    |    1900 |
|         900 | Benoit      | Lagarde  | m    | production    | 2016-06-03    |    2550 |
|         699 | Julien      | Cottet   | m    | secretariat   | 2013-01-05    |    1390 |
|         739 | Thierry     | Desprez  | m    | secretariat   | 2013-07-17    |    1500 |
|         491 | Elodie      | Fellier  | f    | secretariat   | 2011-11-22    |    1600 |
+-------------+-------------+----------+------+---------------+---------------+---------+

-- LIMIT pour limiter le nombre de résultat (exemple, pour une pagination)
-- Affichage des employés 3 par 3 
SELECT * FROM employes LIMIT 0, 3; -- LIMIT positionDeDepart (offset), nbDeLigne
+-------------+-------------+---------+------+------------+---------------+---------+
| id_employes | prenom      | nom     | sexe | service    | date_embauche | salaire |
+-------------+-------------+---------+------+------------+---------------+---------+
|         350 | Jean-pierre | Laborde | m    | direction  | 2010-12-09    |    5000 |
|         388 | Clement     | Gallet  | m    | commercial | 2010-12-15    |    2300 |
|         415 | Thomas      | Winter  | m    | commercial | 2011-05-03    |    3550 |
+-------------+-------------+---------+------+------------+---------------+---------+
SELECT * FROM employes LIMIT 3, 3; 
+-------------+---------+---------+------+--------------+---------------+---------+
| id_employes | prenom  | nom     | sexe | service      | date_embauche | salaire |
+-------------+---------+---------+------+--------------+---------------+---------+
|         417 | Chloe   | Dubar   | f    | production   | 2011-09-05    |    1900 |
|         491 | Elodie  | Fellier | f    | secretariat  | 2011-11-22    |    1600 |
|         509 | Fabrice | Grand   | m    | comptabilite | 2011-12-30    |    2900 |
+-------------+---------+---------+------+--------------+---------------+---------+
SELECT * FROM employes LIMIT 6, 3; 
+-------------+-----------+----------+------+------------+---------------+---------+
| id_employes | prenom    | nom      | sexe | service    | date_embauche | salaire |
+-------------+-----------+----------+------+------------+---------------+---------+
|         547 | Melanie   | Collier  | f    | commercial | 2012-01-08    |    3100 |
|         592 | Laura     | Blanchet | f    | direction  | 2012-05-09    |    4500 |
|         627 | Guillaume | Miller   | m    | commercial | 2012-07-02    |    1900 |
+-------------+-----------+----------+------+------------+---------------+---------+

-- Il est possible de ne donner qu'un seul argument à LIMIT, dans ce cas, la position de départ sera toujours offset 0 et l'argument que l'on écrit représentera le nombre de lignes

SELECT * FROM employes LIMIT 3; -- Retourne les 3 premières lignes 
+-------------+-------------+---------+------+------------+---------------+---------+
| id_employes | prenom      | nom     | sexe | service    | date_embauche | salaire |
+-------------+-------------+---------+------+------------+---------------+---------+
|         350 | Jean-pierre | Laborde | m    | direction  | 2010-12-09    |    5000 |
|         388 | Clement     | Gallet  | m    | commercial | 2010-12-15    |    2300 |
|         415 | Thomas      | Winter  | m    | commercial | 2011-05-03    |    3550 |
+-------------+-------------+---------+------+------------+---------------+---------+

-- Affichage des employés avec leur salaire annuel (avec un alias/surnom sur la colonne du calcul)
SELECT nom, prenom, service, salaire * 12 AS "Salaire annuel" FROM employes;
+----------+-------------+---------------+----------------+
| nom      | prenom      | service       | Salaire annuel |
+----------+-------------+---------------+----------------+
| Laborde  | Jean-pierre | direction     |          60000 |
| Gallet   | Clement     | commercial    |          27600 |
| Winter   | Thomas      | commercial    |          42600 |
| Dubar    | Chloe       | production    |          22800 |
| Fellier  | Elodie      | secretariat   |          19200 |
| Grand    | Fabrice     | comptabilite  |          34800 |
| Collier  | Melanie     | commercial    |          37200 |
| Blanchet | Laura       | direction     |          54000 |
| Miller   | Guillaume   | commercial    |          22800 |
| Perrin   | Celine      | commercial    |          32400 |
| Cottet   | Julien      | secretariat   |          16680 |
| Vignal   | Mathieu     | informatique  |          30000 |
| Desprez  | Thierry     | secretariat   |          18000 |
| Thoyer   | Amandine    | communication |          25200 |
| Durand   | Damien      | informatique  |          27000 |
| Chevel   | Daniel      | informatique  |          37200 |
| Martin   | Nathalie    | juridique     |          42600 |
| Lagarde  | Benoit      | production    |          30600 |
| Sennard  | Emilie      | commercial    |          21600 |
| Lafaye   | Stephanie   | assistant     |          21300 |
+----------+-------------+---------------+----------------+
-- AS nous permet de donner un surnom à la colonne lors de la récupération. Ici on met des guillemets car j'ai mis un espace dans le nom de la colonne
SELECT nom, prenom, service, salaire * 12 AS Salaire_annuel FROM employes;

-- SUM()  pour avoir la somme
-- La masse salariale annuelle de l'enteprise 
SELECT SUM(salaire * 12) AS "Masse salariale" FROM employes;
-- SUM() est une fonction d'agrégation, il vérifie toutes les lignes et sort un seul résultat en y appliquant une opération
+-----------------+
| Masse salariale |
+-----------------+
|          623580 |
+-----------------+

-- AVG() la moyenne 
-- Affichage du salaire moyen de l'entreprise
SELECT AVG(salaire) AS "Salaire Moyen" FROM employes;

-- ROUND() pour arrondir
-- ROUND(valeur) => arrondi à l'entier
-- ROUND(valeur, 1) => arrondi avec une décimale
SELECT ROUND(AVG(salaire)) AS "Salaire moyen arrondi à l'entier" FROM employes;
SELECT ROUND(AVG(salaire), 1) AS "Salaire moyen arrondi à une décimale" FROM employes;

-- COUNT() permet de compter le nombre de ligne d'une requête 
-- Le nombre d'employés dans l'entreprise : 
SELECT COUNT(*) AS "Nombre d'employés" FROM employes; -- COUNT() va faire +1 pour chaque ligne rencontrée par la requête
+-------------------+
| Nombre demployés |
+-------------------+
|                20 |
+-------------------+
-- On doit préciser un champ de la table dans les () ou sinon on peut y mettre * 
-- Si on spécifie le nom d'un champ, si jamais le champ est vide pour une ou plusieurs lignes, elles ne seront pas comptées ! 
-- Avec * on s'assure de compter toutes les lignes sans exception

SELECT COUNT(*) AS "Nombre de commerciaux" FROM employes WHERE service = "commercial";
+-----------------------+
| Nombre de commerciaux |
+-----------------------+
|                     6 |
+-----------------------+

-- MIN() & MAX()
-- Salaire minimum
SELECT MIN(salaire) FROM employes;
+--------------+
| MIN(salaire) |
+--------------+
|         1390 |
+--------------+
-- Salaire maximum
SELECT MAX(salaire) FROM employes;
+--------------+
| MAX(salaire) |
+--------------+
|         5000 |
+--------------+

-- EXERCICE : Affichez le salaire minimum ainsi que le prénom de l'employé ayant ce salaire (Vérifiez bien le résultat)
SELECT prenom, MIN(salaire) FROM employes; -- Pas d'erreur, mais le résultat est FAUX... C'est Julien qui a le salaire minimum
+-------------+--------------+
| prenom      | MIN(salaire) |
+-------------+--------------+
| Jean-pierre |         1390 |
+-------------+--------------+
-- Comme MIN() ne peut renvoyer qu'un seul résultat (fonction d'agrégation) la requête nous sort un mauvais résultat, on doit procéder autrement sans utiliser MIN 


-- Possible de gérer ça avec un ORDER BY sur le salaire (on classe par ordre croissant de salaire, donc le premier enregistrement c'est le salaire le plus bas) puis je combine ça avec un LIMIT 1 
SELECT prenom, salaire FROM employes ORDER BY salaire LIMIT 1;

-- Possible de le faire avec une requête imbriquée (pas encore vu à cet instant du cours)
SELECT prenom, salaire FROM employes WHERE salaire = (SELECT MIN(salaire) FROM employes);

-- IN & NOT IN pour tester plusieurs valeurs 
-- Affichage des employés des services commercial et comptabilite
SELECT * FROM employes WHERE service = "commercial" OR service = "comptabilite";
SELECT * FROM employes WHERE service IN ('commercial', 'comptabilite');
+-------------+-----------+---------+------+--------------+---------------+---------+
| id_employes | prenom    | nom     | sexe | service      | date_embauche | salaire |
+-------------+-----------+---------+------+--------------+---------------+---------+
|         388 | Clement   | Gallet  | m    | commercial   | 2010-12-15    |    2300 |
|         415 | Thomas    | Winter  | m    | commercial   | 2011-05-03    |    3550 |
|         509 | Fabrice   | Grand   | m    | comptabilite | 2011-12-30    |    2900 |
|         547 | Melanie   | Collier | f    | commercial   | 2012-01-08    |    3100 |
|         627 | Guillaume | Miller  | m    | commercial   | 2012-07-02    |    1900 |
|         655 | Celine    | Perrin  | f    | commercial   | 2012-09-10    |    2700 |
|         933 | Emilie    | Sennard | f    | commercial   | 2017-01-11    |    1800 |
+-------------+-----------+---------+------+--------------+---------------+---------+
-- L'inverse NOT IN (un peu comme un !=)
SELECT * FROM employes WHERE service NOT IN ('commercial', 'comptabilite');
+-------------+-------------+----------+------+---------------+---------------+---------+
| id_employes | prenom      | nom      | sexe | service       | date_embauche | salaire |
+-------------+-------------+----------+------+---------------+---------------+---------+
|         350 | Jean-pierre | Laborde  | m    | direction     | 2010-12-09    |    5000 |
|         417 | Chloe       | Dubar    | f    | production    | 2011-09-05    |    1900 |
|         491 | Elodie      | Fellier  | f    | secretariat   | 2011-11-22    |    1600 |
|         592 | Laura       | Blanchet | f    | direction     | 2012-05-09    |    4500 |
|         699 | Julien      | Cottet   | m    | secretariat   | 2013-01-05    |    1390 |
|         701 | Mathieu     | Vignal   | m    | informatique  | 2013-04-03    |    2500 |
|         739 | Thierry     | Desprez  | m    | secretariat   | 2013-07-17    |    1500 |
|         780 | Amandine    | Thoyer   | f    | communication | 2014-01-23    |    2100 |
|         802 | Damien      | Durand   | m    | informatique  | 2014-07-05    |    2250 |
|         854 | Daniel      | Chevel   | m    | informatique  | 2015-09-28    |    3100 |
|         876 | Nathalie    | Martin   | f    | juridique     | 2016-01-12    |    3550 |
|         900 | Benoit      | Lagarde  | m    | production    | 2016-06-03    |    2550 |
|         990 | Stephanie   | Lafaye   | f    | assistant     | 2017-03-01    |    1775 |
+-------------+-------------+----------+------+---------------+---------------+---------+

-- Plusieurs conditions : AND 
-- On veut un employé du service commercial ayant un salaire inférieur ou égal à 2000 
SELECT * FROM employes WHERE service = "commercial" AND salaire <= 2000 LIMIT 1;
+-------------+-----------+--------+------+------------+---------------+---------+
| id_employes | prenom    | nom    | sexe | service    | date_embauche | salaire |
+-------------+-----------+--------+------+------------+---------------+---------+
|         627 | Guillaume | Miller | m    | commercial | 2012-07-02    |    1900 |
+-------------+-----------+--------+------+------------+---------------+---------+

-- Dans le cas de multiples conditions et de très longues requêtes, pas de problème pour sauter des lignes, on gagne en lisibilité et la requête ne s'exécute que lorsqu'elle rencontrera un point virgule 

SELECT *                        -- Première ligne pour savoir les champs que l'on veut sélectionner
FROM employes                   -- La table que l'on souhaite manipuler
WHERE service = "commercial"    -- Une première condition
AND salaire <= 2000             -- Une deuxième condition
LIMIT 1;                        -- Le limit 
+-------------+-----------+--------+------+------------+---------------+---------+
| id_employes | prenom    | nom    | sexe | service    | date_embauche | salaire |
+-------------+-----------+--------+------+------------+---------------+---------+
|         627 | Guillaume | Miller | m    | commercial | 2012-07-02    |    1900 |
+-------------+-----------+--------+------+------------+---------------+---------+

-- L'un ou l'autre d'un ensemble de conditions : OR 
-- EXERCICE : On aimerait afficher les employés du service Production ayant un salaire égal à 1900 ou 2300......... Vérifiez les résultats !...
SELECT * FROM employes WHERE (service = "production" AND salaire = 1900) OR salaire = 2300; -- Résultat incorrect, car il y a Clément dans le résultat qui ne fait pas parti du service prod 
+-------------+---------+--------+------+------------+---------------+---------+
| id_employes | prenom  | nom    | sexe | service    | date_embauche | salaire |
+-------------+---------+--------+------+------------+---------------+---------+
|         388 | Clement | Gallet | m    | commercial | 2010-12-15    |    2300 |
|         417 | Chloe   | Dubar  | f    | production | 2011-09-05    |    1900 |
+-------------+---------+--------+------+------------+---------------+---------+

-- Ci après 3 exemples de bonne requête
SELECT * FROM employes WHERE service = "production" AND salaire = 1900 OR service = "production" AND salaire = 2300;
SELECT * FROM employes WHERE service = "production" AND (salaire = 1900 OR salaire = 2300); 
SELECT * FROM employes WHERE service = "production" AND salaire IN (1900, 2300); 
+-------------+--------+-------+------+------------+---------------+---------+
| id_employes | prenom | nom   | sexe | service    | date_embauche | salaire |
+-------------+--------+-------+------+------------+---------------+---------+
|         417 | Chloe  | Dubar | f    | production | 2011-09-05    |    1900 |
+-------------+--------+-------+------+------------+---------------+---------+

-- GROUP BY pour regrouper selon un ou plusieurs champs 
-- Nombre d'employés par service 
SELECT COUNT(*), service FROM employes; -- Résultat incorrect ! A cause de COUNT(), c'est une fonction d'agrégation, elle ne permet de retourner qu'une seule et unique ligne de résultat..... SAUF si on l'utilise avec GROUP BY 
+----------+-----------+
| COUNT(*) | service   |
+----------+-----------+
|       20 | direction |
+----------+-----------+

-- Avec GROUP BY il est possible de demander de nous renvoyer le COUNT() en regroupant par service 
SELECT  service, COUNT(*) as "Nombre d'employés" FROM employes GROUP BY service;
+---------------+-------------------+
| service       | Nombre demployés |
+---------------+-------------------+
| direction     |                 2 |
| commercial    |                 6 |
| production    |                 2 |
| secretariat   |                 3 |
| comptabilite  |                 1 |
| informatique  |                 3 |
| communication |                 1 |
| juridique     |                 1 |
| assistant     |                 1 |
+---------------+-------------------+

SELECT  service, COUNT(*) as "Nombre d'employés" FROM employes GROUP BY service HAVING COUNT(*) > 2;
+--------------+-------------------+
| service      | Nombre demployés  |
+--------------+-------------------+
| commercial   |                 6 |
| secretariat  |                 3 |
| informatique |                 3 |
+--------------+-------------------+

-------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------
--------- REQUETES D'INSERTION (Action : enregistrement) ---------------------------------
-------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------

-- id_employes étant la clé primaire en auto increment, elle ne peut pas être vide, mais si je renseigne "null" en gros, valeur "vide", le système va la gérer automatiquement du fait de l'auto increment, sa valeur sera l'id du dernier employé inséré + 1
INSERT INTO employes (id_employes, prenom, nom, salaire, sexe, service, date_embauche) VALUES (NULL, "Pierra", "Lacaze", 20000, "m", "Web", CURDATE());
-- Insertion OK 
SELECT * FROM employes;
+-------------+-------------+----------+------+---------------+---------------+---------+
| id_employes | prenom      | nom      | sexe | service       | date_embauche | salaire |
+-------------+-------------+----------+------+---------------+---------------+---------+
|         350 | Jean-pierre | Laborde  | m    | direction     | 2010-12-09    |    5000 |
|         388 | Clement     | Gallet   | m    | commercial    | 2010-12-15    |    2300 |
|         415 | Thomas      | Winter   | m    | commercial    | 2011-05-03    |    3550 |
|         417 | Chloe       | Dubar    | f    | production    | 2011-09-05    |    1900 |
|         491 | Elodie      | Fellier  | f    | secretariat   | 2011-11-22    |    1600 |
|         509 | Fabrice     | Grand    | m    | comptabilite  | 2011-12-30    |    2900 |
|         547 | Melanie     | Collier  | f    | commercial    | 2012-01-08    |    3100 |
|         592 | Laura       | Blanchet | f    | direction     | 2012-05-09    |    4500 |
|         627 | Guillaume   | Miller   | m    | commercial    | 2012-07-02    |    1900 |
|         655 | Celine      | Perrin   | f    | commercial    | 2012-09-10    |    2700 |
|         699 | Julien      | Cottet   | m    | secretariat   | 2013-01-05    |    1390 |
|         701 | Mathieu     | Vignal   | m    | informatique  | 2013-04-03    |    2500 |
|         739 | Thierry     | Desprez  | m    | secretariat   | 2013-07-17    |    1500 |
|         780 | Amandine    | Thoyer   | f    | communication | 2014-01-23    |    2100 |
|         802 | Damien      | Durand   | m    | informatique  | 2014-07-05    |    2250 |
|         854 | Daniel      | Chevel   | m    | informatique  | 2015-09-28    |    3100 |
|         876 | Nathalie    | Martin   | f    | juridique     | 2016-01-12    |    3550 |
|         900 | Benoit      | Lagarde  | m    | production    | 2016-06-03    |    2550 |
|         933 | Emilie      | Sennard  | f    | commercial    | 2017-01-11    |    1800 |
|         990 | Stephanie   | Lafaye   | f    | assistant     | 2017-03-01    |    1775 |
|         991 | Pierra      | Lacaze   | m    | Web           | 2024-03-12    |   20000 |
+-------------+-------------+----------+------+---------------+---------------+---------+

-- Il est possible de ne pas renseigner la clé primaire, elle va de toute façon se gérer seule
INSERT INTO employes (prenom, nom, salaire, sexe, service, date_embauche) VALUES ("Pierra", "Lacaze", 20000, "m", "Web", CURDATE());

-- Il est possible de ne pas préciser les champs. Cependant, on est dans ce cas obligé de fournir TOUS les champs et dans le bon ordre (celui de la structure de la table)
INSERT INTO employes VALUES (NULL, "Pierra", "Lacaze", 20000, "m", "Web", CURDATE()); -- Ici problème je n'ai pas respecté l'ordre :( 
INSERT INTO employes VALUES (NULL, "Pierra", "Lacaze", "m", "Web", CURDATE(), 20000); 

-------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------
--------- REQUETES DE MODIFICATION (Action : modification) --------------------------------
-------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------

-- On modifie le salaire d'un employé 
UPDATE employes SET salaire = 2000 WHERE id_employes = 991;
-- Plusieurs modifications sont possible en une seule fois 
UPDATE employes SET salaire = 2200, service = "informatique" WHERE id_employes = 992;

-- REPLACE
-- Dans le cas d'une nouvelle valeur, REPLACE se comporte comme un INSERT INTO
REPLACE INTO employes VALUES (995, "Polo", "Lolo", "m", "Web", "2022-01-01", 3000);
REPLACE INTO employes VALUES (995, "Polo", "Lolo", "m", "informatique", "2022-01-01", 5000);
-- Par contre, on remarque dans un second temps, pour modifier la ligne déjà insérée, que cela me donne un  Query OK, 2 rows affected (0.07 sec)
-- 2 lignes impactées car en fait, il supprime la ligne trouvée et réinsère une toute nouvelle ligne !
-- GROS PROBLEMES si on a une base avec des tables ayant des relations en contraintes "CASCADE" (réaction en chaine)

-------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------
--------- REQUETES DE SUPPRESSION (Action : suppression) ----------------------------------
-------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------
DELETE FROM employes; -- Cette requête supprime toutes les données de la table  
DELETE FROM employes WHERE id_employes = 991; -- Supression d'un employé à un certains id
DELETE FROM employes WHERE id_employes > 991; -- Suppression de potentiellement plusieurs employés, tous les id supérieurs à 991 

-- On supprime tous les informaticiens sauf celui qui possède l'id 701 
DELETE FROM employes WHERE service = "informatique" AND id_employes != 701;


-------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------
--------- EXERCICES : ---------------------------------------------------------------------
-------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------
-- 1 -- Afficher la profession de l'employé 547.
SELECT service FROM employes WHERE id_employes = 547;
+------------+
| service    |
+------------+
| commercial |
+------------+
-- 2 -- Afficher la date d'embauche d'Amandine.	
SELECT date_embauche FROM employes WHERE prenom = "Amandine";
+---------------+
| date_embauche |
+---------------+
| 2014-01-23    |
+---------------+
-- 3 -- Afficher le nom de famille de Guillaume	
SELECT nom FROM employes WHERE prenom = "Guillaume";
+--------+
| nom    |
+--------+
| Miller |
+--------+
-- 4 -- Afficher le nombre de personne ayant un n° id_employes commençant par le chiffre 5.	
SELECT COUNT(*) AS "Nombre d'employés" FROM employes WHERE id_employes LIKE "5%";
+-------------------+
| Nombre demployés |
+-------------------+
|                 3 |
+-------------------+
-- 5 -- Afficher le nombre de commerciaux.
SELECT COUNT(*) AS "Nombre de commerciaux" FROM employes WHERE service = "commercial";
+-----------------------+
| Nombre de commerciaux |
+-----------------------+
|                     6 |
+-----------------------+
-- 6 -- Afficher le salaire moyen des informaticiens (+arrondi).	
SELECT ROUND(AVG(salaire)) AS "Salaire moyen info" FROM employes WHERE service = "informatique";
+--------------------+
| Salaire moyen info |
+--------------------+
|               2617 |
+--------------------+
-- 7 -- Afficher les 5 premiers employés après avoir classé leur nom de famille par ordre alphabétique. 
SELECT * FROM employes ORDER BY nom LIMIT 5;
+-------------+---------+----------+------+--------------+---------------+---------+
| id_employes | prenom  | nom      | sexe | service      | date_embauche | salaire |
+-------------+---------+----------+------+--------------+---------------+---------+
|         592 | Laura   | Blanchet | f    | direction    | 2012-05-09    |    4500 |
|         854 | Daniel  | Chevel   | m    | informatique | 2015-09-28    |    3100 |
|         547 | Melanie | Collier  | f    | commercial   | 2012-01-08    |    3100 |
|         699 | Julien  | Cottet   | m    | secretariat  | 2013-01-05    |    1390 |
|         739 | Thierry | Desprez  | m    | secretariat  | 2013-07-17    |    1500 |
+-------------+---------+----------+------+--------------+---------------+---------+
-- 8 -- Afficher le coût des commerciaux sur 1 année.		
SELECT SUM(salaire * 12) AS "Cout commerciaux annuel" FROM employes WHERE service = "commercial";
+-------------------------+
| Cout commerciaux annuel |
+-------------------------+
|                  184200 |
+-------------------------+
-- 9 -- Afficher le salaire moyen par service. (service + salaire moyen)
SELECT service, ROUND(AVG(salaire)) AS "Salaire moyen" FROM employes GROUP BY service;
+---------------+---------------+
| service       | Salaire moyen |
+---------------+---------------+
| direction     |          4750 |
| commercial    |          2558 |
| production    |          2225 |
| secretariat   |          1497 |
| comptabilite  |          2900 |
| informatique  |          2617 |
| communication |          2100 |
| juridique     |          3550 |
| assistant     |          1775 |
+---------------+---------------+
-- 10 -- Afficher le nombre de recrutement sur l'année 2010 (+alias).	
SELECT COUNT(*) AS "Recrutement 2010" FROM employes WHERE date_embauche BETWEEN "2010-01-01" AND "2010-12-31";
SELECT COUNT(*) AS "Recrutement 2010" FROM employes WHERE date_embauche LIKE "2010%";
SELECT COUNT(*) AS "Recrutement 2010" FROM employes WHERE YEAR(date_embauche) = 2010;
+------------------+
| Recrutement 2010 |
+------------------+
|                2 |
+------------------+
-- 11 -- Afficher le salaire moyen appliqué lors des recrutements sur la période allant de 2015 a 2017
SELECT AVG(salaire) AS "Salaire moyen" FROM employes WHERE date_embauche BETWEEN "2015-01-01" AND "2017-12-31";
SELECT AVG(salaire) AS "Salaire moyen" FROM employes WHERE YEAR(date_embauche) >= 2015;
SELECT AVG(salaire) AS "Salaire moyen" FROM employes WHERE YEAR(date_embauche) BETWEEN 2015 AND 2017;
SELECT AVG(salaire) AS "Salaire moyen" FROM employes WHERE YEAR(date_embauche) IN (2015, 2016, 2017);
+---------------+
| Salaire moyen |
+---------------+
|          2555 |
+---------------+
-- 12 -- Afficher le nombre de service différents 
SELECT COUNT(DISTINCT service) FROM employes;
+-------------------------+
| COUNT(DISTINCT service) |
+-------------------------+
|                       9 |
+-------------------------+
-- 13 -- Afficher tous les employés (sauf ceux du service production et secrétariat)
SELECT * FROM employes WHERE service NOT IN ("production", "secretariat");
-- 14 -- Afficher conjointement le nombre d'homme et de femme dans l'entreprise
SELECT sexe, COUNT(*) AS "nombre" FROM employes GROUP BY sexe;
+------+--------+
| sexe | nombre |
+------+--------+
| m    |     11 |
| f    |      9 |
+------+--------+
-- 15 -- Afficher les commerciaux ayant été recrutés avant 2012 de sexe masculin et gagnant un salaire supérieur a 2500 €
SELECT * FROM employes 
WHERE service = "commercial"
AND sexe = "m"
AND salaire > 2500
AND YEAR(date_embauche) < 2012;
+-------------+--------+--------+------+------------+---------------+---------+
| id_employes | prenom | nom    | sexe | service    | date_embauche | salaire |
+-------------+--------+--------+------+------------+---------------+---------+
|         415 | Thomas | Winter | m    | commercial | 2011-05-03    |    3550 |
+-------------+--------+--------+------+------------+---------------+---------+
-- 16 -- Qui a été embauché en dernier
SELECT * FROM employes ORDER BY date_embauche DESC LIMIT 1;
+-------------+-----------+--------+------+-----------+---------------+---------+
| id_employes | prenom    | nom    | sexe | service   | date_embauche | salaire |
+-------------+-----------+--------+------+-----------+---------------+---------+
|         990 | Stephanie | Lafaye | f    | assistant | 2017-03-01    |    1775 |
+-------------+-----------+--------+------+-----------+---------------+---------+
-- 17 -- Afficher les informations sur l'employé du service commercial gagnant le salaire le plus élevé 
SELECT * FROM employes WHERE service = "commercial" ORDER BY salaire DESC LIMIT 1;
+-------------+--------+--------+------+------------+---------------+---------+
| id_employes | prenom | nom    | sexe | service    | date_embauche | salaire |
+-------------+--------+--------+------+------------+---------------+---------+
|         415 | Thomas | Winter | m    | commercial | 2011-05-03    |    3550 |
+-------------+--------+--------+------+------------+---------------+---------+
-- 18 -- Afficher le prénom du comptable gagnant le meilleur salaire
SELECT prenom FROM employes WHERE service = "comptabilite" ORDER BY salaire DESC LIMIT 1;
+-------------+---------+-------+------+--------------+---------------+---------+
| id_employes | prenom  | nom   | sexe | service      | date_embauche | salaire |
+-------------+---------+-------+------+--------------+---------------+---------+
|         509 | Fabrice | Grand | m    | comptabilite | 2011-12-30    |    2900 |
+-------------+---------+-------+------+--------------+---------------+---------+
-- 19 -- Afficher le prénom de l'informaticien ayant été recruté en premier
SELECT prenom, date_embauche FROM employes WHERE service = "informatique" ORDER BY date_embauche ASC LIMIT 1;
+---------+---------------+
| prenom  | date_embauche |
+---------+---------------+
| Mathieu | 2013-04-03    |
+---------+---------------+
-- 20 -- Augmenter chaque employé de 100 €
UPDATE employes SET salaire = salaire +100;
-- 21 -- Supprimer les employés du service secrétariat
DELETE FROM employes WHERE service = "secretariat";
