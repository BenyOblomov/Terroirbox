<?php
// Inclusion des fichiers nécessaires
include dirname(__DIR__) . "/admin/adminHeader.php";
include dirname(__DIR__) . "/functions/admin.fn.php"; 

if (isset($_GET['category'])) {
    $categoryId = $_GET['category'];

    if ($categoryId == "1") {
        $categoryName = "Fruit";
    } else {
        $categoryName = "Légume";
    }
}

if (isset($_FILES['image_path']) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
    $tmpName = $_FILES['image_path']['tmp_name'];
    $name = $_FILES['image_path']['name'];
    $size = $_FILES['image_path']['size'];
    $error = $_FILES['image_path']['error'];
    $type = $_FILES['image_path']['type'];

    $tabExtension = explode('.', $name);
    $extension = strtolower(end($tabExtension));

    $extensionsAutorisees = ['jpg', 'jpeg', 'png'];
    $tailleMax = 70000;

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
        

        // Appel de la fonction pour ajouter le produit dans la base de données
        addProduct($db, $productName, $price, $quantity, $description, $imagePath, $category);


        move_uploaded_file($tmpName, './../assets/img/'.$categoryName.'/'.$name);
        header("Location: adminProducts.php");
        exit;

    } else {
        echo '<div class="alert alert-danger text-center" role="alert">
        Erreur dans l\'upload de l\'image (taille? extension?)
    </div>';
    }

}

?>

<div class="container">
    <h2 class="my-4 text-center">Ajouter un <?= $categoryName ?></h2>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label for="product_name" class="col-sm-2 col-form-label">Nom du <?= $categoryName ?></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="product_name" name="product_name" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="price" class="col-sm-2 col-form-label">Prix au kilo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="quantity" class="col-sm-2 col-form-label">Quantité en g</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="quantity" name="quantity" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="image_path" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name="image_path" id="image_path" required>
            </div>
        </div>
        <div class="mb-3">
            <input type="hidden" id="category" name="category" value=<?= $categoryId ?>>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Ajouter le <?= $categoryName ?></button>
            </div>
        </div>
    </form>
</div>

<?php
include dirname(__DIR__) . "/admin/adminFooter.php";
