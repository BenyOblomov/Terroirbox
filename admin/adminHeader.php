<?php
// Démarrage de la session
session_start();

// Vérification de l'authentification de l'utilisateur et de son rôle
if(!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    // Redirection vers la page de connexion si l'utilisateur n'est pas authentifié ou n'a pas le rôle d'administrateur
    header("Location: ../connexion.php");
    exit; 
}

// Inclusion du fichier de configuration et des fonctions de base de données
include dirname(__DIR__) . ('/config/config.php'); 
include dirname(__DIR__) . ('/functions/database.fn.php'); 

// Connexion à la base de données
$db = getPDOlink($config);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name=”robots” content=”noindex,nofollow”>
    <title>Terroirbox Administration</title>
    <!-- Inclusion du CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Inclusion des icônes Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <!-- Barre de navigation -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="adminIndex.php">TerroirBox</a>
        <!-- Bouton de bascule pour le menu déroulant -->
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <i class="bi bi-list"></i>
        </button>
    </nav>

    <!-- Menu déroulant (offcanvas) pour la navigation -->
    <div class="offcanvas offcanvas-start " tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">TerroirBox</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <!-- Liste des liens de navigation -->
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="adminIndex.php">Page d'accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminProducts.php">Gestion des Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminBaskets.php">Gestion des Paniers de la semaine</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminOrders.php">Gestion des Commandes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminUsers.php">Gestion des comptes utilisateurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Retour à l'Accueil du site</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../deconnexion.php">Se déconnecter</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Contenu principal -->
    <main>
