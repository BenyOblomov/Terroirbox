<!-- Section contenant les autres produits disponibles -->
<section class="container position-relative mt-4">
    <!-- Titre de la section -->
    <h2 class="text-center mb-3">Autres produits disponibles</h2>
    <!-- Conteneur avec défilement horizontal -->
    <div class="overflow-hidden">
        <!-- Carrousel des produits -->
        <div id="slider" class="d-flex w-100">
            <?php 
            // Récupération des produits disponibles depuis la base de données
            $min_quantity = 1;
            $products_available = findAvailableProducts($db, $min_quantity);
            // Boucle pour afficher chaque produit dans le carrousel
            foreach ($products_available as $value) {
            ?>
                <!-- Carte représentant un produit -->
                <div class="card m-3 flex-shrink-0" style="width: 18rem;">
                    <?php include 'utilities/productCard.php'; ?> <!-- Inclut le fichier PHP pour afficher les détails du produit -->
                </div>
            <?php
            }
            ?>
        </div>
        <!-- Boutons de navigation du carrousel -->
        <button type="button" id="prev" class="position-absolute top-50 start-0 translate-middle-y"><i class="bi bi-chevron-compact-left"></i></button>
        <button type="button" id="next" class="position-absolute top-50 end-0 translate-middle-y"><i class="bi bi-chevron-compact-right"></i></button>
    </div>
</section>

<!-- Inclusion du script JavaScript pour le carrousel -->
<script src="carouselProduitsDispo.js"></script>
