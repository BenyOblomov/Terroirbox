<center>

# Terroirbox

</center>

<center>

![haut de la page index du site](/assets/img/imgREADME/image.png)

</center>
  

## I) Naissance du projet Terroirbox  

### 1) Résumé en français

J'ai créé un site web complet dédié à la vente de paniers de fruits et légumes, en mettant en pratique mes compétences en développement web acquises pendant ma formation. Pour le front-end, j'ai utilisé Bootstrap pour sa simplicité et sa capacité à créer des interfaces réactives, tout en intégrant du JavaScript pour des fonctionnalités avancées telles qu'un slider améliorant l'expérience utilisateur.

La gestion des données repose sur une base de données MySQL, permettant la gestion des stocks, l'enregistrement des utilisateurs et de leurs commandes. J'ai également développé un tableau de bord administrateur complet, offrant des fonctionnalités CRUD pour une gestion efficace des paniers, des produits, des comptes et des commandes.

J'ai mis en place un système de gestion des fichiers permettant de modifier ou de supprimer les images associées aux produits. De plus, j'ai intégré une API de recettes pour proposer des suggestions basées sur les produits sélectionnés.

Le déploiement sur Hostinger a permis une mise en ligne rapide et efficace du site, permettant de conclure un projet sur lequel j’ai pu exprimer mes compétences acquises au cours de la formation. Ce projet abouti, pensé et travaillé comme un site web complet, répond aux besoins d’une AMAP dans la vente de fruits et légumes.

<center>

![Une caisse de fuits et de légumes](/assets/img/imgREADME/image-1.png)

</center>

### 2) Résumé en anglais

I have created a complete website dedicated to selling fruit and vegetable baskets, applying the web development skills I acquired during my training. For the front-end, I used Bootstrap for its simplicity and ability to create responsive interfaces, while integrating JavaScript for advanced features such as a slider to enhance the user experience.

The data management relies on a MySQL database, allowing for stock management, user registration, and order tracking. I also developed a comprehensive admin dashboard, offering CRUD functionalities for efficient management of baskets, products, accounts, and orders.

I implemented a file management system to modify or delete images associated with products. Additionally, I integrated a recipe API to offer suggestions based on the products available in the baskets.

Deploying on Hostinger enabled a quick and efficient launch of the site, allowing me to complete a project where I could showcase the skills acquired during my training. This well-thought-out and fully developed project meets the needs of an AMAP for selling fruits and vegetables.

<center>

![Une caisse de légumes](/assets/img/imgREADME/image-2.png)

</center>
  
### 3) Objectif du projet

Le projet consiste en la création d'une application web dédiée à une Association pour le Maintien d'une Agriculture Paysanne (AMAP). L'objectif est de fournir une plateforme en ligne permettant aux membres de l'AMAP de visualiser, de commander et de gérer des paniers de fruits et légumes. 
Comme il s'agissait d'un projet personnel, l'objectif pédagogique était de mettre en pratique le plus grand nombre possible de connaissances acquises pendant la formation, tout en répondant aux exigences spécifiques du site.

  
### 4) Compétences attestées

Développer la partie front-end d'une application web ou web mobile sécurisée

•	Installer et configurer son environnement de travail en fonction du projet web ou web mobile
•	Maquetter des interfaces utilisateur web ou web mobile
•	Réaliser des interfaces utilisateur statiques web ou web mobile
•	Développer la partie dynamique des interfaces utilisateur web ou web mobile

Développer la partie back-end d'une application web ou web mobile sécurisée

•	Mettre en place une base de données relationnelle
•	Développer des composants d'accès aux données SQL et NoSQL
•	Développer des composants métier coté serveur
•	Documenter le déploiement d'une application dynamique web ou web mobile

  
### 5) Technologies utilisées :

•	Draw.io pour la création du wireframe

•	Front-end : Framework Bootstrap pour la conception de l'interface utilisateur, JavaScript pour l'interaction dynamique

•	Back-end : PHP, MySQL

•	Utilisation de WAMP pour le développement local



<center>

![les icones des technologies utilisées](/assets/img/imgREADME/image-3.png)

</center>

  
## II) Conceptualisation du projet

Maquettage des interfaces utilisateur
Pour répondre aux objectifs du projet et aux principes de conception des interfaces web énoncés, la création du wireframe a été basée sur la simplicité, la convivialité, la réactivité, l'accessibilité, la navigation efficace, la performance et le centrage sur l'utilisateur. Voici la proposition d'organisation pour le site, en respectant ces principes :

<center>

![Le wirefrmae de la page index du site](/assets/img/imgREADME/image-4.png)

</center>

Une navbar avec un logo et les onglets des pages principales : l’accueil, le catalogue de l’offre, le détail sur l’entreprise, la page d’inscription ou de connexion et le panier d’achat.
D’autres accès vers ces pages seront possibles via un slider.
S’ajoutent 3 sections, une pour mentionner le catalogue, une autre la présentation de l’entreprise, et la troisième la page d’inscription.
Ces sections sont d’autres moyens d’accéder a ces pages.
J’ai ajouté un slider avec des avis clients et un footer contenant les mentions légales, le contact et les liens vers les réseaux sociaux.

