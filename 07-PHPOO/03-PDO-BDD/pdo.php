<?php

// --------------------------------------------------------
// --------------------------------------------------------
// ------- PDO: PHP DATA OBJECT ---------------------------
// --------------------------------------------------------
// --------------------------------------------------------
// https://www.php.net/manual/fr/class.pdo.php
// https://www.php.net/manual/fr/class.pdostatement.php


// Pour gérer une connexion avec une base de données en PHP, on va utiliser PDO
// PDO c'est une classe prédéfinie de PHP
// On utilisera également PDOStatement qui est une autre classe prédéfinie de PHP 

// La différence entre les deux ? 
// PDO : Représente la connexion vers une base de données 
// PDOStatement : Représente la réponse d'une requête lancée sur la BDD (sur PDO)

echo "<h2>01 - Connexion à la BDD</h2>";
// Pour créer une connexion à la BDD nous avons besoin de plusieurs informations (ce sont les arguments à fournir à l'instanciation de notre objet PDO) : 
// - le serveur/host ainsi que le nom de la bdd 
$host = "mysql:host=localhost;dbname=entreprise";
// - Login de connexion à la bdd (root)
$login = "root";
// - Mot de passe de connexion à la bdd (rien pour nous en local sur xampp ou wamp, sur mamp c'est root aussi)
$password = "";
// - Eventuellement un array contenant des options (mode d'erreur, encodage)
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // gestion des erreurs 
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" // on force l'encodage en utf8 en sorti
);

// Création de l'objet : 
$pdo = new PDO($host, $login, $password, $options);

var_dump($pdo);
// object(PDO)[1]
// Si l'instanciation s'est bien passée, le var_dump m'indique bien un objet PDO, dans ce cas la connexion vers la BDD est active ! 
// C'est comme si notre base entreprise était entièrement stockée dans la variable $pdo (en fait ce n'est pas la bdd entière, mais plutôt un lien qui est fait entre mon fichier et la bdd et qui est représenté par la variable $pdo)

echo "<h2>02 - Requêtes de type action ( INSERT / UPDATE / DELETE )</h2>";

// Pour lancer une requête sur l'objet PDO, on va utiliser la méthode query() (ATTENTION, il faudra plutôt lancer la plupart de nos requêtes avec prepare(), que l'on verra plus bas dans ce fichier)

// Je vais faire une insertion dans la table employes 
// $pdoStmt = $pdo->query("INSERT INTO employes (prenom, nom, salaire, sexe, date_embauche, service) VALUES ('Pierra', 'Lacaze', 1000, 'm', CURDATE(), 'Web')");

// Toujours lorsque je lance une requête, je récupère un résultat qui est un objet de type PDOStatement, il représente la "réponse" à la requête 
// Dans le cas d'une requête de type action, il n'y a pas vraiment de réponses, mais on a quand même accès à certaines informations, par exemple le nombre de lignes impactées par cette requête 
// echo "Nombre de lignes impactées par ma requête : " . $pdoStmt->rowCount() . "<hr>";

echo "<h2>03 - SELECT pour une seule ligne de résultat </h2>";

// On veut sélectionner l'employé id 990
$pdoStmt = $pdo->query("SELECT * FROM employes WHERE id_employes = 990");
// +-------------+-----------+--------+------+-----------+---------------+---------+
// | id_employes | prenom    | nom    | sexe | service   | date_embauche | salaire |
// +-------------+-----------+--------+------+-----------+---------------+---------+
// |         990 | Stephanie | Lafaye | f    | assistant | 2017-03-01    |    1875 |
// +-------------+-----------+--------+------+-----------+---------------+---------+
var_dump($pdoStmt);
// En l'état, la réponse dans le pdoStmt, n'est pas visible ni exploitable, nous avons une étape de plus à réaliser
// Pour la rendre utilisable, il va falloir transformer la ligne de résultat grâce à la méthode fetch()

// FETCH_ASSOC : Pour un tableau associatif (le nom des colonnes comme indice du tableau array)
$data = $pdoStmt->fetch(PDO::FETCH_ASSOC);
var_dump($data);
// array (size=7)
//   'id_employes' => int 990
//   'prenom' => string 'Stephanie' (length=9)
//   'nom' => string 'Lafaye' (length=6)
//   'sexe' => string 'f' (length=1)
//   'service' => string 'assistant' (length=9)
//   'date_embauche' => string '2017-03-01' (length=10)
//   'salaire' => float 1875

