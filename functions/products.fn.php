<?php
// Fonction pour trouver les produits disponibles
function findAvailableProducts($db, $min_quantity) {
    $sql = "SELECT p.product_id AS id, p.product_name AS `name`, p.image_path AS `path`, p.description AS `description`, p.price AS price 
    FROM products p 
    WHERE p.available_quantity > $min_quantity;";
    $requete = $db->query($sql);
    $products_available = $requete->fetchAll();
    return $products_available;
}

// Fonction pour trouver tous les produits
function findAllProducts($db) {
    $sql = "SELECT * FROM `products`;";
    $requete = $db->query($sql);
    $products = $requete->fetchAll();
    return $products;
}

// Fonction pour trouver tous les paniers
function findAllBaskets($db) {
    $sql = "SELECT * FROM `baskets`;";
    $requete = $db->query($sql);
    $baskets = $requete->fetchAll();
    return $baskets;
}

// Fonction pour trouver tous les avis
function findAllReviews($db) {
    $sql = "SELECT `review_id`, `content`, `rating`, `review_date`, `first_name`  FROM `reviews` JOIN users ON users.user_id = reviews.user_id;";
    $requete = $db->query($sql);
    $reviews = $requete->fetchAll();
    return $reviews;
}

// Fonction pour trouver un panier par ID
function findBasketById($db, $current_id) {
    $sql = "SELECT * FROM `baskets` WHERE basket_id = $current_id;";
    $requete = $db->query($sql);
    $basket = $requete->fetch();
    return $basket;
}

// Fonction pour trouver un produit par ID
function findProductById($db, $current_id) {
    $sql = "SELECT * FROM `products` WHERE product_id = $current_id;";
    $requete = $db->query($sql);
    $product = $requete->fetch();
    return $product;
}

// Fonction pour trouver des paniers par IDs
function findBasketsByIds($db, $basket_ids) {
    if (empty($basket_ids)) {
        return [];
    }

    $basket_ids_str = implode(',', $basket_ids);

    $sql = "SELECT * FROM `baskets` WHERE basket_id IN ($basket_ids_str)";

    $requete = $db->query($sql);

    $baskets = $requete->fetchAll();

    return $baskets;
}

// Fonction pour trouver des produits par IDs
function findProductsByIds($db, $product_ids) {
    if (empty($product_ids)) {
        return [];
    }

    $product_ids_str = implode(',', $product_ids);

    $sql = "SELECT * FROM `products` WHERE product_id IN ($product_ids_str)";

    $requete = $db->query($sql);

    $products = $requete->fetchAll();

    return $products;
}

// Fonction pour trouver tous les produits d'un panier
function findAllBasketProducts($db, $currentId) {
    $sql = "SELECT bp.*, p.product_name, p.image_path, p.description FROM `baskets_products` bp JOIN products p ON bp.product_id = p.product_id WHERE bp.basket_id = $currentId;";
    $requete = $db->query($sql);
    $products = $requete->fetchAll();
    return $products;
}

// Fonction pour afficher les étoiles en fonction de la note
function getStar($rating) {
    $starRating = round(($rating));
    $note = ($starRating/2);
    $starSplit = explode('.',$note);
    $starNum = 0;
    
    for ($i=0; $i<$starSplit[0] ; $i++) { 
        echo '<i class="bi bi-star-fill text-warning"></i>';
        $starNum++;
    }
    
    if (isset($starSplit[1])) {
        echo '<i class="bi bi-star-half text-warning"></i>';
        $starNum++;
    }
    
    for ($i=0; $i < (5-$starNum) ; $i++) { 
        echo '<i class="bi bi-star text-warning"></i>';
        $starNum++;
    }
}

// Fonction pour vérifier si une adresse e-mail existe déjà dans la base de données
function isEmailExists($db, $email) {
    try {
        $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;
    } catch (Exception $e) {
        error_log("Erreur lors de la vérification de l'existence de l'adresse e-mail : " . $e->getMessage());
        return false;
    }
}

// Fonction pour enregistrer un nouvel utilisateur
function registerUser($db, $firstName, $lastName, $email, $hashedPassword, $address, $phone_number, $registration_date) {
    try {
        if (isEmailExists($db, $email)) {
            return false;
        }

        $stmt = $db->prepare("INSERT INTO users (first_name, last_name, email, password, address, phone_number, registration_date) VALUES (:firstName, :lastName, :email, :hashedPassword, :address, :phone_number, :registration_date)");

        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':hashedPassword', $hashedPassword);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':phone_number', $phone_number);
        $stmt->bindParam(':registration_date', $registration_date);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        error_log("Erreur lors de l'enregistrement de l'utilisateur : " . $e->getMessage());
        return false;
    }
}

