<div class="col my-2">
    <!-- Carte représentant un panier -->
    <div class="card mx-auto" style="width: 18rem;">
        <!-- Image du panier -->
        <img src="<?= htmlspecialchars($value["image_path"]) ?>" class="card-img-top" alt="<?= htmlspecialchars($value["basket_name"]) ?>">
        <div class="card-body">
            <!-- Titre du panier -->
            <h5 class="card-title"><?= htmlspecialchars($value["basket_name"]) ?></h5>
            <!-- Description du panier -->
            <p class="card-text"><?= htmlspecialchars($value["description"]) ?></p>
        </div>
        <div class="card-body">
            <!-- Bouton pour sélectionner le panier -->
            <a href="panier.php?id=<?= htmlspecialchars($value['basket_id']) ?>" class="btn btn-success">Selectionner</a>
        </div>
    </div>
</div>
