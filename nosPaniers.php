<section class="container mt-4">
  <h2 class="text-center mb-3">Nos paniers</h2>
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 justify-content-center">
    <?php 
    // Récupérer tous les paniers depuis la base de données
    $baskets = findAllBaskets($db);

    // Parcourir chaque panier récupéré
    foreach ($baskets as $value) {
      // Inclure le fichier pour afficher une carte représentant le panier
      include 'utilities/basketCard.php';
    }
    ?>
  </div>
</section>
