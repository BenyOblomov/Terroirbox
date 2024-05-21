<?php
// Inclusion du fichier d'en-tête et des fonctions nécessaires
include dirname(__DIR__) . "/admin/adminHeader.php";
require_once dirname(__DIR__) . '/functions/admin.fn.php';

// Récupération des informations de l'utilisateur
$user = findUserById($db, $_GET['id']);
?>

<section class="container my-4">
    <h2 class='my-4'>Informations du compte :</h2>
    <!-- Affichage des informations de l'utilisateur -->
    <p><strong>Prénom : </strong><?= $user['first_name'] ?></p>
    <p><strong>Nom : </strong><?= $user['last_name'] ?></p>
    <p><strong>Rôle : </strong><?= $user['role'] ?></p>
    <p><strong>Email : </strong><?= $user['email'] ?></p>
    <p><strong>Adresse : </strong><?= $user['address'] ?></p>
    <p><strong>Numéro de téléphone : </strong><?= $user['phone_number'] ?></p>
    <p><strong>Date d'inscription : </strong><?= $user['registration_date'] ?></p>

    <?php
    // Récupération de l'historique des commandes de l'utilisateur
    $orders = findOrdersbyUserId($db, $_GET['id']);

    // Vérification s'il y a des commandes
    if ($orders) {
    ?>
    <h2 class="my-4">Historique des commandes :</h2>
    <div class="table-responsive">
        <!-- Tableau pour afficher l'historique des commandes -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                <tr>
                    <!-- Affichage des détails de chaque commande -->
                    <td><?= $order['order_id'] ?></td>
                    <td><?= $order['order_date'] ?></td>
                    <td><?= $order['total_price'] ?> €</td>
                    <td><?= $order['status'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php
    } else {
        // Affichage d'un message si aucune commande n'est trouvée
        echo "<h2>Historique de vos commandes :</h2><br>
            <p>Aucune commande trouvée.</p>";
    }

include dirname(__DIR__) . "/admin/adminFooter.php";
