<?php
// Fonction pour récupérer tous les utilisateurs de la base de données
function findAllUsers($db) {
    $sql = "SELECT * FROM `users`";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll();
    return $users;
}

function SortUsersBy($db, $choice) {
    $sql = "SELECT u.user_id, u.first_name, u.last_name, u.email, u.registration_date
    FROM users u
    ORDER BY $choice;";
    $requete = $db->query($sql);
    $users = $requete->fetchAll();
    return $users;
}

// Fonction pour trouver un utilisateur par son identifiant
function findUserById($db, $user_id) {
    $sql = "SELECT * FROM `users` WHERE user_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();
    return $user;
}

// Fonction pour supprimer un utilisateur par son identifiant
function deleteUser($db, $userId) {
    $sql = "DELETE FROM users WHERE user_id = :user_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user_id', $userId);
    $stmt->execute();
}

// Fonction pour mettre à jour les informations d'un utilisateur
function updateUser($db, $userId, $differences) {
    $sql = "UPDATE users SET ";
    $updates = [];
    foreach ($differences as $key => $value) {
        $updates[] = "$key = :$key";
    }
    $sql .= implode(", ", $updates);
    $sql .= " WHERE user_id = :userId";
    $stmt = $db->prepare($sql);
    foreach ($differences as $key => $value) {
        $stmt->bindValue(":$key", $value);
    }
    $stmt->bindValue(":userId", $userId);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo "Les données de la table users ont été mises à jour avec succès. ";
    } else {
        echo "Une erreur s'est produite lors de la mise à jour des données. ";
    }
}

// Fonction pour récupérer tous les commandes avec les informations détaillées
function findAllOrders($db) {
    $sql = "SELECT o.order_id, o.order_date, s.name AS status, o.total_price, u.email
            FROM orders o
            JOIN status s ON o.status_id = s.id
            JOIN users u ON o.user_id = u.user_id";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $orders = $stmt->fetchAll();
    return $orders;
}

// Fonction pour trouver une commande par son identifiant
function findOrderById($db, $currentId) {
    $sql = "SELECT order_id, order_date, status_id, s.name AS status, total_price, email
            FROM orders 
            JOIN status s ON orders.status_id = s.id
            JOIN users ON orders.user_id = users.user_id
            WHERE order_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$currentId]);
    $order = $stmt->fetch();
    return $order;
}

// Fonction pour récupérer toutes les commandes d'un utilisateur par son identifiant
function findOrdersbyUserId($db, $currentId) {
    $sql = "SELECT o.order_id, o.order_date, s.name AS status, o.total_price, u.email, op.quantity, ob.quantity, p.product_name, p.price, b.basket_name, b.price
            FROM orders o
            JOIN status s ON o.status_id = s.id
            JOIN users u ON o.user_id = u.user_id
            JOIN ordered_products op ON o.order_id = op.order_id
            JOIN products p ON op.product_id = p.product_id
            JOIN ordered_baskets ob ON o.order_id = ob.order_id
            JOIN baskets b ON ob.basket_id = b.basket_id
            WHERE o.user_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$currentId]);
    $orders = $stmt->fetchAll();
    return $orders;
}

// Fonction pour mettre à jour le statut d'une commande
function updateOrderStatus($db, $order_id, $status_id) {
    $sql = "UPDATE `orders` SET `status_id` = $status_id WHERE `order_id` = $order_id;";
    $stmt = $db->query($sql);  
}

// Fonction pour trier les produits par un critère spécifique
function SortOrdersBy($db, $choice) {
    $sql = "SELECT o.order_id, o.order_date, s.name AS status, o.total_price, u.email
    FROM orders o
    JOIN status s ON o.status_id = s.id
    JOIN users u ON o.user_id = u.user_id 
    ORDER BY $choice;";
    $requete = $db->query($sql);
    $orders = $requete->fetchAll();
    return $orders;
}

// Fonction pour trier les produits par un critère spécifique
function SortProductsBy($db, $choice) {
    $sql = "SELECT * FROM `products` ORDER BY $choice;";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll();
    return $products;
}

// Fonction pour récupérer tous les produits
function findAllProducts($db) {
    $sql = "SELECT * FROM `products`";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll();
    return $products;
}

// Fonction pour trouver un produit par son identifiant
function findProductById($db, $current_id) {
    $sql = "SELECT * FROM `products` WHERE product_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$current_id]);
    $product = $stmt->fetch();
    return $product;
}

