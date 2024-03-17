CREATE DATABASE taxi;

USE TAXI;

CREATE TABLE IF NOT EXISTS `association_vehicule_conducteur` (
  `id_association` int(3) NOT NULL AUTO_INCREMENT,
  `id_vehicule` int(3) DEFAULT NULL,
  `id_conducteur` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_association`)
  
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


INSERT INTO `association_vehicule_conducteur` (`id_association`, `id_vehicule`, `id_conducteur`) VALUES
(1, 501, 1),
(2, 502, 2),
(3, 503, 3),
(4, 504, 4),
(5, 501, 3);


CREATE TABLE IF NOT EXISTS `conducteur` (
  `id_conducteur` int(3) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  PRIMARY KEY (`id_conducteur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


INSERT INTO `conducteur` (`id_conducteur`, `prenom`, `nom`) VALUES
(1, 'Julien', 'Avigny'),
(2, 'Morgane', 'Alamia'),
(3, 'Philippe', 'Pandre'),
(4, 'Amelie', 'Blondelle'),
(5, 'Alex', 'Richy');


DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `id_vehicule` int(3) NOT NULL AUTO_INCREMENT,
  `marque` varchar(30) NOT NULL,
  `modele` varchar(30) NOT NULL,
  `couleur` varchar(30) NOT NULL,
  `immatriculation` varchar(9) NOT NULL,
  PRIMARY KEY (`id_vehicule`)
) ENGINE=InnoDB AUTO_INCREMENT=507 DEFAULT CHARSET=latin1;

INSERT INTO `vehicule` (`id_vehicule`, `marque`, `modele`, `couleur`, `immatriculation`) VALUES
(501, 'Peugeot', '807', 'noir', 'AB-355-CA'),
(502, 'Citroen', 'C8', 'bleu', 'CE-122-AE'),
(503, 'Mercedes', 'Cls', 'vert', 'FG-953-HI'),
(504, 'Volkswagen', 'Touran', 'noir', 'SO-322-NV'),
(505, 'Skoda', 'Octavia', 'gris', 'PB-631-TK'),
(506, 'Volkswagen', 'Passat', 'gris', 'XN-973-MM');

-- EXERCICES Contraintes et Relations 
    -- Créez les clés étrangères et les relations 
    -- Choisissez ensuite les contraintes qui respectent la demande du client des questions ci dessous
    -- ATTENTION, chaque question doit être gérée indépendamment, c'est à dire que les contraintes nécessaires pour répondre à une question, ne peuvent pas forcément être valables en même temps que les contraintes d'une autre question 

    -- 1) Pour éviter les erreurs, la société de taxis aimerait que l'on ne puisse pas faire une mauvaise association lors de la saisie. C'est à dire un conducteur n'existant pas avec une voiture n'existant pas 
        Pour cette question 1, juste la création des relations suffit à répondre à la problématique, on ne pourra plus ajouter des associations avec des vehicules qui n'existent pas ni des conducteurs qui n'existent pas 
    -- 2) La société de taxis peut modifier leurs conducteurs via leur logiciel, lorsqu’un conducteur est modifié (dans la table conducteur - changement d’id), la société aimerait que la modification soit répercutée dans la table « association_vehicule_conducteur ». 
            ON UPDATE CASCADE sur conducteur 
    -- 3) La société de taxis peut supprimer des conducteurs via leur logiciel, ils aimeraient bloquer la possibilité de supprimer un conducteur (dans la table conducteur) tant que celui-ci conduit un véhicule.
              ON DELETE RESTRICT/NO ACTION sur conducteur
    -- 4) La société de taxis peut modifier un véhicule via leur logiciel. Lorsqu’un véhicule est modifié (dans la table véhicule - changement d’id), la société aimerait que la modification soit répercutée dans la table « association_vehicule_conducteur ».
                ON UPDATE CASCADE sur vehicule
    -- 5) Si un véhicule est supprimé alors qu’un ou plusieurs conducteurs le conduisaient, la société aimerait garder la présence de ces conducteurs dans la table « association_vehicule_conducteur » en précisant « null » comme valeur dans le champ correspondant puisque le véhicule aura été supprimé.
                ON DELETE SET NULL sur vehicule


-- EXERCICES Requetes

-- 01 - Qui conduit la voiture 503 ? 
SELECT prenom 
FROM conducteur c, association_vehicule_conducteur a
WHERE id_vehicule = 503
AND a.id_conducteur = c.id_conducteur;

-- 02 - Quelle(s) voiture(s) est conduite par le conducteur 3 ? 
SELECT id_conducteur, marque, modele 
FROM association_vehicule_conducteur avc, vehicule v
WHERE id_conducteur = 3
AND avc.id_vehicule = v.id_vehicule;

-- 03 - Qui conduit quoi ? (on veut les prenoms associés à un modele + marque)
SELECT prenom, modele, marque 
FROM conducteur c, vehicule v, association_vehicule_conducteur avc
WHERE avc.id_vehicule = v.id_vehicule
AND c.id_conducteur = avc.id_conducteur;

-- 04 - Ajoutez vous dans la liste des conducteurs.
        -- Afficher tous les conducteurs (meme ceux qui n'ont pas de correspondance avec les vehicules) puis les vehicules qu'ils conduisent si c'est le cas
SELECT prenom, modele, marque 
FROM conducteur
LEFT JOIN association_vehicule_conducteur USING (id_conducteur)
LEFT JOIN vehicule USING (id_vehicule);

-- 05 - Ajoutez un nouvel enregistrement dans la table des véhicules.
        -- Afficher tous les véhicules (meme ceux qui n'ont pas de correspondance avec les conducteurs) puis les conducteurs si c'est le cas
SELECT marque, modele, prenom, nom 
FROM vehicule
LEFT JOIN association_vehicule_conducteur USING (id_vehicule)
LEFT JOIN conducteur USING (id_conducteur);

-- 06 - Afficher tous les conducteurs et tous les vehicules, peu importe les correspondances.
SELECT marque, modele, prenom FROM conducteur c 
LEFT JOIN association_vehicule_conducteur avc ON c.id_conducteur = avc.id_conducteur
LEFT JOIN vehicule v ON v.id_vehicule = avc.id_vehicule
UNION
SELECT marque, modele, prenom FROM conducteur c 
RIGHT JOIN association_vehicule_conducteur avc ON c.id_conducteur = avc.id_conducteur
RIGHT JOIN vehicule v ON v.id_vehicule = avc.id_vehicule;

