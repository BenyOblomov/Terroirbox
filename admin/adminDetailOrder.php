<?php
// Inclusion du fichier d'en-tête et des fonctions nécessaires
include dirname(__DIR__) . "/admin/adminHeader.php";
require_once dirname(__DIR__) . '/functions/admin.fn.php';

// Récupération des détails de la commande et des produits inclus
$order = findOrderById($db, $_GET['id']);

$products = findProductsByOrderId($db, $_GET['id']);

$baskets = findBasketsByOrderId($db, $_GET['id']);
?>

<div class="container">
    <div class="row mb-3">
        <h2 class="my-4 text-center">Commande n° <?php echo $order['order_id']; ?></h2>
        <div class="col-lg-4 mb-2">
            <p><strong>Par:</strong> <?php echo $order['email']; ?></p>
        </div>
        <div class="col-lg-4 mb-2">
            <p><strong>Date:</strong> <?php echo $order['order_date']; ?></p>
        </div>
        <div class="col-lg-4 mb-2">
            <p><strong>Statut:</strong> <?php echo $order['status']; ?></p>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <h4>Contenu de la commande</h4>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nom du produit</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Prix unitaire ou /kg (€)</th>
                            <th scope="col" class="text-end">Total (€)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $totalAllProducts = 0;
                        foreach ($products as $product) : ?>
                            <tr>
                                <td><?php echo $product['product_name']; ?></td>
                                <td><?php echo $product['quantity']; ?> g</td>
                                <td><?php echo $product['price']; ?></td>
                                <td class="text-end"><?php 
                                $totalProduct = round($product['quantity']/1000 * $product['price'], 2);
                                $totalAllProducts += $totalProduct;
                                echo $totalProduct ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php 
                        $totalAllBaskets = 0; 
                        foreach ($baskets as $basket) : ?>
                            <tr>
                                <td><?php echo $basket['basket_name']; ?></td>
                                <td><?php echo $basket['quantity']; ?></td>
                                <td><?php echo $basket['price']; ?></td>
                                <td class="text-end"><?php 
                                $totalBasket = round($basket['quantity'] * $basket['price'], 2);                                
                                $totalAllBaskets += $totalBasket;
                                echo $totalBasket; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col text-end">
            <h4>Total</h4>
            <?php
            $total = $totalAllProducts + $totalAllBaskets;
            ?>
            <p><strong>Prix total :</strong> <?php echo $total ?>€</p>
        </div>
    </div>
</div>

<?php
include dirname(__DIR__) . "/admin/adminFooter.php";
