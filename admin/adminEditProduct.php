<?php
// Inclusion du fichier d'en-tête
include dirname(__DIR__) . "/admin/adminHeader.php";
// Inclusion du fichier contenant les fonctions d'administration
require_once dirname(__DIR__) . "/functions/admin.fn.php"; 

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
?>

<div class="container">
    <!-- Titre de la page -->
    <h2 class="my-4 text-center">Modifier le produit</h2>
    <!-- Affichage de l'image actuelle du produit -->
    <div class="text-center mb-4">
        <img src="../<?php echo $product['image_path']; ?>" alt="Image du produit" style="width: 300px;">
    </div>
    <!-- Formulaire de modification du produit -->
    <form method="post" action="" enctype="multipart/form-data">
        <!-- Champ pour le nom du produit -->
        <div class="mb-3">
            <label for="product_name" class="form-label">Nom du produit</label>
            <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $product['product_name']; ?>">
        </div>
        <!-- Champ pour le prix du produit -->
        <div class="mb-3">
            <label for="price" class="form-label">Prix</label>
            <input type="text" class="form-control" id="price" name="price" value="<?php echo $product['price']; ?>">
        </div>
        <!-- Champ pour la quantité disponible du produit -->
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantité</label>
            <input type="text" class="form-control" id="quantity" name="quantity" value="<?php echo $product['available_quantity']; ?>">
        </div>
        <!-- Liste déroulante pour la catégorie du produit -->
        <div class="mb-3">
            <label for="category" class="form-label">Catégorie</label>
            <select class="form-select" id="category" name="category">
                <option value="1" <?php if($product['category_id'] == 1) echo "selected"; ?>>Fruit</option>
                <option value="2" <?php if($product['category_id'] == 2) echo "selected"; ?>>Légume</option>
            </select>
        </div>
        <!-- Champ pour la description du produit -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"><?php echo $product['description']; ?></textarea>
        </div>
        <!-- Champ pour le chemin de l'image du produit -->
        <div class="mb-3">
            <input type="hidden" id="image_path" name="image_path" value="<?php echo $product['image_path']; ?>">
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10">
                <label for="file_image_path">
                    <span class="btn btn-primary">Changer l'image</span>
                    <input type="file" class="form-control" name="file_image_path" id="file_image_path">
                </label>
                
            </div>
        </div>
        <br>

        <!-- Bouton de soumission du formulaire pour enregistrer les modifications -->
        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
    </form>
</div>

<?php
include dirname(__DIR__) . "/admin/adminFooter.php";
