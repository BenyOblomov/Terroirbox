<?php
// Inclusion de l'en-tête de la page et du fichier de fonctions pour récupérer les produits
include('utilities/header.php');
include('functions/products.fn.php');
include('mail.php');

// Initialisation des variables
$allProducts = [];
$orderCancelled = false;

// Récupération des produits ajoutés au panier
if (isset($_SESSION["basketCart"])) {
    foreach ($_SESSION["basketCart"] as $basketId => $quantity) {
        $products = findAllBasketProductsQuantity($db, $basketId);
        foreach ($products as &$product) {
            $product["quantity"] *= $quantity; 
        }
        $allProducts = array_merge($allProducts, $products);
    }
}

if (isset($_SESSION["productCart"])) {
    // Ajout des produits simples au tableau de tous les produits
    foreach ($_SESSION["productCart"] as $productId => $quantity) {
        $allProducts[] = ['product_id' => $productId, 'quantity' => $quantity];
    }
}

// Récupération des quantités disponibles en stock pour chaque produit
$stockProducts = array_column(findProductsByIds($db, array_column($allProducts, 'product_id')), 'available_quantity', 'product_id');

if(isset($_POST['confirm_payment'])) {

    // Vérification si la commande peut être validée en fonction des stocks
    foreach ($allProducts as $product) {
        $productId = $product['product_id'];
        $orderQuantity = $product['quantity'];

        // Si la quantité commandée dépasse les stocks disponibles, la commande est annulée
        if (!isset($stockProducts[$productId]) || $orderQuantity > $stockProducts[$productId]) {
            $orderCancelled = true;
            break; 
        }
    }

    // Si la commande n'est pas annulée, procéder à l'ajout de la commande dans la base de données
    if (!$orderCancelled) {
        $date_actuelle = date("Y-m-d H:i:s");
        $userEmail = $_SESSION['email'];
        $subject = "Votre commande à Terroirbox";
        $body = "Bonjour ".$_SESSION['first_name']." ,
        \n\nvotre commande effectuée le ".$date_actuelle." pour un montant de ".$_SESSION["totalPrice"]." € à Terroirbox a bien été prise en compte .
        \nPour le suivi, rendez-vous dans la section \"Mon compte\" sur le site de Terroirbox.\nNous vous remercions de votre confiance.
        \n\nCordialement,
        \n\nL'equipe de TerroirBox";
        sendEmail($mail, $userEmail, $subject, $body);
        addOrder($db, $_SESSION['user_id'], $date_actuelle, $_SESSION["totalPrice"]);
        $_SESSION["basketCart"] = [];
        $_SESSION["productCart"] = [];
        $_SESSION["totalPrice"] = 0;
        echo '<div class="alert alert-success text-center" role="alert">
                Paiement effectué. La commande a bien été prise en compte.
            </div>';
        
    } else {
        // Affichage d'un message d'erreur si certains produits ne sont pas disponibles en quantité suffisante
        echo '<div class="alert alert-danger" role="alert">
                Désolé, certains produits ne sont pas disponibles en quantité suffisante en stock.
              </div>';
    }
}

// Suppression d'un panier du session s'il a été demandé
if (isset($_POST['delete_basket'])) {
    $basketToDelete = $_POST['delete_basket'];
    if (array_key_exists($basketToDelete, $_SESSION["basketCart"])) {
        unset($_SESSION["basketCart"][$basketToDelete]);
    }
}

// Suppression d'un produit du panier s'il a été demandé
if (isset($_POST['delete_product'])) {
    $productToDelete = $_POST['delete_product'];
    if (array_key_exists($productToDelete, $_SESSION["productCart"])) {
        unset($_SESSION["productCart"][$productToDelete]);
    }
}

// Récupération et affichage des paniers ajoutés au panier de session
if (isset($_SESSION["basketCart"]) && !empty($_SESSION["basketCart"])) {
    $basketsById = findBasketsByIds($db, array_keys($_SESSION["basketCart"]));
}

