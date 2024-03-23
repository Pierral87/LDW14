<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GET</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header class="bg-success text-white p-5 text-center">
        <h1>Page 2</h1>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <hr>
                <a href="page1.php">Aller sur la page 1</a>
                <hr>
                
                <?php 
                    // Get est un protocole HTTP (ce n'est pas propre à php)
                    // Get représente l'url
                    // Si au niveau de l'url, il y a un ?, l'url est avant ce ?. Ensuite on retrouve des informations complementaires que l'on peut exploiter dans la page.
                    // Syntaxe :
                    // url.com?indice1=valeur1&indice2=valeur2&indice3=valeur3&...

                    // L'outil php où l'on retrouvera ces informations :
                    // $_GET
                    // $_GET est une superglobale (disponible dans l'espace global ET aussi local naturellement)
                    // Les superglobales sont des tableaux array
                        
                    // on regarde via print_r ce qui se  trouve dans $_GET 
                    echo '<pre>';
                    print_r($_GET);
                    echo '</pre>';

                    // Exercice : affichez proprement (avec un echo) les informations présentent dans l'url
                    // La catégorie est : ...
                    // La couleur est : ...

                    // $_GET existe toujours (car lié à HTTP) mais par défaut vide
                    // Pour vérifier si ça existe afin d'éviter les erreurs, il faudra faire un isset sur chacun des indices présents dans $_GET
                    if( isset($_GET['category']) && isset($_GET['couleur']) ) {
                        echo 'La catégorie est : ' . $_GET['category'] . '<hr>';
                        echo 'La couleur est : ' . $_GET['couleur'] . '<hr>';
                    } else {
                        echo '<p>Veuillez cliquer sur un des liens de la page 1 afin de filtrer les résultats</p>';
                    } 

                    
                    
                ?>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>