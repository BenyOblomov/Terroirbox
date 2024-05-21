<?php
// Inclusion du fichier d'en-tête adminHeader.php
include dirname(__DIR__) . ("/admin/adminHeader.php");

// Inclusion du fichier contenant les fonctions d'administration
require_once dirname(__DIR__) . ('/functions/admin.fn.php');

if (isset($_POST['trier'])) {
    // Sélection du choix de tri des produits
    $_SESSION['OrdersSortBy'] = $_POST['trier'];
    // Récupération des produits triés selon le choix
    $orders = SortOrdersBy($db, $_SESSION['OrdersSortBy']);
} else if (isset($_SESSION['OrdersSortBy'])) {
    // Si aucun tri n'a été appliqué, récupérer tous les produits
    $orders = SortOrdersBy($db, $_SESSION['OrdersSortBy']);
} else {
    $orders = SortOrdersBy($db, "order_id");
}

// Nombre maximum de commandes par page
$ordersPerPage = 15;

// Page actuelle (par défaut: 1)
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calcul de l'index de départ pour la pagination
$start = ($page - 1) * $ordersPerPage;

// Liste des commandes à afficher sur la page actuelle
$ordersToShow = array_slice($orders, $start, $ordersPerPage);

// Nombre total de pages
$totalPages = ceil(count($orders) / $ordersPerPage);
?>

<!-- Début de la section principale -->
<div class="container">
    <!-- Titre du tableau des commandes -->
    <h2 class="my-4 text-center">Tableau des commandes</h2>
    <div class="d-flex justify-content-around align-items-center">
        <form class="d-flex m-2 col-3" method="post" action="adminOrders.php">
            <!-- Sélection du critère de tri -->
            <select class="form-select" name="trier" aria-label="Default select example">
                <option value="order_date DESC" <?php if (isset($_POST['trier']) && $_POST['trier']=="order_date DESC") { echo 'selected'; } ?>>Date</option>
                <option value="status_id" <?php if (isset($_POST['trier']) && $_POST['trier']=="status_id") { echo 'selected'; } ?>>Statut</option>
                <option value="email" <?php if (isset($_POST['trier']) && $_POST['trier']=="email") { echo 'selected'; } ?>>Utilisateur</option>
                <option value="total_price DESC" <?php if (isset($_POST['trier']) && $_POST['trier']=="total_price DESC") { echo 'selected'; } ?>>Prix total</option>
            </select>
            <!-- Bouton pour soumettre le formulaire de tri -->
            <button class="btn btn-primary btn-sm" type="submit">Trier</button>
        </form></div>
        
    <!-- Début du tableau -->
    <table class="table table-striped">
        <!-- En-tête du tableau -->
        <thead class="thead-dark">
            <tr class="">
                <th class="d-none d-md-table-cell">ID</th>
                <th class="d-none d-md-table-cell">Par</th>
                <th>Date</th>
                <th>Statut</th>
                <th>Prix (€)</th> 
                <th>Action</th>
            </tr>
        </thead>
        <!-- Corps du tableau -->
        <tbody>
            <?php foreach ($ordersToShow as $order): ?>
            <!-- Itération à travers chaque commande -->
            <tr>
                <!-- Affichage de l'ID de la commande -->
                <td class="d-none d-md-table-cell"><?php echo $order['order_id']; ?></td>
                <!-- Affichage de l'email de l'utilisateur qui a passé la commande -->
                <td class="d-none d-md-table-cell"><?php echo $order['email']; ?></td>
                <!-- Affichage de la date de la commande -->
                <td><?php echo $order['order_date']; ?></td>
                <!-- Affichage du statut de la commande -->
                <td><?php echo $order['status']; ?></td>
                <!-- Affichage du prix total de la commande -->
                <td><?php echo $order['total_price']; ?></td>
                <!-- Cellule contenant les boutons d'action pour chaque commande -->
                <td>
                    <!-- Bouton pour voir les détails de la commande -->
                    <a href="adminDetailOrder.php?id=<?= $order['order_id'] ?>" class="btn btn-success btn-sm"><i class="bi bi-three-dots"></i></a>
                    <!-- Bouton pour modifier la commande -->
                    <a href="adminEditOrder.php?id=<?= $order['order_id'] ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- Fin du tableau -->

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
    <!-- Fin de la pagination -->
</div>

<?php
include dirname(__DIR__) . "/admin/adminFooter.php";
