<?php
// Inclure le fichier de configuration et la fonction de base de données
include ('./config/config.php');
include('./functions/database.fn.php');

// Obtenir une connexion PDO à partir des informations de configuration
$db = getPDOlink($config);

// Démarrer la session
session_start();

// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        // Préparer la requête SQL pour récupérer l'utilisateur à partir de l'email fourni
        $stmt = $db->prepare("SELECT `user_id`, `first_name`, `last_name`, `email`, `password`, `address`, `phone_number`, `role` FROM `users` WHERE `email` = ?");
        
        // Exécuter la requête avec le paramètre de l'email
        $stmt->execute([$email]);

        // Récupérer les données de l'utilisateur
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifier si un utilisateur correspond à l'email et si le mot de passe est correct
        if ($user && password_verify($password, $user['password'])) {
            // Si les informations sont correctes, définir les variables de session pour l'utilisateur
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['address'] = $user['address'];
            $_SESSION['phone_number'] = $user['phone_number'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['just_logged_in'] = true;
            
            // Rediriger l'utilisateur vers la page d'accueil
            if ((isset($_SESSION["basketCart"]) && !empty($_SESSION["basketCart"])) || (isset($_SESSION["productCart"]) && !empty($_SESSION["productCart"]))) {
                header("Location: monPanier.php");
                exit(); // Arrêter l'exécution du script après la redirection
            } else {
                header("Location: index.php");
                exit(); // Arrêter l'exécution du script après la redirection
            }
           

        } else {
            // Si les informations sont incorrectes, afficher un message d'erreur
            ?>
            <div class="alert alert-danger text-center" role="alert">
            Identifiants incorrects. Veuillez réessayer.
            </div>
            <?php
        }
    } catch (PDOException $e) {
        // Gérer les erreurs liées à la base de données
        echo "Erreur de base de données : " . $e->getMessage();
    }
}