// Fonction pour ajouter une commande
function addOrder($db, $user_id, $order_date, $total_price) {
    try {
        $db->beginTransaction();
        $sql = "INSERT INTO `orders`(`user_id`, `order_date`, `total_price`) 
        VALUES (:user_id, :order_date, :total_price)";
        $stmt = $db->prepare($sql);
        
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':order_date', $order_date);
        $stmt->bindParam(':total_price', $total_price);
        
        $stmt->execute();

        $order_id = $db->lastInsertId();

        if (isset($_SESSION['productCart']) && !empty($_SESSION['productCart'])) {
            foreach ($_SESSION['productCart'] as $product_id => $quantity) {
                $sql = "INSERT INTO ordered_products (order_id, product_id, quantity) 
                VALUES (:order_id, :product_id, :quantity)";
                $stmt = $db->prepare($sql);

                $stmt->bindParam(':order_id', $order_id);
                $stmt->bindParam(':product_id', $product_id);
                $stmt->bindParam(':quantity', $quantity);
                $stmt->execute();

                $sql = "UPDATE products SET available_quantity = available_quantity - :quantity 
                WHERE product_id = :product_id";
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':product_id', $product_id);
                $quantity = $quantity;
                $stmt->bindParam(':quantity', $quantity);
                $stmt->execute();
            }
        }

        if (isset($_SESSION['basketCart']) && !empty($_SESSION['basketCart'])) {
            foreach ($_SESSION['basketCart'] as $basket_id => $quantity) {
                $sql = "INSERT INTO ordered_baskets (order_id, basket_id, quantity) 
                VALUES (:order_id, :basket_id, :quantity)";
                $stmt = $db->prepare($sql);

                $stmt->bindParam(':order_id', $order_id);
                $stmt->bindParam(':basket_id', $basket_id);
                $stmt->bindParam(':quantity', $quantity);
                $stmt->execute();

                $sql = "SELECT product_id, quantity 
                FROM baskets_products 
                WHERE basket_id = :basket_id";
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':basket_id', $basket_id);
                $stmt->execute();
                $products_in_basket = $stmt->fetchAll();
                
                foreach ($products_in_basket as $product) {
                    $sql = "UPDATE products 
                    SET available_quantity = available_quantity - :quantity 
                    WHERE product_id = :product_id";
                    $stmt = $db->prepare($sql);
                    $stmt->bindParam(':product_id', $product['product_id']);
                    $quantityToUpdate = $product['quantity'] * $quantity;
                    $stmt->bindParam(':quantity', $quantityToUpdate);

                    $stmt->execute();
                }
            }
        }
        $db->commit();

    } catch (PDOException $e) {
        $db->rollback();
        echo "erreur : " . $e->getMessage();
    }
}

// Fonction pour trouver les commandes par ID utilisateur
function findOrdersbyUserId($db, $currentId) {
    $sql = "SELECT o.order_id, o.order_date, s.name AS status, o.total_price
    FROM orders o
    JOIN status s ON o.status_id = s.id
    JOIN users u ON o.user_id = u.user_id
    WHERE o.user_id = $currentId;
    ";
    $requete = $db->query($sql);
    $orders = $requete->fetchAll();
    return $orders;
}

// Fonction pour vérifier la disponibilité du stock
function checkStockAvailability($db, $cart) {
    foreach ($cart as $item_id => $quantity) {
        $sql = "SELECT available_quantity FROM products WHERE product_id = :product_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':product_id', $item_id);
        $stmt->execute();
        $result = $stmt->fetch();
        
        if (!$result || $result['available_quantity'] < $quantity) {
            return false;
        }
    }
    return true; 
}

// Fonction pour trouver toutes les quantités de produits dans un panier
function findAllBasketProductsQuantity($db, $basket_id) {
    // Préparation de la requête SQL avec un paramètre lié
    $sql = "SELECT bp.*
            FROM `baskets_products` bp 
            WHERE basket_id = :basket_id"; 
    // Préparation de la requête
    $requete = $db->prepare($sql);
    // Liaison du paramètre basket_id
    $requete->bindParam(':basket_id', $basket_id, PDO::PARAM_INT);
    // Exécution de la requête
    $requete->execute(); 
    // Récupération des résultats
    $products = $requete->fetchAll(); 
    return $products;
}
