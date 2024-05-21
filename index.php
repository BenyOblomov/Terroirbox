<?php
// Inclusion des fichiers nécessaires
include('utilities/header.php'); // En-tête de la page
include('functions/products.fn.php'); // Fonctions relatives aux produits
include('./nosPaniers.php'); // Section des paniers disponibles
include('./carouselProduitsDispo.php'); // Carrousel des produits disponibles
?>

<section class="container-fluid bg-success text-white mt-4 py-3">
    <!-- Section présentant TerroirBox -->
    <h2 class="text-center mb-3">Qui sommes nous ?</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center align-items-center mb-3">
                <img class="w-75 rounded d-block" src="assets/img/autres/livreur.jpg" alt="Un livreur tient une caisse de fruits et légumes">
            </div>
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                <h3 class="w-75 text-center-md">We are TerroirBox</h3>
                <p class="w-75">TerroirBox vous offre une sélection de paniers de fruits et légumes bio, livrés à votre porte. Nous valorisons les produits locaux et de saison, cultivés avec soin par nos agriculteurs partenaires. Rejoignez-nous dans notre engagement pour une alimentation saine, respectueuse de l'environnement et soutenant les communautés locales. Bienvenue chez TerroirBox !</p>
                <a type="submit" class="btn btn-light text-dark" href="Apropos.php">A propos</a>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid py-3">
    <!-- Section d'inscription -->
    <h2 class="text-center mb-3">Inscrivez-vous</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center justify-content-center align-items-center mb-3">
                <div class="w-75 h-75 d-flex flex-column justify-content-around align-items-center">
                    <p class="w-100">
                        En vous inscrivant à notre abonnement, vous avez la possibilité de découvrir une variété de produits de saison, tout en soutenant les pratiques agricoles durables. Chaque panier est composé selon les récoltes du moment, ce qui vous garantit une expérience culinaire diversifiée et toujours renouvelée.

                        Ne manquez pas l'opportunité de simplifier votre vie et de vous engager dans une alimentation plus saine en rejoignant la famille TerroirBox dès aujourd'hui ! Inscrivez-vous maintenant pour recevoir votre premier panier et commencez votre voyage vers une alimentation consciente et délicieuse.
                    </p>
                    <a type="submit" class="btn btn-success" href="connexion.php">Inscription</a>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <img class="w-75 rounded mx-auto d-block" src="assets/img/autres/producteur.jpg" alt="Un producteur tient un panier de fruits et légumes">
            </div>
        </div>
    </div>
</section>

<?php
// Inclusion de la section des avis des clients
include('./avisClients.php');
// Inclusion du pied de page
include('utilities/footer.php');
