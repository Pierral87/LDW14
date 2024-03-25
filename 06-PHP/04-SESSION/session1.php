<?php  

// $_SESSION est une superglobale
// En revanche celle-ci n'existe pas par défaut

// Comme pour les fonction setcookie() et header(), session_start() doit être exécuté avant tout affichage dans la page !!!
session_start(); // permet d'ouvrir un session existante ou dans créer une.

// sess_cnmt9chnkdopnstokcvqu85j9l (nom du fichier de session visible dans le dossier tmp/ du serveur)
//      cnmt9chnkdopnstokcvqu85j9l (valeur du cookie, permettant de retrouver la session de l'utilisateur)

// lors de la connexion utilisateur, on récupère les informations de l'utilisateur et on les place dans le fichier de session afin d'y avoir accès facilement
$_SESSION['user'] = [];
$_SESSION['user']['id'] = 123;
$_SESSION['user']['pseudo'] = 'Admin';
$_SESSION['user']['password'] = password_hash('soleil', PASSWORD_DEFAULT);
$_SESSION['user']['email'] = 'admin@mail.fr';
$_SESSION['user']['address'] = '1 rue du bateau';
$_SESSION['user']['postal_code'] = 75000;
$_SESSION['user']['city'] = 'Paris';
$_SESSION['user']['status'] = 'ROLE_ADMIN';


echo '<hr><b>Premier affichage de la session : </b><hr>';
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

// il est possible de supprimer une partie
unset($_SESSION['user']['password']);

echo '<hr><b>Deuxième affichage de la session : </b><hr>';
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

echo 'Bonjour <b>' .  $_SESSION['user']['pseudo'] . '</b>, bienvenue sur notre site, votre adresse de livraison est : ' . $_SESSION['user']['address'] . ' ' . $_SESSION['user']['postal_code'] . ' ' . $_SESSION['user']['city'] . '<br>';


// Création du panier
$_SESSION['cart'] = [];
$_SESSION['cart']['name'] = [];
$_SESSION['cart']['quantity'] = [];
$_SESSION['cart']['img'] = [];
$_SESSION['cart']['price'] = [];

$_SESSION['cart']['name'][] = 'Pantalon gris';
$_SESSION['cart']['quantity'][] = 1;
$_SESSION['cart']['img'][] = 'pantalon.jpg';
$_SESSION['cart']['price'][] = 30;

$_SESSION['cart']['name'][] = 'Tshirt noir';
$_SESSION['cart']['quantity'][] = 2;
$_SESSION['cart']['img'][] = 'tshirt.jpg';
$_SESSION['cart']['price'][] = 7;

$_SESSION['cart']['name'][] = 'Veste à capuche';
$_SESSION['cart']['quantity'][] = 1;
$_SESSION['cart']['img'][] = 'veste.jpg';
$_SESSION['cart']['price'][] = 25;


echo '<hr><b>Troisième affichage de la session : </b><hr>';
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

echo $_SESSION['cart']['name'][2] . '<hr>';


echo '<h2>Panier</h2>';
?>
    <style>
        table { border-collapse: collapse; border: 1px solid; width: 100%; }
        th, td { border: 1px solid; padding: 10px; }
    </style>
    <table>
        <tr>
            <th>Image</th>
            <th>Nom</th>
            <th>Quantité</th>
            <th>Prix unitaire</th>
        </tr>
        <?php 
            // $nb_produits = count($_SESSION['cart']['name']); // ou :
            $nb_produits = count($_SESSION['cart']['quantity']);

            for($i = 0; $i < $nb_produits; $i++) {
                echo '<tr>';
                echo '<td>' . $_SESSION['cart']['img'][$i] . '</td>';
                echo '<td>' . $_SESSION['cart']['name'][$i] . '</td>';
                echo '<td>' . $_SESSION['cart']['quantity'][$i] . '</td>';
                echo '<td>' . $_SESSION['cart']['price'][$i] . '€</td>';
                echo '</tr>';
            }
        ?>
    </table>

<?php


// On supprimer la session :
/*
unset($_SESSION);

echo '<pre>';
print_r($_SESSION);
echo '</pre>';
*/

session_destroy(); // permet de detruire la session, en revanche, cette instruction est mise de côté et ne sera exécutée qu'après la dernière ligne de code du de ce fichier.

echo '<hr><b>Quatrième affichage de la session : </b><hr>';
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';


// si on a que du php, il n'est pas nécessaire de fermer la balise php (bonne pratique)
