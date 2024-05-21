<?php
// Inclusion du fichier d'en-tête et des fonctions nécessaires
include dirname(__DIR__) . "/admin/adminHeader.php";
require_once dirname(__DIR__) . '/functions/admin.fn.php';

// Récupération de tous les paniers
$baskets = findAllBaskets($db);
?>

<div class="container">
    <h2 class="my-4 text-center">Tableau des Paniers</h2>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prix (€)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($baskets as $basket): ?>
            <tr>
                <td><?php echo $basket['basket_id']; ?></td>
                <td><?php echo $basket['basket_name']; ?></td>
                <td><?php echo $basket['price']; ?></td>
                <td>
                    <a class="btn btn-primary btn-sm" href="adminEditBasket.php?id=<?= $basket['basket_id'] ?>"><i class="bi bi-pencil"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
include dirname(__DIR__) . "/admin/adminFooter.php";