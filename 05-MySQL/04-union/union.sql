-- UNION permet de fusionner des résultats en un seul 
-- ATTENTION, le nombre de champs attendus (les champs qu'on a SELECT) doit être le même dans les deux requêtes.

SELECT prenom AS "Liste de personnes, abonnés et auteurs" FROM abonne 
UNION 
SELECT auteur FROM livre;
----------------------------------------+
| Liste de personnes, abonnés et auteurs |
+----------------------------------------+
| Guillaume                              |
| Benoit                                 |
| Chloe                                  |
| Laura                                  |
| Pierra                                 |
| GUY DE MAUPASSANT                      |
| HONORE DE BALZAC                       |
| ALPHONSE DAUDET                        |
| ALEXANDRE DUMAS                        |
+----------------------------------------+

-- UNION applique un DISTINCT par défaut pour éviter les doublons (ici les auteurs ne sont présents qu'une seule fois, même si certains ont plusieurs livres dans la table)


-- Si jamais on voulait avoir les doublons => UNION ALL
SELECT prenom AS "Liste de personnes, abonnés et auteurs" FROM abonne 
UNION ALL
SELECT auteur FROM livre;
+----------------------------------------+
| Liste de personnes, abonnés et auteurs |
+----------------------------------------+
| Guillaume                              |
| Benoit                                 |
| Chloe                                  |
| Laura                                  |
| Pierra                                 |
| GUY DE MAUPASSANT                      |
| GUY DE MAUPASSANT                      |
| HONORE DE BALZAC                       |
| ALPHONSE DAUDET                        |
| ALEXANDRE DUMAS                        |
| ALEXANDRE DUMAS                        |
+----------------------------------------+