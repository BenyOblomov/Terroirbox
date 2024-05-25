<?php
// Inclusion du fichier d'en-tête et des fonctions nécessaires
include dirname(__DIR__) . "/admin/adminHeader.php";
include dirname(__DIR__) . "/functions/admin.fn.php";

// Traitement de la suppression d'un produit du panier
if (isset($_POST['delete_product'])) {
    $productId = $_POST['product_id'];
    $basketId = $_GET['id'];
    deleteBasketProduct($db, $basketId, $productId);

    // Redirection pour rafraîchir la page
    header("Location: {$_SERVER['REQUEST_URI']}");
    exit;
}

// Traitement de l'ajout d'un produit au panier
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_product'])) {
    $basketId = $_POST['basket_id'];
    $productId = $_POST['other_product'];
    $quantity = $_POST['quantity'];

    addBasketProducts($db, $productId, $quantity, $basketId);
}

// Traitement de la mise à jour du panier
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_basket'])) {
    $basket_id = htmlspecialchars($_POST['basket_id']);
    $basket_name = htmlspecialchars($_POST['basket_name']);
    $description = htmlspecialchars($_POST['description']);
    $price = htmlspecialchars($_POST['price']);
    $image_path = htmlspecialchars($_POST['image_path']);

    UpdateBasket($db, $basket_id, $basket_name, $description, $price, $image_path);
}

// Récupération des informations du panier et de ses produits
$basket = findBasketById($db, $_GET["id"]);
$products = findAllBasketProducts($db, $basket['basket_id']);
?>

<div class="container">
    <!-- Formulaire de modification du panier -->
    <h2 class="my-4 text-center">Modifier le Panier</h2>
    <form action="" method="POST">
        <input type="hidden" name="basket_id" value="<?php echo $basket['basket_id']; ?>">
        <div class="mb-3">
            <label for="basket_name" class="form-label">Nom du Panier</label>
            <input type="text" class="form-control" id="basket_name" name="basket_name" value="<?php echo $basket['basket_name']; ?>">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prix</label>
            <input type="text" class="form-control" id="price" name="price" value="<?php echo $basket['price']; ?>">
        </div>
        <div class="mb-3">
            <label for="image_path" class="form-label">Chemin de l'image</label>
            <input type="text" class="form-control" id="image_path" name="image_path" value="<?php echo $basket['image_path']; ?>">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"><?php echo $basket['description']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="update_basket">Enregistrer les modifications</button>
    </form>

    <hr>

    <!-- Tableau des produits dans le panier -->
    <h3 class="my-4">Produits dans le Panier</h3>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nom</th>
                <th>Quantité</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['product_name']; ?></td>
                <td><?php echo $product['quantity']; ?></td>
                <td>
                    <!-- Formulaire pour supprimer un produit du panier -->
                    <form method="post" action="">
                        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                        <button class="btn btn-danger btn-sm" type="submit" name="delete_product" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            <!-- Formulaire pour ajouter un nouveau produit au panier -->
            <tr>
                <form action="" method="POST">
                    <input type="hidden" name="basket_id" value="<?php echo $basket['basket_id']; ?>">
                    <td>
                        <select name="other_product" id="other_product">
                            <?php
                            // Récupération des IDs de produits déjà dans le panier
                            $productIdsInBasket = array_column($products, 'product_id');
                            // Récupération des produits disponibles sauf ceux déjà dans le panier
                            $products_available = findAvailableProductsExcept($db, $productIdsInBasket);
                            foreach ($products_available as $product): ?>
                                <option value="<?php echo $product['id']; ?>"><?php echo $product['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td class="d-none d-md-table-cell">
                        <input type="number" name="quantity" id="quantity">
                    </td>
                    <td>
                        <button type="submit" class="btn btn-primary btn-sm" name="add_product">Ajouter</button>
                    </td>
                </form>
            </tr>
        </tbody>
    </table>
</div>

<?php
include dirname(__DIR__) . "/admin/adminFooter.php";
