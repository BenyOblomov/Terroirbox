<?php
// Récupération de tous les avis depuis la base de données
$reviews = findAllReviews($db);
?>

<section class="container-fluid mt-4">
    <div class="container">
        <h2 class="text-center mb-3">Avis de nos clients</h2>
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                // Parcours des avis par paire pour affichage dans un carrousel
                for ($i = 0; $i < count($reviews); $i += 2) {
                    $review1 = $reviews[$i];
                    // Vérification si un deuxième avis est disponible
                    $review2 = ($i + 1 < count($reviews)) ? $reviews[$i + 1] : null;
                    // Inclusion du modèle de carte d'avis
                    include("utilities/reviewCard.php");
                } 
                ?>
            </div>
        </div>
    </div>
</section>
