<?php 
// Inclure le fichier d'en-tête
include('utilities/header.php');
// Inclure les fonctions liées aux produits
include('functions/products.fn.php');

// Trouver le produit par son ID
$product = findProductById($db, $_GET["id"]);
?>

<section class="container mt-4">
  <!-- Titre du produit -->
  <h2 class="text-center mb-3"><?=$product["product_name"]?></h2>
    <div class="row">
        <!-- Affichage du produit -->
        <div class="col-md-6 offset-md-3 mt-5">
            <div class="card">
                <!-- Image du produit -->
                <img src="<?=$product["image_path"]?>" class="card-img-top" alt="Image du produit">
                <div class="card-body">
                    <!-- Nom du produit -->
                    <h5 class="card-title" id="product_for_recepe"><?=$product["product_name"]?></h5>
                    <!-- Description du produit -->
                    <p class="card-text"><?=$product["description"]?></p>
                    <!-- Prix du produit -->
                    <p class="card-text"><b><?=$product["price"]?> €/kg</b></p>
                    <!-- Formulaire pour ajouter le produit au panier -->
                    <form method="post" action="paniers.php">
                        <!-- Champ caché pour l'ID du produit -->
                        <input type="hidden" name="product_id" value="<?=$product["product_id"]?>">
                        <div class="form-group">
                            <label for="quantity">Choisir la quantité:</label>
                            <!-- Sélection de la quantité -->
                            <select class="form-control my-3" id="quantity" name="quantity">
                                <option value="200">200g</option>
                                <option value="300">300g</option>
                                <option value="500">500g</option>
                                <option value="1000">1kg</option>
                            </select>
                        </div>
                        <!-- Bouton pour ajouter le produit au panier -->
                        <button type="submit" id="addProductToCart" class="btn btn-success m-auto">Acheter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
// Inclure le carousel des produits disponibles
include('./carouselProduitsDispo.php');
// Inclure les recettes
include('./recettes.php');
// Inclure le pied de page
include('utilities/footer.php');