// FETCH_NUM : pour un tableau array indexé numériquement 
// $data = $pdoStmt->fetch(PDO::FETCH_NUM);
// var_dump($data);
// array (size=7)
//   0 => int 990
//   1 => string 'Stephanie' (length=9)
//   2 => string 'Lafaye' (length=6)
//   3 => string 'f' (length=1)
//   4 => string 'assistant' (length=9)
//   5 => string '2017-03-01' (length=10)
//   6 => float 1875

// FETCH_BOTH : Cas par défaut si non précisé : Présente les valeurs dédoublées, à la fois indexées numériquement et aussi associativement
// $data = $pdoStmt->fetch(PDO::FETCH_BOTH);
// $data = $pdoStmt->fetch();
// var_dump($data);

// FETCH_OBJ : Permet de retourner non pas un array mais un objet avec des propriétés publiques aux noms des colonnes
// $data = $pdoStmt->fetch(PDO::FETCH_OBJ);
// var_dump($data);
// object(stdClass)[3]
//   public 'id_employes' => int 990
//   public 'prenom' => string 'Stephanie' (length=9)
//   public 'nom' => string 'Lafaye' (length=6)
//   public 'sexe' => string 'f' (length=1)
//   public 'service' => string 'assistant' (length=9)
//   public 'date_embauche' => string '2017-03-01' (length=10)
//   public 'salaire' => float 1875

// Affichons "Stephanie" 
// Avec FETCH_ASSOC ? 
echo $data["prenom"];
// Avec FETCH_NUM ? 
// echo $data[1];
// Avec FETCH_OBJ ? 
// echo $data->prenom;

// Une ligne traitée avec fetch est "consommée", elle n'existe plus dans le résultat/PDOStatement 

echo "<h2>04 - SELECT pour plusieurs lignes de résultats</h2>";

$pdoStmt = $pdo->query("SELECT * FROM employes");

// Pour connaître le nombre de lignes récupérées par la requête : rowCount()
echo "Nombre d'employés : " . $pdoStmt->rowCount() . "<hr>";

// fetch() ne traite qu'une seule ligne à la fois
// Pour traiter plusieurs lignes ? Une boucle ! Mais laquelle ? 
// La boucle while va tourner autant de fois qu'il y a de lignes dans la réponse 
// A chaque appel de fetch, on va récupérer le résultat dans notre $data et en faire un var_dump
// On passe ensuite sur chaque ligne une à une, lorsque le fetch ne trouve plus de résultat, il retournera false et la boucle s'arrêtera
// Ainsi on boucle "tant que" (while) il y a des résultats dans le PDOStatement 

while ($ligne = $pdoStmt->fetch(PDO::FETCH_ASSOC)) {
    var_dump($ligne);
    echo "<hr>";
}

// Il n'est pas possible de revenir sur une ligne déjà traitée, elle est consommée, ainsi que tout notre résultat ici
// Si je veux remanipuler tout le résultat de cette requête, alors je dois la relancer à nouveau
$pdoStmt = $pdo->query("SELECT * FROM employes");
?>
<div style="display: flex; flex-wrap: wrap; justify-content: space-between">
    <?php while ($ligne = $pdoStmt->fetch(PDO::FETCH_ASSOC)) : ?>
        <div style="margin-top: 20px; padding: 1%; width: 20%; background-color: steelblue; color: white">
            ID : <?= $ligne["id_employes"] ?><br>
            Prenom : <?= $ligne["prenom"] ?><br>
            Nom : <?= $ligne["nom"] ?><br>
            Service : <?= $ligne["service"] ?><br>
            Salaire : <?= $ligne["salaire"] ?><br>
            Sexe : <?= $ligne["sexe"] ?><br>
            Date d'embauche : <?= $ligne["date_embauche"] ?><br>
        </div>
    <?php endwhile; ?>
</div>
<?php

echo "<h2>05 - SELECT pour plusieurs lignes de résultats affichées dans un tableau HTML qui s'adapte à nos requêtes</h2>";
$pdoStmt = $pdo->query("SELECT * FROM employes");
?>

<!-- En écrivant ici nous même la structure du tableau à la main, donc le script ne va pas s'adapter à 100% mais cela nous permet d'écrire la structure de notre tableau convenablement  -->
<style>
    th,
    td {
        padding: 10px;
    }
