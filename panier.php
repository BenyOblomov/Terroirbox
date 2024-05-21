<?php 
// Inclure le fichier d'en-tête
include('utilities/header.php');
// Inclure les fonctions liées aux produits
include('functions/products.fn.php');

// Récupérer les informations du panier spécifié par son ID dans l'URL
$basket = findBasketById($db, $_GET["id"]);
// Récupérer tous les produits associés à ce panier
$products = findAllBasketProducts($db, $basket['basket_id']);
?>

<section class="container mt-4">
    <!-- Titre du panier -->
    <h2 class="text-center m-3"><?=$basket["basket_name"]?></h2>
    <div class="row">
        <div class="col-md-6 offset-md-3 mt-5">
            <!-- Carte représentant le panier -->
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-4">
                        <!-- Image du panier -->
                        <img src="<?=$basket["image_path"]?>" class="img-fluid" alt="Image du panier">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <!-- Description et prix du panier -->
                            <p class="card-text"><?=$basket["description"]?></p>
                            <p class="card-text"><b>Prix : <?=$basket["price"]?> €</b></p>
                            <!-- Formulaire pour ajouter le panier au panier d'achat -->
                            <form method="post" action="paniers.php">
                                <input type="hidden" name="basket_id" value="<?=$basket["basket_id"]?>">
                                <button type="submit" id="addBasketToCart" class="btn btn-success m-auto">Acheter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal pour ajouter au panier -->
    <div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true">

</div>
    <!-- Titre des produits dans le panier -->
    <h3  class="text-center m-3 card-title">Dans le panier cette semaine</h3>
    <div class="row mt-4">
        <?php foreach ($products as $index => $product): ?>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <!-- Carte représentant chaque produit -->
                <div class="card mb-3">
                    <!-- Image du produit -->
                    <img src="<?=$product["image_path"]?>" class="card-img-top" alt="Image du produit">
                    <div class="card-body">
                        <!-- Nom, description et quantité du produit -->
                        <h5 class="card-title"><?=$product["product_name"]?></h5>
                        <p class="card-text"><?=$product["description"]?></p>
                        <p class="card-text">Quantité : <?=$product["quantity"]?>g</p>
                    </div>
                </div>
            </div>
            <!-- Fermer et ouvrir une nouvelle ligne de cartes toutes les 3 cartes -->
            <?php if (($index + 1) % 3 == 0): ?>
                </div><div class="row mt-4">
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>

<?php
// Inclure le fichier de pied de page
include('utilities/footer.php');
