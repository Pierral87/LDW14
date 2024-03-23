<?php 

include 'inc/header.inc.php';
include 'inc/nav.inc.php';

// exercices :
// 01 - créez un dossier img/ à la racine du dossier exercice
// 02 - récupérez 5 images sur le net, placez les dans le dossier img/ et renommez les de cette manière : image1.jpg image2.jpg, image3.jpg, image4.jpg et image5.jpg
// 03 - Affichez une des 5 images avec un echo
// 04 - Affichez 5 fois la même image toujours avec un seul echo dans le code (indice : une boucle)
// 05 - Affichez les 5 images toujours avec un seul echo dans le code (indice : une boucle + ...)


?>
    <div class="container">
        <div class="row">
            <div class="col-12 my-5">
                <h2 class="p-3 border-bottom">Exercice Images</h2>
                
                <h3>Affichez une image avec un echo</h3>
                <div class="d-flex my-5 justify-content-between">
                    <?php
                    
                    echo '<img src="img/image1.webp" alt="" width="19%">';

                    ?>
                </div>
                <h3>Affichez cinq fois la même image avec un echo</h3>
                <div class="d-flex my-5 justify-content-between">
                    <?php
                    
                    for($i = 0; $i < 5; $i++) {
                        echo '<img src="img/image2.webp" alt="" width="19%">';
                    }

                    ?>
                </div>
                <h3>Affichez les cinq images avec un echo</h3>
                <div class="d-flex my-5 justify-content-between">
                    <?php
                    
                    for($i = 1; $i <= 5; $i++) {
                        // echo '<img src="img/image' . $i . '.webp" alt="" width="230px">';
                        echo "<img src='img/image$i.webp' alt='' width='19%'>";
                    }

                    ?>
                </div>
                <h3>Affichez les cinq images avec un echo n°2</h3>
                <div class="d-flex my-5 justify-content-between flex-wrap">
                    <?php
                    $tab = array(
                        'image1.webp',
                        'image2.webp',
                        'image3.webp',
                        'image4.webp',
                        'image5.webp',
                    );

                    foreach($tab AS $img) {
                        echo "<img src='img/$img' alt='' width='19%'>";
                    }
                    
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php 
include 'inc/footer.inc.php';

?>
