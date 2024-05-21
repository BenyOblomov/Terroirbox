<?php
// Inclusion de l'en-tête de la page et du fichier de fonctions pour récupérer les produits
include('utilities/header.php');
include('functions/products.fn.php');

// Vérification de l'existence de la variable de session 'user_id'
if (!isset($_SESSION['user_id'])) {
    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: connexion.php");
    exit();
}

// Récupération des informations de l'utilisateur depuis les variables de session
$user_id = $_SESSION['user_id'];
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$email = $_SESSION['email'];
$address = $_SESSION['address'];
$phone_number = $_SESSION['phone_number'];

// Récupération de l'historique des commandes de l'utilisateur depuis la base de données
$orders = findOrdersbyUserId($db, $user_id);
?>

<section class="container mt-4">
    <h2>Informations de votre compte :</h2>
    <!-- Affichage des informations du compte de l'utilisateur -->
    <p><strong>Prénom : </strong><?= $first_name ?></p>
    <p><strong>Nom : </strong><?= $last_name ?></p>
    <p><strong>Email : </strong><?= $email ?></p>
    <p><strong>Adresse : </strong><?= $address ?></p>
    <p><strong>Numéro de téléphone : </strong><?= $phone_number ?></p>

    <?php
    // Vérification de l'existence d'historique de commandes
    if ($orders) {
    ?>
        <h3>Historique de vos commandes :</h3>
        <div class="table-responsive my-4">
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
                    <!-- Boucle pour afficher chaque commande dans un tableau -->
                    <?php foreach ($orders as $order): ?>
                        <tr>
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
        // Message indiquant qu'aucune commande n'a été trouvée
        echo "<h2>Historique de vos commandes :</h2><br>
        <p>Aucune commande trouvée.</p>";
    }
    ?>
</section>

<?php
// Inclusion du pied de page de la page
include('utilities/footer.php');
