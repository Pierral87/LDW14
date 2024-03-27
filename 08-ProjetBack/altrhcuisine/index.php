<?php
include("inc/config.inc.php");
include("inc/functions.inc.php");


    // Code PHP en rapport avec la page en cours doit se trouver ici !!!!! ---------------------------------------------


include("inc/header.inc.php"); // <--------------------- DEBUT DES AFFICHAGES !!! 
include("inc/nav.inc.php");
?>




<section class="banner">
    <div class="container">
        <div class="row align-items-center baniere">
            <div class="col-4 d-flex justify-content-center">
                <img src="assets/img/logofinal.png" class="img-fluid" alt="" style="max-height:200px;">
            </div>
            <div class="col-8 p-5">
                <h1 class="display-1 text-danger text-center">La cuisine de ALTRH</h1>

            </div>
        </div>
    </div>
</section>

<main>
    <section>
        <div class="container">
            <div class="row p-3 justify-content-center">
                <h2 class="display-4 text-center text-success">Cuisine ALTRH - Le Concept</h2>
                <p class="text-center fs-5">Fier de vous proposer des produits de qualité : Lorem ipsum dolor sit
                    amet, consectetur adipisicing elit. Recusandae magni, sit distinctio ducimus commodi deleniti
                    sunt optio qui velit facilis? Iusto dolore facere ipsa deserunt, error molestiae quos natus
                    aliquam!</p>
                <button type="button" class="btn btn-warning w-25">Contactez nous !</button>
            </div>
        </div>
    </section>

    <section class="bg-light-subtle">
        <div class="container">
            <div class="row justify-content-center mt-5 p-3">
                <div class="col-md-8">
                    <h2 class="display-4 text-center text-success">La recette du moment</h2>
                    <p class="fs-5">Réalisez notre recette coup de coeur : Lorem ipsum, dolor sit amet consectetur
                        adipisicing elit. Quos quia ex molestias accusamus dicta doloribus ipsa. Optio amet
                        voluptates porro iste natus! Consequuntur sunt cum voluptatem in inventore soluta officiis?
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="assets/img/plat1.jpg" alt="" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row justify-content-center mt-5 p-3">
                <div class="col-md-8 order-md-2">
                    <h2 class="display-4 text-center text-success">La recette préférée de Camille</h2>
                    <p class="fs-5">Réalisez notre recette coup de coeur : Lorem ipsum, dolor sit amet consectetur
                        adipisicing elit. Quos quia ex molestias accusamus dicta doloribus ipsa. Optio amet
                        voluptates porro iste natus! Consequuntur sunt cum voluptatem in inventore soluta officiis?
                    </p>
                </div>
                <div class="col-md-4 order-md-1">
                    <img src="assets/img/plat2.jpg" alt="" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light-subtle">
        <div class="container">
            <div class="row justify-content-center mt-5 p-3">
                <div class="col-xl-3 col-lg-6 p-3">
                    <h2 class="display-4 text-center text-success">La recette de Pierra</h2>
                    <p class="fs-5">Réalisez la recette de votre formateur !
                    </p>
                </div>
                <div class="col-xl-3 col-lg-6 mt-4 p-3">
                    <img src="assets/img/plat3.jpg" alt="" class="img-fluid rounded">
                </div>
                <div class="col-xl-3 col-lg-6 p-3">
                    <h2 class="display-4 text-center text-success">La recette de Laurette</h2>
                    <p class="fs-5">Réalisez la recette de la directrice !
                    </p>
                </div>
                <div class="col-xl-3 col-lg-6 mt-4 p-3">
                    <img src="assets/img/plat4.jpg" alt="" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

</main>

<?php
include("inc/footer.inc.php");
