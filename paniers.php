<?php 
// Inclure le fichier d'en-tête
include('utilities/header.php'); 
// Inclure les fonctions liées aux produits
include('functions/products.fn.php'); 

// Si un panier est ajouté au panier d'achat
if (isset($_POST["basket_id"])) {
    // Initialiser le panier d'achat s'il n'existe pas encore
    if (!isset($_SESSION['basketCart'])) {
        $_SESSION['basketCart'] = [];
    }

    // Récupérer l'ID du panier
    $basket_id = $_POST["basket_id"];

    // Incrémenter la quantité du panier dans le panier d'achat
    if (isset($_SESSION['basketCart'][$basket_id])) {
        $_SESSION['basketCart'][$basket_id]++;
    } else {
        $_SESSION['basketCart'][$basket_id] = 1;
    }
}

// Si un produit est ajouté au panier d'achat
if (isset($_POST["product_id"]) && isset($_POST["quantity"])) {
    // Initialiser le panier d'achat s'il n'existe pas encore
    if (!isset($_SESSION['productCart'])) {
        $_SESSION['productCart'] = [];
    }
    // Récupérer l'ID du produit et sa quantité
    $product_id = $_POST["product_id"];
    $quantity = $_POST["quantity"];
    // Ajouter le produit avec sa quantité au panier d'achat
    if (array_key_exists($product_id, $_SESSION['productCart'])) {
        $_SESSION['productCart'][$product_id] += $quantity;
    } else {
        $_SESSION['productCart'][$product_id] = $quantity;
    }
}

// Inclure la section des paniers disponibles
include('./nosPaniers.php');
?>

<section class="container mt-4">
    <!-- Titre pour créer un panier personnalisé -->
    <h2 class="text-center mb-3">Créez votre panier personnalisé</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 d-flex justify-content-center">
        <?php 
        // Récupérer tous les produits disponibles
        $min_quantity = 1;
        $products_available = findAvailableProducts($db, $min_quantity);
        foreach ($products_available as $value) {
        ?>
            <div class="col d-flex justify-content-center">
                <div class="card m-3 flex-shrink-0" style="width: 18rem;">
                <?php include 'utilities/productCard.php';  ?>
                </div>
            </div>
        <?php    
        }
        ?>
    </div>
</section>

<?php 
// Inclure le pied de page
include('utilities/footer.php');