// Fonction pour récupérer tous les produits disponibles sauf ceux spécifiés dans un panier
function findAvailableProducts($db) {
    $sql = "SELECT p.product_id AS id, p.product_name AS `name`, p.image_path AS `path`, p.description AS `description`, p.price AS price, p.available_quantity AS quantity
    FROM products p 
    WHERE p.available_quantity > 0";
    $requete = $db->query($sql);
    $products = $requete->fetchAll();
    return $products;
}

// Fonction pour récupérer tous les produits disponibles sauf ceux spécifiés dans un panier
function findAvailableProductsExcept($db, $productIdsInBasket) {
    $excludedIds = implode(",", $productIdsInBasket);
    $sql = "SELECT p.product_id AS id, p.product_name AS `name`, p.image_path AS `path`, p.description AS `description`, p.price AS price, p.available_quantity AS quantity 
            FROM products p 
            WHERE p.available_quantity > 100 
            AND p.product_id NOT IN ($excludedIds)";
    $requete = $db->query($sql);
    $products_available = $requete->fetchAll();
    return $products_available;
}

// Fonction pour récupérer les produits associés à une commande par son identifiant
function findProductsByOrderId($db, $currentId) {
    $sql = "SELECT op.quantity, product_name, price
            FROM ordered_products op
            JOIN products p ON op.product_id = p.product_id
            WHERE op.order_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$currentId]);
    $products = $stmt->fetchAll();
    return $products;
}

// Fonction pour ajouter un produit à la base de données
function addProduct($db, $productName, $price, $quantity, $description, $imagePath, $category_id) {
    $sql = "INSERT INTO products (product_name, description, price, category_id, image_path, available_quantity)
            VALUES (:productName, :description, :price, :category_id, :imagePath, :quantity)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':productName', $productName);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':category_id', $category_id);   
    $stmt->bindParam(':imagePath', $imagePath);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->execute();
}

// Fonction pour supprimer un produit par son identifiant
function deleteProduct($db, $productId) {
    $sql = "DELETE FROM products WHERE product_id = :product_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':product_id', $productId);
    $stmt->execute();
}

// Fonction pour mettre à jour les informations d'un produit
function updateProduct($db, $productId, $differences) {
    $sql = "UPDATE products SET ";
    $updates = [];
    foreach ($differences as $key => $value) {
        $updates[] = "$key = :$key";
    }
    $sql .= implode(", ", $updates);
    $sql .= " WHERE product_id = :productId";
    $stmt = $db->prepare($sql);
    foreach ($differences as $key => $value) {
        $stmt->bindValue(":$key", $value);
    }
    $stmt->bindValue(":productId", $productId);
    $stmt->execute();
}

// Fonction pour trouver tous les paniers
function findAllBaskets($db) {
    $sql = "SELECT * FROM `baskets`;";
    $requete = $db->query($sql);
    $baskets = $requete->fetchAll();
    return $baskets;
}

// Fonction pour trouver un panier par son identifiant
function findBasketById($db, $current_id) {
    $sql = "SELECT * FROM `baskets` WHERE basket_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$current_id]);
    $basket = $stmt->fetch();
    return $basket;
}

// Fonction pour mettre à jour les informations d'un panier
function UpdateBasket($db, $basket_id, $basket_name, $description, $price, $image_path) {
    $sql = "UPDATE `baskets` 
    SET `basket_name` = :basket_name, `description` = :description, `price` = :price, `image_path` = :image_path 
    WHERE `basket_id` = :basket_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':basket_id', $basket_id);
    $stmt->bindParam(':basket_name', $basket_name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':image_path', $image_path);
    $stmt->execute();
}

// Fonction pour récupérer les paniers associés à une commande par son identifiant
function findBasketsByOrderId($db, $currentId) {
    $sql = "SELECT ob.quantity, basket_name, price
            FROM ordered_baskets ob
            JOIN baskets b ON ob.basket_id = b.basket_id
            WHERE ob.order_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$currentId]);
    $baskets = $stmt->fetchAll();
    return $baskets;
}

// Fonction pour récupérer tous les produits d'un panier par son identifiant
function findAllBasketProducts($db, $currentId) {
    $sql = "SELECT bp.*, p.product_name FROM `baskets_products` bp 
    JOIN products p ON bp.product_id = p.product_id 
    WHERE bp.basket_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$currentId]);
    $products = $stmt->fetchAll();
    return $products;
}

// Fonction pour supprimer un produit d'un panier
function deleteBasketProduct($db, $basketId, $productId) {
    $sql = "DELETE FROM `baskets_products` WHERE `basket_id` = :basket_id AND `product_id` = :product_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':basket_id', $basketId);
    $stmt->bindParam(':product_id', $productId);
    $stmt->execute();
}

