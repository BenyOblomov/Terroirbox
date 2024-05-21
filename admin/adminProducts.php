<?php
// Inclusion du fichier d'en-tête adminHeader.php
include dirname(__DIR__) . ("/admin/adminHeader.php");

// Inclusion du fichier contenant les fonctions d'administration
require_once dirname(__DIR__) . ('/functions/admin.fn.php');

// Vérification si le formulaire de suppression de produit a été soumis
if (isset($_POST['delete_product'])) {
    // Vérification si l'ID du produit est défini dans le formulaire
    if (isset($_POST['product_id'])) {
        // Récupération de l'ID du produit à supprimer
        $productId = $_POST['product_id'];        
        $product = findProductById($db, $productId);
        $path_to_unlink = '../'.$product['image_path'];
            if (file_exists($path_to_unlink)) {
                unlink($path_to_unlink);
            }
            // Appel de la fonction pour supprimer le produit
            deleteProduct($db, $productId);
    }
}

if (isset($_POST['trier'])) {
    // Sélection du choix de tri des produits
    $_SESSION['ProductSortBy'] = $_POST['trier'];
    // Récupération des produits triés selon le choix
    $products = SortProductsBy($db, $_SESSION['ProductSortBy']);
} else if (isset($_SESSION['ProductSortBy'])) {
    // Si aucun tri n'a été appliqué, récupérer tous les produits
    $products = SortProductsBy($db, $_SESSION['ProductSortBy']);
} else {
    $products = SortProductsBy($db, "product_id");
}

// Nombre maximum de produits par page
$productsPerPage = 15;

// Page actuelle (par défaut: 1)
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calcul de l'index de départ pour la pagination
$totalProducts = count($products);

// Calcul de l'index de départ pour la pagination
$start = ($page - 1) * $productsPerPage;

// Liste des produits à afficher sur la page actuelle
$productsToShow = array_slice($products, $start, $productsPerPage);

// Nombre total de pages après le tri
$totalPages = ceil($totalProducts / $productsPerPage);

// Liste des produits à afficher sur la page actuelle
$productsToShow = array_slice($products, $start, $productsPerPage);

// Nombre total de pages
$totalPages = ceil(count($products) / $productsPerPage);
?>

<!-- Modal d'ajout de produit -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Catégorie du produit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Quel type de produit souhaitez-vous ajouter?
      </div>
      <div class="modal-footer d-flex justify-content-between">
        <div>
                <a class="btn btn-primary" href='adminAddProduct.php?category=1'>Ajouter un fruit</a>
            </div>
            <div>
                <a class="btn btn-primary" href='adminAddProduct.php?category=2'>Ajouter un légume</a>
            </div>
      </div>
    </div>
  </div>
</div>
<!-- Début de la section principale -->
<div class="container">
    <!-- Titre du tableau des produits -->
    <h2 class="my-4 text-center">Tableau des Produits</h2>
    <!-- Formulaire de tri des produits -->
    <div class="d-flex justify-content-around align-items-center">
        <form class="d-flex m-2 col-3" method="post" action="adminProducts.php">
            <!-- Sélection du critère de tri -->
            <select class="form-select" name="trier" aria-label="Default select example">
                <option value="product_name" <?php if (isset($_POST['trier']) && $_POST['trier']=="product_name") { echo 'selected'; } ?>>Nom</option>
                <option value="price" <?php if (isset($_POST['trier']) && $_POST['trier']=="price") { echo 'selected'; } ?>>Prix</option>
                <option value="available_quantity DESC" <?php if (isset($_POST['trier']) && $_POST['trier']=="available_quantity DESC") { echo 'selected'; } ?>>Quantité</option>
            </select>
            <!-- Bouton pour soumettre le formulaire de tri -->
            <button class="btn btn-primary btn-sm" type="submit">Trier</button>
        </form>
        <!-- Bouton pour ajouter un produit -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Ajouter un produit
        </button>
    </div>

<!-- Tableau responsive pour afficher la liste des produits -->
<div class="table-responsive">
    <table class="table table-striped">
        <!-- En-tête du tableau -->
        <thead class="thead-dark">
            <tr>
                <th class="d-none d-md-table-cell">ID</th>
                <th class="d-none d-md-table-cell">Photo</th>
                <th>Nom</th>
                <th>Prix (/kilo)</th>
                <th>Quantité (g)</th>
                <th>Action</th>
            </tr>
        </thead>
        <!-- Corps du tableau -->
        <tbody>
            <?php foreach ($productsToShow as $product): ?>
            <!-- Itération à travers chaque produit -->
            <tr>
                <!-- Affichage de l'ID du produit -->
                <td class="d-none d-md-table-cell"><?php echo $product['product_id']; ?></td>
                <!-- Affichage de la miniature du produit -->
                <td class="d-none d-md-table-cell"><img src="../<?= $product['image_path']; ?>" alt="Photo miniature du produit" width="50"></td>
                <!-- Affichage du nom du produit -->
                <td><?php echo $product['product_name']; ?></td>
                <!-- Affichage du prix du produit -->
                <td><?php echo $product['price']; ?></td>
                <!-- Affichage de la quantité disponible du produit -->
                <td><?php echo $product['available_quantity']; ?></td>
                <!-- Cellule contenant les boutons d'action pour chaque produit -->
                <td>
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Bouton pour éditer le produit -->
                        <a class="btn btn-primary btn-sm" href="adminEditProduct.php?id=<?= $product['product_id'] ?>"><i class="bi bi-pencil"></i></a>
                        <!-- Formulaire pour supprimer le produit -->
                        <form method="post" action="adminProducts.php">
                            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                            <button class="btn btn-danger btn-sm" type="submit" name="delete_product" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit?')"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- Fin du tableau responsive -->

<!-- Pagination -->
<nav aria-label="Page navigation example" class="d-flex justify-content-around align-items-center">
    <ul class="pagination">
        <!-- Bouton "Précédent" -->
        <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
            <a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Prev</span>
            </a>
        </li>

        <!-- Affichage des pages -->
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>

        <!-- Bouton "Suivant" -->
        <li class="page-item <?php echo ($page >= $totalPages) ? 'disabled' : ''; ?>">
            <a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>

<?php
include dirname(__DIR__) . "/admin/adminFooter.php";