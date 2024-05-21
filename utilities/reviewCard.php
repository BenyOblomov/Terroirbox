<div class="carousel-item <?php echo ($i == 0) ? 'active' : ''; ?>">
    <!-- Si la variable $i est égale à 0, la classe "active" est ajoutée pour le premier élément -->
    <div class="row">
        <!-- Première colonne -->
        <div class="col-md-6">
            <!-- Carte représentant le premier avis -->
            <div class="card bg-success text-white mb-3">
                <div class="card-body">
                    <!-- Nom de l'utilisateur -->
                    <h5 class="card-title"><?= $review1['first_name'] ?></h5>
                    <!-- Contenu de l'avis -->
                    <p class="card-text"><?= $review1['content'] ?></p>
                    <!-- Appel de la fonction pour afficher les étoiles en fonction de la note -->
                    <?= getStar($review1['rating']) ?>
                </div>
            </div>
        </div>
        <!-- Deuxième colonne (si un deuxième avis est disponible) -->
        <?php if ($review2 != null) : ?>
        <div class="col-md-6">
            <!-- Carte représentant le deuxième avis -->
            <div class="card bg-success text-white mb-3">
                <div class="card-body">
                    <!-- Nom de l'utilisateur -->
                    <h5 class="card-title"><?= $review2['first_name'] ?></h5>
                    <!-- Contenu de l'avis -->
                    <p class="card-text"><?= $review2['content'] ?></p>
                    <!-- Appel de la fonction pour afficher les étoiles en fonction de la note -->
                    <?= getStar($review2['rating']) ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