// Fonction pour ajouter des produits à un panier
function addBasketProducts($db, $productId, $quantity, $basketId) {
    $sql = "INSERT INTO baskets_products (basket_id, product_id, quantity)
            VALUES (:basketId, :productId, :quantity)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':productId', $productId);
    $stmt->bindParam(':basketId', $basketId);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->execute();
}

function getTotalOrdersByDate($db, $startOf, $endOf) {
    // Requête pour obtenir le nombre total de commandes cette semaine
    $sql = "SELECT COUNT(*) AS total_orders
            FROM orders
            WHERE order_date BETWEEN ? AND ?";
            
    $stmt = $db->prepare($sql);
    $stmt->execute([$startOf, $endOf]);
    $result = $stmt->fetch();

    return $result['total_orders'];
}

// Fonction pour récupérer le total des ventes cette semaine
function getTotalSalesByDate($db, $startOf, $endOf) {
    // Requête pour obtenir le total des ventes cette semaine
    $sql = "SELECT SUM(total_price) AS total_sales
            FROM orders
            WHERE order_date BETWEEN ? AND ?";
            
    $stmt = $db->prepare($sql);
    $stmt->execute([$startOf, $endOf]);
    $result = $stmt->fetch();

    return $result['total_sales'];
}

// Fonction pour récupérer les paniers les plus vendus cette semaine
function findMostPopularBasketsByDate($db, $startOf, $endOf) {
        // Requête pour récupérer les paniers les plus achetés cette semaine
        $sql = "SELECT ob.basket_id, b.basket_name, COUNT(*) as total_sold
                FROM ordered_baskets ob
                JOIN orders o ON ob.order_id = o.order_id
                JOIN baskets b ON ob.basket_id = b.basket_id
                WHERE o.order_date BETWEEN ? AND ?
                GROUP BY ob.basket_id
                ORDER BY total_sold DESC
                LIMIT 6";
    
        $stmt = $db->prepare($sql);
        $stmt->execute([$startOf, $endOf]);
        $popularBaskets = $stmt->fetchAll();
    
        return $popularBaskets;
}

// Fonction pour récupérer les produits les plus vendus cette semaine
function findMostPopularProductsByDate($db, $startOf, $endOf) {
    // Requête pour récupérer les produits les plus achetés cette semaine
    $sql = "SELECT p.product_id, p.product_name, SUM(op.quantity) AS total_sold
            FROM ordered_products op
            JOIN orders o ON op.order_id = o.order_id
            JOIN products p ON op.product_id = p.product_id
            WHERE o.order_date BETWEEN ? AND ?
            GROUP BY p.product_id
            UNION
            SELECT p.product_id, p.product_name, SUM(bp.quantity) AS total_sold
            FROM baskets_products bp
            JOIN baskets b ON bp.basket_id = b.basket_id
            JOIN products p ON bp.product_id = p.product_id
            JOIN ordered_baskets ob ON bp.basket_id = ob.basket_id
            JOIN orders o ON ob.order_id = o.order_id
            WHERE o.order_date BETWEEN ? AND ?
            GROUP BY p.product_id
            ORDER BY total_sold DESC
            LIMIT 6";

    $stmt = $db->prepare($sql);
    $stmt->execute([$startOf, $endOf, $startOf, $endOf]);
    $popularProducts = $stmt->fetchAll();

    return $popularProducts;
}

function findNewUsersByDate($db, $startOf, $endOf) {
    // Requête pour récupérer les nouveaux utilisateurs pour la période spécifiée
    $sql = "SELECT COUNT(*) AS new_users
            FROM users
            WHERE registration_date BETWEEN ? AND ?";
            
    $stmt = $db->prepare($sql);
    $stmt->execute([$startOf, $endOf]);
    $result = $stmt->fetch();

    return $result['new_users'];
}

function findBestUsersByDate($db, $startOf, $endOf) {
    // Requête pour trouver les 5 clients ayant le plus dépensé pendant la période spécifiée
    $sql = "SELECT u.user_id, u.email, SUM(o.total_price) AS total_spent
            FROM orders o
            JOIN users u ON o.user_id = u.user_id
            WHERE o.order_date BETWEEN ? AND ?
            GROUP BY u.user_id
            ORDER BY total_spent DESC
            LIMIT 5";
            
    $stmt = $db->prepare($sql);
    $stmt->execute([$startOf, $endOf]);
    $bestUsers = $stmt->fetchAll();

    return $bestUsers;
}