</style>
<table border="1" style="border-collapse : collapse; width: 100%;">
    <thead>
        <tr>
            <th>Id employés</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Sexe</th>
            <th>Service</th>
            <th>Date d'embauche</th>
            <th>Salaire</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($ligne = $pdoStmt->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <?php 
                    foreach ($ligne as $valeur) { echo "<td> $valeur </td>";}
                    echo "<td><a href=''>Supprimer</a> - <a href=''>Modifier</a></td>"
                ?>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<hr>
<hr>
<hr>
<?php 
$pdoStmt = $pdo->query("SELECT * FROM employes");
// Ici on va développer un script qui s'adapte à n'importe quelle requête et qui va gérer la structure du tableau de façon dynamique (c'est à dire nombre de colonnes potentiellement changeant)
// Pour cela : columnCount()  méthode de PDOStatement, nous permet de savoir quel est le nombre de colonne de la requête 
// Et après : getColumnMeta(numColonne) est une méthode de PDOStatement qui nous renvoie des détails sur la colonne en question, notamment un indice s'appellant "name"

echo "Nombre de colonnes dans la requête : " . $pdoStmt->columnCount();
var_dump($pdoStmt->getColumnMeta(0)); // On voit bien ici le array avec toutes les infos de la colonne numéro 0 (dans le cas de la requête SELECT * c'est la colonne id_employes)
?>

<table border="1" style="border-collapse : collapse; width: 100%;">
    <thead>
        <tr>
            <?php 
                for ($i = 0; $i < $pdoStmt->columnCount(); $i++) {
                    $infoColonne = $pdoStmt->getColumnMeta($i);
                    echo "<th>" . $infoColonne["name"] . "</th>";
                }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php while ($ligne = $pdoStmt->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <?php 
                    foreach ($ligne as $valeur) { echo "<td> $valeur </td>";}
                    echo "<td><a href=''>Supprimer</a> - <a href=''>Modifier</a></td>"
                ?>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<hr>
<hr>
<?php 

echo "<h2>EXERCICE : Récupérez les prénoms et noms des employés de la BDD pour les afficher dans une liste ul li </h2>";

$pdoStmt = $pdo->query("SELECT nom, prenom FROM employes");

// Ci dessous un code qui s'adapterait à différents types de requêtes avec un premier <li> qui symboliserait l'entête de la liste
echo "<ul>";
echo "<li>";
for($i = 0; $i < $pdoStmt->columnCount(); $i++){
    $infoColonne = $pdoStmt->getColumnMeta($i);
    echo  ucfirst($infoColonne["name"]) . " ";
}
echo "</li>";

while ($ligne = $pdoStmt->fetch(PDO::FETCH_ASSOC)){
    echo "<li>";
    foreach($ligne as $valeur) {
        echo "$valeur ";
    }
    echo "</li>";
}
echo "</ul><hr>";


// Ici, au plus simple, seulement les noms et prenoms 
$pdoStmt = $pdo->query("SELECT nom, prenom FROM employes");
echo "<ul>";
while ($ligne = $pdoStmt->fetch(PDO::FETCH_ASSOC)){
    echo "<li>" . $ligne["prenom"] . " " . $ligne["nom"] . "</li>";
}
echo "</ul>";


echo "<h2>06 - SELECT pour plusieurs lignes de résultat avec fetchAll()</h2>";

// fetch() permet de traiter une seule ligne à la fois
// fetchAll() traite toutes les lignes en une seule fois sauf que l'on obtient un tableau array multidimensionnel (plusieurs niveaux ! Un array principal contient tous les employés, chacun à un indice, et chacun de ces indices contient un array)

$pdoStmt = $pdo->query("SELECT * FROM employes");

$employes = $pdoStmt->fetchAll(PDO::FETCH_ASSOC);

// var_dump($employes);

// EXERCICE : Affichez les prénoms des employés dans une liste ul li en manipulant $employes

echo 'Avec foreach : <ul>';
foreach($employes AS $employe) {
    echo "<li>" . $employe["prenom"] . "</li>";
}
echo '</ul>';

// echo $employes[0]["prenom"];

echo "Avec for : <ul>";
for ($i = 0; $i < count($employes); $i++) {
    echo "<li>" . $employes[$i]["prenom"] . "</li>";
}
echo "</ul>";