En créant une structure à la fois simple et intuitive, en renforcant l’interconnexion via plusieurs points d’accès aux pages clés, et en ajoutant des mots-clés spécifiques à chaque section, des bases solides seront créées concernant le référencement du site (SEO).

  
## III) Intégration

Le développement du front-end de TerroirBox a été réalisé avec une attention particulière à la structure HTML, à la stylisation CSS et à l'utilisation judicieuse du framework Bootstrap. 
Chaque section a été soigneusement structurée en utilisant des balises HTML sémantiques pour définir la hiérarchie du contenu.
Bootstrap a été utilisé pour la mise en forme et la mise en page cohérente des éléments. 
Une conception responsive vient garantir une expérience utilisateur optimale, quelle que soit la taille de l'écran ou l'appareil utilisé pour accéder au site.
Ensemble, ces techniques de développement front-end ont permis de créer une page d'accueil attrayante et fonctionnelle pour TerroirBox, offrant aux utilisateurs une expérience agréable et intuitive lors de leur visite sur le site.

  
### 1) Présentation du header
   
Le header est composé de la navbar et d’un slider qui proposera 3 bannières différentes.

<center>

![visuel du header du site avec la navbar et le slider](/assets/img/imgREADME/image-5.png)

</center>

```php
<nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php"><img src="assets/img/autres/logo.jpg" class="rounded-circle" alt=""></a>
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
```

La navbar a été créé à partir d’un modèle bootstrap, auquel j’ai ajouté différents éléments afin de la personnaliser selon mes besoins.
On peut remarquer l’ajout d’une condition pour l’onglet « Espace admin », afin que celui-ci ne soit visible que si un admin est connecté.
J’ai aussi ajouté une condition pour l’onglet « Mon compte » et « Déconnexion », visible uniquement lorsqu’un utilisateur est connecté, à l’inverse de l’onglet « Connexion ».

```php
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
                            <a type="submit" class="btn btn-sm btn-success" href="connexion.php">Inscription</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/slides/slider3.jpg" class="d-block w-100" alt="Un agriculteur accroupi tient un legume dans la main droite et un panier de legumes dans la main gauche">
                        <div class="carousel-caption d-none d-md-block position-absolute top-50 start-50 translate-middle">
                            <h1 class="w-50 rounded bg-dark mx-auto mb-2" style="opacity: 0.8; font-size: 3vw;">TerroirBox</h1>
                            <p class="w-100 rounded bg-dark mx-auto mb-2" style="opacity: 0.8; font-size: 2.4vw;">Pour une alimentation durable</p>
                            <p class="w-75 rounded bg-dark mx-auto mb-2" style="opacity: 0.8; font-size: 1.5vw">Mangeons éco-responsable.</p>
                            <a type="submit" class="btn btn-sm btn-success" href="Apropos.php">A propos de nous</a>
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
```

La bannière, sous forme de slider, est composée pour chaque slide d’une image, d’un titre, de phrases d’accroche et d’un bouton vers une page principale. Le contenu de chaque slide est personnalisé selon la page vers laquelle son bouton redirigera l’utilisateur.

  
### 2) Focus sur le développement du formulaire d'inscription

```php
<!-- Formulaire d'inscription -->
<section class="container mt-4">
    <h2 class="text-center mb-3">Inscription</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" action="<?php echo ($_SERVER["PHP_SELF"]); ?>">
                <div class="mb-3">
                    <label for="firstName" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="lastName" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="email2" class="form-label">Adresse Email</label>
                    <input type="email" class="form-control" id="email2" name="email2" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="password2" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password2" name="password2" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Adresse</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="phoneNumber" class="form-label">Numéro de téléphone</label>
                    <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
                    <div class="invalid-feedback"></div>
                </div>
                <button type="submit" class="btn btn-success m-auto">S'inscrire</button>
            </form>
        </div>
    </div>
</section>
```

Celui-ci permet aux utilisateurs de renseigner leurs informations personnelles afin de pouvoir commander des paniers de fruits et légumes.
Il permet également d'accéder à leur compte via la page « Mon compte » et de consulter leurs informations personnelles ou leur historique de commandes.


Pour chaque champ, j’utilise des REGEX, des expressions régulières spécifiques au champ en question, en Javascript.
Par exemple, pour le champ « confirmPassword » :
Je stocke l’input dans une variable qu’on nomme confirmPasswordInput.

```js
    const confirmPasswordInput = document.getElementById('confirmPassword');
```

Je créé la regex correspondant : le mot de passe devra contenir au moins 8 caractères, dont au moins 1 majuscule, une minuscule, un chiffre et un caractère spécial.

```js
const confirmPasswordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
```

Je créé ensuite la fonction « validateInput » qui prendra en paramètres l’input, le regex et le message correspondant, et qui si les règles définies sont respectées ajoutera la class « is-valid » à l’input. Ce dernier sera alors entouré de vert.
A l’inverse, la class « is-invalid » surlignera les bords en rouge et affichera le message indiquant les caractères attendus.

```js
    // Fonction de validation générique
    function validateInput(input, regex, message) {
        const feedbackDiv = input.parentElement.querySelector('.invalid-feedback');
        if (regex.test(input.value)) {
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');
            feedbackDiv.textContent = '';
        } else {
            input.classList.remove('is-valid');
            input.classList.add('is-invalid');
            feedbackDiv.textContent = message;
        }
    }
```

