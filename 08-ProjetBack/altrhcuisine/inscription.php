<?php
include("inc/config.inc.php");
include("inc/functions.inc.php");


// Code PHP en rapport avec la page en cours doit se trouver ici !!!!! ---------------------------------------------
// Code de traitement inscription, isset de POST, les controles, l'insertion en BDD, tout se passerait ici !


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
                <h2 class="display-4 text-center text-success">Cuisine ALTRH - Inscrivez vous !</h2>
                <p class="text-center fs-5">Afin de partager vos recettes avec nous, n'hésitez pas à vous inscrire !!!</p>

                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>



</main>

<?php
include("inc/footer.inc.php");
