-- Les transactions sont possibles avec le moteur (engine) de bdd "innoDB"
-- Les transactions nous permettent de créer un environnement de travail pour exécuter des requêtes pour soit les valider ou bien, les annuler si on le souhaite 

USE entreprise; 

START TRANSACTION; -- Démarre une transaction 

SELECT * FROM employes; -- On vérifie les données 

UPDATE employes SET salaire = +100; -- Je me trompe dans ma requête... Tous les salaires passent à 100 (au lieu d'ajouter 100 à la valeur d'origine)

SELECT * FROM employes; -- Je remarque bien là que je me suis trompé 

ROLLBACK; -- ROLLBACK me permet d'annuler toutes les modifications depuis le début de ma transaction 
COMMIT; -- COMMIT me permet de valider toutes les modifications depuis le début de ma transaction 

-- ATTENTION un COMMIT ou un ROLLBACK, comme une fermeture de console TERMINE la transaction, si je veux refaire des tests, alors je dois relancer l'instruction "START TRANSACTION"
-- Une fermeture de console en cours de transaction = un ROLLBACK


-- TRANSACTION AVANCEE & SAVEPOINT 

START TRANSACTION;

SELECT * FROM employes; -- On vérifie les données

SAVEPOINT point1; -- On crée un point de sauvegarde, je l'appelle ici "point1"

UPDATE employes SET salaire = 5000;

SELECT * FROM employes;

SAVEPOINT point2; -- On crée un savepoint nommé point2

UPDATE employes SET salaire = 2000;
UPDATE employes SET service = "web" WHERE service = "informatique";

SELECT * FROM employes;

SAVEPOINT point3; 

DELETE FROM employes WHERE service = "web";

SELECT * FROM employes;

SAVEPOINT point4;

ROLLBACK TO point3; -- Retour au point3, on récupère les employés du service web qu'on avait supprimé 
SELECT * FROM employes;

ROLLBACK TO point4; -- ERREUR le point n'existe plus, la création des savepoint aussi se fait "rollback" attention à ça 

-- avec le ROLLBACK TO : la transaction n'est pas terminée 
-- Par contre avec un ROLLBACK normal ou un COMMIT ou une fermeture de console, la transaction se termine comme prévue

-- ATTENTION, à l'intérieur d'une transaction, on peut tester uniquement les requêtes des 4 types (select, insert, update, delete) MAIS les autres instructions en rapport avec la structure de la bdd et des tables seront bel et bien exécutées !!! ATTENTION !!! Par exemple une action DELETE va s'exécuter mais je pourrais la rollback, alors qu'une action TRUNCATE ou DROP sera irreversible !!!
