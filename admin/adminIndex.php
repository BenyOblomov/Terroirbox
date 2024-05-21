<?php
// Inclusion du fichier d'en-tête adminHeader.php
include dirname(__DIR__) . ("/admin/adminHeader.php");

// Inclusion du fichier contenant les fonctions d'administration
require_once dirname(__DIR__) . ('/functions/admin.fn.php');

if (isset($_POST['date']) && $_POST['date']=="month") {
    $startOf = date('Y-m-01');
    $endOf = date('Y-m-d', strtotime('last day of this month +1 day'));
    $titre = ' du mois';
} elseif (isset($_POST['date']) && $_POST['date']=="year") {
    $startOf = date('Y-01-01');
    $endOf = date('Y-m-d', strtotime('last day of this year +1 day'));
    $titre = ' de l\'année';
} else {
    $startOf = date('Y-m-d', strtotime('monday this week'));
    $endOf = date('Y-m-d', strtotime('sunday this week +1 day'));
    $titre = ' de la semaine';
}

// Récupération des données
$totalOrdersByDate = getTotalOrdersByDate($db, $startOf, $endOf);
$totalSalesByDate = getTotalSalesByDate($db, $startOf, $endOf);
$popularBasketsByDate = findMostPopularBasketsByDate($db, $startOf, $endOf);
$popularProductsByDate = findMostPopularProductsByDate($db, $startOf, $endOf);
$newUsersByDate = findNewUsersByDate($db, $startOf, $endOf);
$bestUsersByDate = findBestUsersByDate($db, $startOf, $endOf);
?>

    <section class="container">
        <h1 class="text-center mb-4">Dashboard</h1>
        <div class="d-flex justify-content-center align-items-center">
            <form class="d-flex m-2 col-3" method="post" action="">
            <!-- Sélection du critère de tri -->
                <select class="form-select" name="date" aria-label="Default select example">
                    <option value="week" <?php if (!isset($_POST['date']) || isset($_POST['date']) && $_POST['date']=="week") { echo 'selected'; } ?>>Semaine</option>
                    <option value="month" <?php if (isset($_POST['date']) && $_POST['date']=="month") { echo 'selected'; } ?>>Mois</option>
                    <option value="year" <?php if (isset($_POST['date']) && $_POST['date']=="year") { echo 'selected'; } ?>>Année</option>
                </select>
                <!-- Bouton pour soumettre le formulaire de tri -->
                <button class="btn btn-primary btn-sm" type="submit">Trier</button>
            </form>
        </div>
    </section> 
    <section class="container">
        <h2 class="text-center">Les ventes <?= $titre ?></h2>
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Nombre total de commandes <?= $titre ?></h5>
                        <p class="card-text"><?php echo $totalOrdersByDate; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total des ventes <?= $titre ?></h5>
                        <p class="card-text"><?php echo $totalSalesByDate; ?>€</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Paniers les plus vendus <?= $titre ?></h5>
                        <ul class="list-group">
                            <?php foreach ($popularBasketsByDate as $basket): ?>
                                <li class="list-group-item"><?php echo $basket['basket_name']; ?> - <?php echo $basket['total_sold']; ?> vendus</li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Produits les plus vendus <?= $titre ?></h5>
                        <ul class="list-group">
                            <?php foreach ($popularProductsByDate as $product): ?>
                                <li class="list-group-item"><?php echo $product['product_name']; ?> - <?php echo $product['total_sold']; ?> g</li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container">
        <h2 class="text-center">Les Inscriptions <?= $titre ?></h2>
        <div class="row mt-5">
             <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total des inscriptions <?= $titre ?></h5>
                        <p class="card-text"><?php echo $newUsersByDate; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Meilleurs clients <?= $titre ?></h5>
                        <ul class="list-group">
                            <?php foreach ($bestUsersByDate as $user): ?>
                                <li class="list-group-item"><?php echo $user['email']; ?> - <?php echo $user['total_spent']; ?> €</li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>      
    </section>

<?php
include dirname(__DIR__) . "/admin/adminFooter.php";