Pour le mot de passe, j’ai créé la fonction « validatePasswordMatch » qui vérifiera que les mots de passes correspondent dans les deux champs.

```js
    // Fonction de validation de la correspondance des mots de passe
    function validatePasswordMatch() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;
        const passwordMatchDiv = confirmPasswordInput.parentElement.querySelector('.invalid-feedback');
        
        if (confirmPassword === password) {
            confirmPasswordInput.classList.remove('is-invalid');
            confirmPasswordInput.classList.add('is-valid');
            passwordMatchDiv.textContent = '';
            return true;
        } else {
            confirmPasswordInput.classList.remove('is-valid');
            confirmPasswordInput.classList.add('is-invalid');
            passwordMatchDiv.textContent = 'Les mots de passe ne correspondent pas.';
            return false;
        }
    }
```

On définit que lors du remplissage de l’input, les fonctions précédentes seront appelées.

```js
    // Événement d'entrée pour le champ confirmation de mot de passe
    confirmPasswordInput.addEventListener('input', function() {
        validateInput(confirmPasswordInput, confirmPasswordRegex, 'Les mots de passe doivent correspondre et respecter les critères de validation.');
        validatePasswordMatch();
    });
```

<center>

![Visuel du formulaire d'inscription](/assets/img/imgREADME/image-14.png)

</center>

  
### 3) Interactivité avec JavaScript

L'ajout d'interactivité et de dynamisme aux interfaces utilisateur est essentiel pour améliorer l'expérience de navigation sur TerroirBox. 
JavaScript a été utilisé pour fournir une fonctionnalité de carrousel fluide et intuitive sur la page d'accueil.
Grâce à cette fonctionnalité, les utilisateurs peuvent découvrir facilement les différents produits proposés par TerroirBox.
Avec la fonction « findAvailablePoducts », je récupère un tableau des produits disponibles.
J’utilise la boucle foreach afin de répartir les informations de chaque produit dans une card.
En utilisant notamment les class « overflow-hidden » et « flex-schrink-0 », la div contenant les cards alignées horizontalement se prolonge au-delà de la section, sans qu’elle soit visible.

```php
<!-- Section contenant les autres produits disponibles -->
<section class="container position-relative mt-4">
    <!-- Titre de la section -->
    <h2 class="text-center mb-3">Autres produits disponibles</h2>
    <!-- Conteneur avec défilement horizontal -->
    <div class="overflow-hidden">
        <!-- Carrousel des produits -->
        <div id="slider" class="d-flex w-100">
            <?php 
            // Récupération des produits disponibles depuis la base de données
            $min_quantity = 1;
            $products_available = findAvailableProducts($db, $min_quantity);
            // Boucle pour afficher chaque produit dans le carrousel
            foreach ($products_available as $value) {
            ?>
                <!-- Carte représentant un produit -->
                <div class="card m-3 flex-shrink-0" style="width: 18rem;">
                    <?php include 'utilities/productCard.php'; ?> <!-- Inclut le fichier PHP pour afficher les détails du produit -->
                </div>
            <?php
            }
            ?>
        </div>
        <!-- Boutons de navigation du carrousel -->
        <button type="button" id="prev" class="position-absolute top-50 start-0 translate-middle-y"><i class="bi bi-chevron-compact-left"></i></button>
        <button type="button" id="next" class="position-absolute top-50 end-0 translate-middle-y"><i class="bi bi-chevron-compact-right"></i></button>
    </div>
</section>

<!-- Inclusion du script JavaScript pour le carrousel -->
<script src="carouselProduitsDispo.js"></script>

```

En utilisant des gestionnaires d'événements JavaScript, les boutons "Précédent" et "Suivant" ont été programmés pour déplacer le carrousel vers la gauche ou la droite lorsque les utilisateurs cliquent dessus.

```js
// Sélection des éléments DOM nécessaires
const slider = document.getElementById("slider");
const prev = document.getElementById("prev");
const next = document.getElementById("next");

// Initialisation de la valeur de translation
let translateValue = 0;

// Largeur d'un élément dans le carrousel
const itemWidth = 320;

// Gestionnaire d'événement pour le bouton "Suivant"
next.addEventListener("click", () => {
  // Vérifie si la valeur de translation est dans les limites
  if (translateValue > -(slider.children.length - 4) * itemWidth) {
    translateValue -= itemWidth;
  } else {
    // Réinitialise la translation à zéro si la fin du carrousel est atteinte
    translateValue = 0;
  }
  // Met à jour le carrousel avec la nouvelle translation
  updateSlider();
});

// Gestionnaire d'événement pour le bouton "Précédent"
prev.addEventListener("click", () => {
  // Vérifie si la valeur de translation est dans les limites
  if (translateValue < 0) {
    translateValue += itemWidth;
  } else {
    // Déplace à la fin du carrousel si le début est atteint
    translateValue = -(slider.children.length - 4) * itemWidth;
  }
  // Met à jour le carrousel avec la nouvelle translation
  updateSlider();
});

// Fonction pour mettre à jour le carrousel avec la nouvelle translation
function updateSlider() {
  // Animation de transition pour une expérience utilisateur fluide
  slider.style.transition = "transform 0.5s ease-in-out";
  // Applique la nouvelle translation au carrousel
  slider.style.transform = `translateX(${translateValue}px)`;
}

```

<center>

![Le slider js qui montre les produits disponibles](/assets/img/imgREADME/image-17.png)

</center>

J’ai créé de nombreux éléments dont les exemples précédents sont l’illustration.
J’ai ainsi développé les pages de l’interface utilisateur : 

-La Page d'Accueil (Index), qui propose différentes portes d’entrées vers les principales pages.

-La page de Présentation de l'Offre qui expose les différents paniers disponibles à la vente, avec leurs détails et options, et l’affichage des fruits et légumes disponibles à l'achat, avec des descriptions succinctes.

-La page « A Propos de l'Entreprise » présente de façon détaillée l’AMAP, ses valeurs, sa démarche et ses sources d'approvisionnement en fruits et légumes.

-La page d'Inscription/Connexion qui contient un formulaire avec des instructions claires, et la possibilité de connexion pour les membres existants.

-La page Mon Compte affichant les informations et l’historique de commandes de l’utilisateur.

-La page Panier qui affichera les produits ajoutés au panier, avec possibilité de suppression des articles.

  
## IV) Développement back-end

### 1) La Base de données

La Base de données s’articule autour des tables « products » et « users ».
La table « products » contiendra les informations des produits à la vente. La quantité sera le stock disponible du produit. Il y a deux catégories de produits, les fruits et les légumes. 
Des paniers (baskets), regroupant plusieurs produits, pourront être créé selon le stock chaque semaine. 
La table « users » contiendra les informations des utilisateurs inscrits sur le site.
Chaque commande effectuée sera enregistrée dans la table « orders ».
Des tables intermédiaires ont été créé afin de gérer les relations many to many.

<center>

![Le schéma de la base de données](/assets/img/imgREADME/image-18.png)

</center>

  
### 2) Création du PDO

Je définis les variables d’environnement que je stcoke dans une variable.

```php
<?php
    // 1) On définit nos variables d'environnement:
    $config = array(
        'dbhost' => 'localhost', // Hôte de la base de données
        'dbname' => 'terroir_box', // Nom de la base de données
        'dbport' => '3306', // Port de la base de données (par défaut, 3306 pour MySQL)
        'dbuser' => 'root', // Nom d'utilisateur de la base de données
        'dbpass' => 'motdepasse' // Mot de passe de la base de données
    );
```

Je créé une fonction getPDOlink, qui prendra en paramètres les variables d’environnement, afin de créer le lien entre la base de données MySQL et le site web.
Pour cela, la fonction créé une instance de la class PDO (PHP Data Objects) pour accéder à la base de données de manière sécurisée.

```php
<?php
function getPDOlink($config) {
    // Construction de la chaîne de connexion DSN (Data Source Name) pour PDO
    $dsn = 'mysql:dbname=' . $config['dbname'] . ';host=' . $config['dbhost'] . ';port=' . $config['dbport'];

    try {
        // Tentative de connexion à la base de données en utilisant PDO
        $db = new PDO($dsn, $config['dbuser'], $config['dbpass']);

        // Configuration de l'encodage des caractères de la connexion à UTF-8 pour éviter les problèmes d'encodage
        $db->exec("SET NAMES utf8");

        // Définition du mode de récupération par défaut des résultats de requête à FETCH_ASSOC
        // Cela signifie que fetch() retournera un tableau associatif pour chaque ligne de résultat
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        // Retourne la connexion à la base de données nouvellement établie
        return $db;

    } catch (PDOException $e) {
        // En cas d'échec de la connexion, une exception de type PDOException est attrapée
        // Un message d'erreur est affiché, indiquant le problème rencontré lors de la connexion à la base de données
        exit('BDD Erreur de connexion : ' . $e->getMessage());
    }
}
```

  
### 3) Développement des premières fonctions contenant les requêtes

Une fois le site lié à la base de données, on va pouvoir l’alimenter avec les données.
Par exemple, je créé une fonction findAvailableProducts qui grâce à une requête SQL nous renverra un tableau avec les informations des produits disponibles (dont la quantité sera supérieur à $min_quantity)

```php
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
```

On définit à $min_quantity et on appelle la fonction findAvailableProducts

```php
        <?php 
        // Récupérer tous les produits disponibles
        $min_quantity = 1;
        $products_available = findAvailableProducts($db, $min_quantity);
        foreach ($products_available as $value) {
```

<center>

![Les produits disponibles alignés par 3](/assets/img/imgREADME/image-23.png)

</center>

  
## V) Développement du côté Admin

Le développement des pages d'administration doit permettre aux administrateurs de gérer les produits, les utilisateurs et les commandes.

La mise en place des opérations CRUD (Create, Read, Update, Delete) permet la gestion complète des données : la gestion du stock, la gestion des paniers de fruits et légumes, des comptes utilisateurs, et des commandes.

  
### 1) CREATE

Je créé la fonction addProduct qui ajoutera les différentes informations d’un produit dans la base de données. Une fonction préparée est nécessaire afin d’assurer une sécurité contre les attaques par injection SQL, en utilisant des paramètres liés pour éviter que des données malveillantes ne compromettent l’intégrité de la base de données.

```php
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
```

Je récupère les données du formulaire avec htmlspecialchars pour prévenir les attaques de type Cross-Site Scripting (XSS) via une conversion des caractères spéciaux.

```php
if (in_array($extension, $extensionsAutorisees) && $size <= $tailleMax && $error == 0) {
        // Récupération des données du formulaire avec htmlspecialchars pour éviter les failles XSS
        $category = htmlspecialchars($_POST["category"]);
        $category = intval($category);
        if ($category == 1) {
            $categoryName = "fruits";
        } else {
            $categoryName = "legumes";
        }
        $productName = htmlspecialchars($_POST["product_name"]);
        $price = htmlspecialchars($_POST["price"]);
        $quantity = htmlspecialchars($_POST["quantity"]);
        $description = htmlspecialchars($_POST["description"]);
        $imagePath = htmlspecialchars('assets/img/'.$categoryName.'/'.$name);
```

J’appelle la fonction : la requête est envoyée à la base de données et ajoute les informations à la base de données.

```php
        // Appel de la fonction pour ajouter le produit dans la base de données
        addProduct($db, $productName, $price, $quantity, $description, $imagePath, $category);
```

<center>

![Le formulaire d'ajout de fruit](/assets/img/imgREADME/image-27.png)

</center>

  
### 2) READ
   
La fonction findProductsByOrderId permet de récupérer les produits associés à une commande en utilisant son identifiant. En interrogeant la base de données, elle sélectionne les produits commandés avec leur quantité respective, leur nom et leur prix.

J’appelle la fonction :

```php
$products = findProductsByOrderId($db, $_GET['id']);
```

<center>

![Le détail d'une commande](/assets/img/imgREADME/image-29.png)

</center>

  
### 3) UPDATE

La fonction UpdateUser : à l’aide d’une concaténation et d’une boucle foreach, on définit les informations à modifier.

```php
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
```

On compare les données issues de la BDD avec les données du formulaire, afin d’obtenir un tableau contenant les différences.

```php
// Vérification de la soumission du formulaire de modification de profil utilisateur
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Création d'un tableau contenant les données soumises par le formulaire
    $donneesSoumises = array(
        'first_name' => htmlspecialchars($_POST['first_name']),
        'last_name' => htmlspecialchars($_POST['last_name']),
        'role' => htmlspecialchars($_POST['role']),
        'email' => htmlspecialchars($_POST['email']),
        'address' => htmlspecialchars($_POST['address']),
        'phone_number' => htmlspecialchars($_POST['phone_number']),
        'registration_date' => htmlspecialchars($_POST['registration_date'])
    );
    
    // Création d'un tableau contenant les données actuelles de l'utilisateur
    $donneesActuelles = array(
        'first_name' => $user['first_name'],
        'last_name' => $user['last_name'],
        'role' => $user['role'],
        'email' => $user['email'],
        'address' => $user['address'],
        'phone_number' => $user['phone_number'],
        'registration_date' => $user['registration_date']
    );

    // Comparaison des données soumises avec les données actuelles pour détecter les modifications
    $differences = array_diff_assoc($donneesSoumises, $donneesActuelles);
    
    // Vérification s'il y a des modifications
    if (!empty($differences)) {
        // Mise à jour des informations de l'utilisateur dans la base de données
        $update = updateUser($db, $userId, $differences);
        
        // Redirection vers la page d'administration des utilisateurs après la mise à jour
        header("Location: adminUsers.php");
        exit;
    }
}
```

<center>

![Le formulaire de modification de profil](/assets/img/imgREADME/image-32.png)

</center>

  
### 4) DELETE

   
Cette fonction deleteProduct permet de supprimer un produit spécifique en fonction de son identifiant. En recevant en entrée l'identifiant du produit à supprimer et en se connectant à la base de données, la fonction exécute une requête SQL DELETE pour retirer le produit correspondant de la table des produits. En utilisant des paramètres liés pour l'identifiant du produit, la fonction offre une protection contre les attaques par injection SQL.

```php
// Fonction pour supprimer un produit par son identifiant
function deleteProduct($db, $productId) {
    $sql = "DELETE FROM products WHERE product_id = :product_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':product_id', $productId);
    $stmt->execute();
}

```

<center>

![Un modal s'affiche pour nous demander de confirmer la suppression de l'article](/assets/img/imgREADME/image-34.png)

</center>

  
## VI) Autres fonctionnalités

### 1) Le panier d’achat

La fonction addOrder ajoute une commande à la BDD. 
Dans un premier temps elle initie une transaction pour garantir l’intégrité des données. Elle insère les détails de la commande dans la table orders, en utilisant des paramètres liés pour sécuriser les entrées. L’ID de la commande créée est récupéré.


Elle vérifie alors s’il y a des produits dans le panier de l’utilisateur. Pour chaque produit, elle insère une entrée dans ordered_products et met à jour la quantité disponible dans la table products.
Elle fait de même pour les paniers de produits.

```php
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
```

Je vérifie les stocks disponibles et affiche un message d'erreur si les stocks sont insuffisants. Si le paiement est confirmé, j’ajoute la commande à la base de données, envoie un courriel de confirmation et vide le panier de l'utilisateur.

```php

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
```

<center>

![Une banniere rouge nous indique au-dessus du panier d'achat que certains produits ne sont pas en stock](/assets/img/imgREADME/image-40.png)

</center>

  
### 2) La gestion des fichiers

Ce code gère la modification d'un produit dans ma base de données. Lorsque je soumets le formulaire, il vérifie si j'ai téléchargé une nouvelle image et valide son extension et sa taille. En fonction de la catégorie (fruits ou légumes), il détermine le chemin de stockage.

Il compare ensuite les nouvelles données avec les actuelles pour détecter des modifications. Si l'image est valide et différente, il supprime l'ancienne image et déplace la nouvelle au bon emplacement. Si les données ont changé, il met à jour le 
produit dans la base de données. Pour que l’image soit valide, l’extension du fichier et sa taille sont contrôlés. De plus en évitant l’enregistrement des images dans la base de données au format BLOB, on évite de s’exposer aux failles de type steghide.

Ce code assure la sécurité en validant les fichiers, maintient l'intégrité des données et optimise la gestion des fichiers en supprimant les anciennes images inutiles. Cela garantit une mise à jour cohérente et sécurisée des produits.

```php
// Récupération de l'identifiant du produit à modifier depuis l'URL
$productId = $_GET['id'];
// Récupération des informations du produit à modifier depuis la base de données
$product = findProductById($db, $productId);
$imageChange = "NOT NEEDED";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_FILES['file_image_path']['name'])) {
        $path = $_POST['image_path'];

    } else {
        $tmpName = $_FILES['file_image_path']['tmp_name'];
        $name = $_FILES['file_image_path']['name'];
        $size = $_FILES['file_image_path']['size'];
        $error = $_FILES['file_image_path']['error'];
        $type = $_FILES['file_image_path']['type'];
        if ($_POST['category'] == 1) {
            $categoryName = "fruits";
        } else {
            $categoryName = "legumes";
        }
        $path = 'assets/img/'.$categoryName.'/'.$_FILES['file_image_path']['full_path'];
        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));
    
        $extensionsAutorisees = ['jpg', 'jpeg', 'png'];
        $tailleMax = 50000;
        if (in_array($extension, $extensionsAutorisees) && $size <= $tailleMax && $error == 0) {
            $imageChange = "YES";
            } else {
            $imageChange = "ERROR";
        }         
    }
    $donneesSoumises = array(
        'product_name' => $_POST['product_name'],
        'description' => $_POST['description'],
        'price' => $_POST['price'],
        'category_id' => $_POST['category'],
        'image_path' => $path,
        'available_quantity' => $_POST['quantity']
    );
    // Création d'un tableau contenant les données actuelles du produit
    $donneesActuelles = array(
        'product_name' => $product['product_name'],
        'description' => $product['description'],
        'price' => $product['price'],
        'category_id' => $product['category_id'],
        'image_path' => $product['image_path'],
        'available_quantity' => $product['available_quantity']
    );
    $differences = array_diff_assoc($donneesSoumises, $donneesActuelles);

    if ($imageChange === "ERROR") {
        echo '<div class="alert alert-danger text-center" role="alert">
                Erreur dans l\'upload de l\'image (taille? extension?)
            </div>';
    
    } elseif (empty($differences)) {
        header("Location: adminProducts.php");
        exit;
    } elseif ($imageChange === "YES") {
        $path_to_unlink = '../'.$_POST['image_path'];
            if (file_exists($path_to_unlink)) {
                unlink($path_to_unlink);
            }
        move_uploaded_file($tmpName, './../assets/img/'.$categoryName.'/'.$name);
        $update = updateProduct($db, $productId, $differences);
        header("Location: adminProducts.php");
        exit;
    } else {
        $update = updateProduct($db, $productId, $differences);
        header("Location: adminProducts.php");
        exit;
    }
}
```


En exemple, j’ajoute le produit vanille. Initialement l’image n’est pas dans le dossier :
<center>

![Le dossier d'images sans le fichier vanille](/assets/img/imgREADME/image-43.png)

</center>

Une fois l’ajout du fruit validé, on voit l’image sélectionnée dans le dossier :

<center>

![Le formulaire d'ajout d'un produit](/assets/img/imgREADME/image-44.png)

</center>

<center>

![Le dossier d'images avec le fichier vanille](/assets/img/imgREADME/image-45.png)

</center>

Si je modifie l’image du produit, l’image dans le dossier sera remplacée :

<center>

![Le formulaire de modification de produit](/assets/img/imgREADME/image-46.png)

</center>

<center>

![Le dossier d'images avec le nouveau fichier vanille](/assets/img/imgREADME/image-47.png)

</center>


Si je supprime le produit, l’image n’est plus présente dans le dossier :

<center>

![un modal nous demande de confirmer la suppression](/assets/img/imgREADME/image-48.png)

</center>

<center>

![Le dossier d'images sans fichier vanille](/assets/img/imgREADME/image-49.png)

</center>

  
### 3) La pagination

Ce code gère la pagination de mes produits. J'affiche un maximum de 15 produits par page et je récupère la page actuelle via un paramètre URL. Ensuite, je calcule l'index de départ pour la pagination.
Je détermine les produits à afficher sur la page actuelle en utilisant array_slice. Le nombre total de pages est calculé avec ceil.
Elle permet d'arrondir un nombre décimal à l'entier supérieur le plus proche.

```php
// Nombre maximum de produits par page
$productsPerPage = 15;

// Page actuelle (par défaut: 1)
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calcul de l'index de départ pour la pagination
$totalProducts = count($products);

// Calcul de l'index de départ pour la pagination
$start = ($page - 1) * $productsPerPage;

// Liste des produits à afficher sur la page actuelle
$productsToShow = array_slice($products, $start, $productsPerPage);

// Nombre total de pages après le tri
$totalPages = ceil($totalProducts / $productsPerPage);

// Liste des produits à afficher sur la page actuelle
$productsToShow = array_slice($products, $start, $productsPerPage);

// Nombre total de pages
$totalPages = ceil(count($products) / $productsPerPage);
```

Pour la navigation, je crée des liens de pagination. Les boutons "Précédent" et "Suivant" permettent de naviguer entre les pages, et un bouton est désactivé si je suis sur la première ou la dernière page. Les pages sont affichées dynamiquement avec un indicateur pour la page actuelle.

```php
<!-- Pagination -->
<nav aria-label="Page navigation example" class="d-flex justify-content-around align-items-center">
    <ul class="pagination">
        <!-- Bouton "Précédent" -->
        <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
            <a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Prev</span>
            </a>
        </li>

        <!-- Affichage des pages -->
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>

        <!-- Bouton "Suivant" -->
        <li class="page-item <?php echo ($page >= $totalPages) ? 'disabled' : ''; ?>">
            <a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>
```

<center>

![la page de gestion des produits](/assets/img/imgREADME/image-52.png)

</center>

  
### 4) Suggestions de recettes via une API

Ce code récupère des recettes en utilisant l'API de Spoonacular et affiche les résultats. D'abord, j'obtiens le produit pour la recette depuis un élément HTML, puis je construis l'URL de l'API avec cet ingrédient.
La fonction fetchData utilise fetch pour obtenir les données de l'API, les convertit en JSON, et affiche jusqu'à trois recettes sous forme de cartes HTML.
Si aucune recette n'est trouvée, un message approprié s'affiche. En cas d'erreur lors de la récupération des données, un message d'erreur s'affiche également. Enfin, j'appelle fetchData avec l'URL construite pour afficher les recettes.

```js
let product_for_recipe = document.getElementById("product_for_recepe").textContent;
// Construire l'URL de l'API
let url = `https://api.spoonacular.com/recipes/findByIngredients?apiKey=762e26ea1360479791bcfed5116055de&ingredients=`+ product_for_recipe;
console.log(url);
// Sélectionner l'élément HTML où afficher les résultats
let result = document.querySelector('.result');
// Fonction pour récupérer les données de l'API
function fetchData(url) {
    fetch(url)
        .then(response => response.json()) // Convertir la réponse en JSON
        .then(data => {
            // Vérifier si des résultats ont été retournés
            if (data && data.length > 0) {
                // Récupérer seulement les 3 premiers résultats
                let recipes = data.slice(0, 3);

                // Boucler à travers les recettes et créer des cartes pour chacune
                recipes.forEach(recipe => {
                    // Créer une carte pour chaque recette
                    let card = document.createElement('div');
                    card.classList.add('col');
                    let cardInner = `
                        <div class="card mx-auto my-3" style="width: 18rem;">
                            <img src="${recipe.image}" class="card-img-top" alt="${recipe.title}">
                            <div class="card-body">
                                <h5 class="card-title">${recipe.title}</h5>
                                <p class="card-text">${recipe.description}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Tailles disponibles : 1 pers, 2 pers, 3/4 pers</li>
                            </ul>
                            <div class="card-body">
                                <a href="produit.php?id=${recipe.id}" class="card-link btn btn-sm btn-success">Voir la recette</a>
                            </div>
                        </div>
                    `;
                    card.innerHTML = cardInner;
                    // Ajouter la carte à la zone de résultat
                    result.appendChild(card);
                });
            } else {
                // Si aucune recette n'est trouvée, afficher un message approprié
                result.textContent = "Aucune recette trouvée avec le mot clé " + product_for_recipe;
            }
        })
        .catch(error => {
            // Gérer les erreurs survenues lors de la récupération des données
            console.error('Une erreur s\'est produite lors de la récupération des données:', error);
            result.textContent = "Une erreur s'est produite lors de la récupération des recettes.";
        });
}
// Appeler la fonction fetchData avec l'URL construite
fetchData(url);

```

  
### 5) SMTP

Je définis une fonction sendEmail qui configure le serveur SMTP.
La fonction prend comme paramètres l'objet PHPMailer, l'adresse email du destinataire, le sujet, et le corps du message. Je configure l'expéditeur et le destinataire, puis j'envoie l'email. En cas d'erreur, un message d'erreur est affiché.

```php
// on créé une fonction qui enverra l'email avec les paramètres à définir
function sendEmail($mail, $userEmail, $subject, $body) {
    try {
        // Configuration du SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.fr';
        $mail->SMTPAuth = true;
        $mail->Username = 'terroirbox@paluch-benoit.com'; 
        $mail->Password = 'terroirbox77Windwaker!';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
    
        // Destinataire
        $mail->addAddress($userEmail);
    
        // Expéditeur
        $mail->setFrom("terroirbox@paluch-benoit.com");
    
        // Contenu
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
    
        // Envoi de l'e-mail
        $mail->send();
    
    } catch(Exception $e) {
        echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
    }
}
```

<center>

![Le mail de confirmation de commande](/assets/img/imgREADME/image-55.png)

</center>

  
### 6) COOKIES

Pour la gestion des cookies et pour être en conformité avec les réglementations sur la confidentialité des données telle que le RGPD, j’ai utilisé Orejime.
Il gère l’interaction avec les utilisateurs en affichant un modal pour gérer les préférences de cookies. Les utilisateurs peuvent donner leur consentement pour certains cookies, les refuser ou les retirer ultérieurement.

<center>

![Le github de Orejime](/assets/img/imgREADME/image-56.png)

</center>

<center>

![Le modal des cookies](/assets/img/imgREADME/image-57.png)

</center>

  
## VII) Déploiement et tests

J'ai déployé mon site sur Hostinger, une étape cruciale dans sa mise en ligne. Après avoir choisi un plan d'hébergement adapté, j'ai transféré mes fichiers sur le serveur Hostinger via le gestionnaire de fichiers intégré. Enfin, j'ai testé plusieurs aspects de mon site web pour garantir son bon fonctionnement et sa fiabilité. 
J'ai commencé par effectuer un test de fonctionnalité générale, m'assurant que toutes les pages principales étaient accessibles sans erreur et que la navigation entre les différentes pages fonctionnait correctement. 
Ensuite, j'ai soumis tous les formulaires pour vérifier leur bon fonctionnement, en m'assurant que les données étaient correctement envoyées à la base de données et que les validations, tant côté client que côté serveur, étaient efficaces. 
J'ai également testé la compatibilité et la réactivité du site en le visualisant sur divers navigateurs tels que Chrome, Firefox et Safari, ainsi que sur différents appareils comme les smartphones, les tablettes et les ordinateurs de bureau. 
J’ai testé les notifications et les e-mails pour m'assurer qu'ils étaient envoyés et reçus correctement, sans être marqués comme spam. Enfin, j'ai effectué un test approfondi de la gestion des erreurs pour garantir que les messages d'erreur étaient appropriés et informatifs en cas de problème.

  
## VIII) Pratiques de Sécurité

### 1) Protection contre les attaques XSS
   
Pour protéger mon site contre les attaques XSS, j'utilise systématiquement la fonction htmlspecialchars pour échapper les caractères spéciaux HTML. Cette méthode garantit que toutes les sorties de données utilisateur sont sécurisées.

```php
$firstName = htmlspecialchars(($_POST['firstName']));
```

  
### 2) Stockage des images sur le système de fichiers
 
J'ai pris la décision de stocker les images sur le système de fichiers plutôt qu'en BLOB dans la base de données. Cette pratique réduit les risques liés à la stéganographie. De plus, je contrôle strictement les extensions et les tailles des fichiers images acceptés, ce qui est crucial pour éviter les téléchargements malveillants.

  
### 3) Prévention des injections SQL
   
Pour prévenir les injections SQL, j'utilise systématiquement des requêtes préparées. Cette approche protège efficacement ma base de données en séparant le code SQL des données utilisateur, empêchant ainsi toute injection de code malveillant.

```php
$stmt = $db->prepare($sql);
```

  
### 4) Hachage des mots de passe
   
Lors de l'inscription des utilisateurs, j'emploie la fonction password_hash pour hacher les mots de passe. J'utilise des algorithmes de hachage forts comme bcrypt pour assurer une protection maximale des données sensibles.

```php
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
```

  
## IX) Veille technologique

Tout au long de ce projet, j’ai effectué une veille technologique en explorant diverses ressources en ligne. Je consulte régulièrement des chaînes YouTube spécialisées dans le développement, où je trouve des tutoriels, des présentations de nouvelles technologies et des analyses approfondies.
 En parallèle, je consulte également les documents officiels des langages de programmation, des frameworks et des bibliothèques que j'utilise, afin de comprendre le pourquoi et le comment du code utilisé. 
De plus, je complète ma veille en suivant des cours en ligne sur des plateformes telles qu'Udemy, où je peux approfondir mes connaissances sur des sujets spécifiques et découvrir de nouvelles approches de développement. 
En combinant ces différentes sources d'information, je m'assure de à développer mes compétences en programmation.

<center>

![Le modal des cookies](/assets/img/imgREADME/image-61.png)

</center>

  
## X) Conclusion

Ce projet m'a permis d'acquérir des compétences clés en développement web, en mettant en pratique les connaissances théoriques acquises au cours de ma formation.
J'ai su m'adapter aux besoins spécifiques d'une AMAP, en développant une expérience utilisateur intuitive et complète. 
La réalisation d'un site de vente en ligne doté d'un tableau de bord de gestion de stock démontre ma capacité à concevoir et développer des applications web robustes, répondant aux exigences fonctionnelles et techniques élevées. 
En conclusion, le projet TerroirBox est le fruit d'un travail acharné, d'une expertise technique et d'une passion pour le développement web, offrant ainsi une solution innovante et performante dans le domaine de la vente en ligne de produits agricoles locaux.
Je tiens à remercier Simplon et France Travail de m’avoir offert la possibilité d’effectuer cette formation. Je remercie les formateurs Mohammed Afife, Sofiane Khalfi et Mohamed Salah.

<center>

![Le modal des cookies](/assets/img/imgREADME/image-62.png)

</center>