// Récupération et affichage des produits ajoutés au panier de session
if (isset($_SESSION["productCart"]) && !empty($_SESSION["productCart"])) {
    $productsIds = array_keys($_SESSION["productCart"]);
    $productsById = findProductsByIds($db, $productsIds);
}
?>
<!-- Modal de confirmation de paiement -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title fs-5" id="exampleModalLabel">Confirmation du paiement</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Veuillez confirmer le paiement
      </div>
      <div class="modal-footer">
        <form method="post" action="monPanier.php">
            <button type="submit" class="btn btn-success" name="confirm_payment">Confirmer</button>
        </form>
      </div>
    </div>
  </div>
</div>

<section class="container position-relative mt-4">
    <h2 class="text-white bg-success p-2 mb-4">Ma commande</h2>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Article</th>
                    <th></th>
                    <th>Quantité</th>
                    <th class="text-end">Prix</th>
                    <th style="width: 80px;" class="border border-white"></th> 
                </tr>
            </thead>
            <tbody class="table table-bordered">
                <?php 
                // Affichage des paniers ajoutés au panier de session
                if (isset($basketsById)) {
                    foreach ($basketsById as $basket): ?>
                        <tr>
                            <td><img src="<?= $basket['image_path']; ?>" alt="Photo miniature du panier" width="50"></td>
                            <td><?= $basket['basket_name']?></td>
                            <td><?= $_SESSION['basketCart'][$basket['basket_id']]; ?></td>
                            <td class="text-end">
                                <?php 
                                $totalPriceBasket = round($_SESSION["basketCart"][$basket['basket_id']] * $basket['price'], 2); 
                                echo $totalPriceBasket
                                ?> €
                            </td>
                            <td class="border border-white">
                            <form method="post" action="">
                                <input type="hidden" name="delete_basket" value="<?php echo $basket['basket_id']; ?>">
                                <button class="btn btn-danger btn-sm" type="submit"><i class="bi bi-trash"></i></button>
                            </form>
                            </td>
                        </tr>
                        <?php 
                        if (!isset($totalPrice)) {
                            $totalPrice = 0;
                        }
                        $totalPrice += $totalPriceBasket;
                        ?>
                        <?php endforeach; 
                } 

                // Affichage des produits ajoutés au panier de session
                if (isset($productsById)) {
                    foreach ($productsById as $product): 
                        $productQuantity = $_SESSION["productCart"][$product['product_id']];?>
                    <tr>
                        <td><img src="<?= $product['image_path']; ?>" alt="Photo miniature du produit" width="50"></td>
                        <td><?= $product['product_name']?></td>
                        <td><?= $productQuantity ?> g</td>
                        <td class="text-end">
                            <?php 
                            $totalPriceProduct = round($productQuantity/1000 * $product['price'], 2);
                            echo $totalPriceProduct;
                            ?> €
                        </td>
                        <td class="border border-white">                        
                            <form method="post" action="">
                                <input type="hidden" name="delete_product" value="<?php echo $product['product_id']; ?>">
                                <button class="btn btn-danger btn-sm" type="submit"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php 
                    if (!isset($totalPrice)) {
                        $totalPrice = 0;
                    }
                    $totalPrice += $totalPriceProduct;
                    ?>
                    <?php endforeach;
                }
                  ?>

                <tr class="border border-white">
                    <td></td>
                    <td></td>
                    <td class="text-end fw-bold">TOTAL :</td>
                    <td class="text-end fw-bold">
                        <?php
                            if (!isset($totalPrice)) {
                                $totalPrice = 0;
                            }
                            $_SESSION["totalPrice"] = $totalPrice; 
                            echo $totalPrice 
                        ?> €
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="text-end">
        <?php
            if (isset($_SESSION['user_id'])) {
                if ((isset($_SESSION['basketCart']) && !empty($_SESSION['basketCart'])) || (isset($_SESSION['productCart']) && !empty($_SESSION['productCart']))) {
                    ?>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Valider le paiement
                    </button>
                    <?php
                } else {
                    ?>
                    <button type="button" class="btn btn-success" disabled>
                        Le panier est vide
                    </button>
                    <?php
                }
            } else {
                ?>
                <a href="connexion.php" class="btn btn-success">Connectez-vous pour payer</a>
            <?php
            }
            ?>
    </div>
</section>
<script src="modal.js"></script>
<?php 
// Inclusion du carousel des produits disponibles
include('./CarouselProduitsDispo.php');

// Inclusion du pied de page de la page
include('utilities/footer.php');
