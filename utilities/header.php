<?php
// Inclusion des fichiers de configuration et de gestion de la base de données
require_once dirname(__DIR__) . ('/config/config.php');
require_once dirname(__DIR__) . ('/functions/database.fn.php');

// Connexion à la base de données
$db = getPDOlink($config);

// Démarrage de la session
session_start();
?>

<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="shortcut icon" type="image/png" href="/assets/img/autres/favicon.ico"/>
            <link rel="manifest" href="/site.webmanifest">
            <!-- Inclusion des feuilles de style Bootstrap -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <!-- Inclusion des icônes Bootstrap -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
            <!-- Inclusion du script Bootstrap -->
            <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            <!-- Inclusion de la feuille de style personnalisée -->
            <link rel="stylesheet" href="assets/style.css">
            <link rel="stylesheet" href="https://unpkg.com/orejime@latest/dist/orejime.css" />
            <script defer src="https://unpkg.com/orejime@2.2.1/dist/orejime.js"></script>
            <script defer src="cookies.js"></script>
            <title>Terroirbox - Paniers de fruits et légumes de saison</title>
            <meta name="keywords" content="Terroirbox, Paniers de fruits et légumes bio, Alimentation durable, A propos de TerroirBox, Connexion/Inscription, Mon Compte, Déconnexion, Paniers de fruits et légumes de saison, Commander en ligne vos fruits et légumes bio, Pour une alimentation durable" />
        </head>
        <body>
            <div id="orejime"></div>
            <!-- Barre de navigation -->
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php"><img src="assets/img/autres/logo.jpg" class="rounded-circle" alt="Le logo de terroirbox"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav m-auto">
                            <!-- Liens de navigation -->
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="index.php">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="paniers.php">Paniers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Apropos.php">A propos</a>
                            </li>
                            <?php if(isset($_SESSION['user_id']) && $_SESSION['role'] === 'admin') : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="admin/adminIndex.php">Espace Admin</a>
                                </li>
                            <?php endif;
                            if(isset($_SESSION['user_id'])) : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="monCompte.php">Mon Compte</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="deconnexion.php">Déconnexion</a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="connexion.php">Connexion/Inscription</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <!-- Icône du panier -->
                        <div class="d-flex">
                            <a href="monPanier.php"><i class="bi bi-bag-heart p-2 text-dark" style="font-size: 1.8rem;"></i></a>
                        </div>
                    </div>
                </div>
            </nav>
            <?php
            // Message de bienvenue après connexion
            if (isset($_SESSION['just_logged_in']) && $_SESSION['just_logged_in']) {
                $message = "Bonjour " . $_SESSION['first_name'] . " ! Ravi de vous revoir !";
                echo "<div class='alert alert-success text-center' role='alert'>$message</div>";
                $_SESSION['just_logged_in'] = false;
            }
            ?>
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="assets/img/slides/slider1.jpg" class="d-block w-100" alt="Paniers de fruits et légumes de saison">
                        <div class="carousel-caption d-none d-lg-block position-absolute top-50 start-50 translate-middle">
                            <h1 class="w-50 rounded bg-dark mx-auto mb-2" style="opacity: 0.8; font-size: 3vw;">TerroirBox</h1>
                            <p class="w-100 rounded bg-dark mx-auto mb-2" style="opacity: 0.8; font-size: 2.4vw;">Paniers de fruits et légumes de saison</p>
                            <p class="w-75 rounded bg-dark mx-auto mb-2" style="opacity: 0.8; font-size: 1.5vw;">Le plaisir bio, livré à votre porte.</p>
                            <a class="btn btn-sm btn-success" href="paniers.php">Voir les paniers</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/slides/slider2.jpg" class="d-block w-100" alt="Une femme tient un telephone de la main gauche et un poivron se trouvantdans un panier de legumes dans la main droite">
                        <div class="carousel-caption d-none d-lg-block position-absolute top-50 start-50 translate-middle">
                            <h1 class="w-50 rounded bg-dark mx-auto mb-2" style="opacity: 0.8; font-size: 3vw;">TerroirBox</h1>
                            <p class="w-100 rounded bg-dark mx-auto mb-2" style="opacity: 0.8; font-size: 2.4vw;">Commander en ligne vos fruits et légumes bio</p>
                            <p class="w-75 rounded bg-dark mx-auto mb-2" style="opacity: 0.8; font-size: 1.5vw;">Facilement depuis votre smartphone</p>
                            <a class="btn btn-sm btn-success" href="connexion.php">Inscription</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/slides/slider3.jpg" class="d-block w-100" alt="Un agriculteur accroupi tient un legume dans la main droite et un panier de legumes dans la main gauche">
                        <div class="carousel-caption d-none d-md-block position-absolute top-50 start-50 translate-middle">
                            <h1 class="w-50 rounded bg-dark mx-auto mb-2" style="opacity: 0.8; font-size: 3vw;">TerroirBox</h1>
                            <p class="w-100 rounded bg-dark mx-auto mb-2" style="opacity: 0.8; font-size: 2.4vw;">Pour une alimentation durable</p>
                            <p class="w-75 rounded bg-dark mx-auto mb-2" style="opacity: 0.8; font-size: 1.5vw">Mangeons éco-responsable.</p>
                            <a class="btn btn-sm btn-success" href="Apropos.php">A propos de nous</a>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
         </div>



