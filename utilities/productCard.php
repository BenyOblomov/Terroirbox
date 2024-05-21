<!-- Image du produit -->
<img src="<?=$value["path"]?>" class="card-img-top" alt="<?=$value["name"]?>">

<div class="card-body">
    <!-- Titre du produit -->
    <h5 class="card-title"><?=$value["name"]?></h5>
    <!-- Description du produit -->
    <p class="card-text"><?=$value["description"]?></p>
</div>

<!-- Liste des caractéristiques du produit -->
<ul class="list-group list-group-flush">
    <li class="list-group-item">
        <!-- Prix du produit -->
        <b><?=$value["price"]?> €/kg</b>
    </li>
</ul>

<div class="card-body">
    <!-- Bouton pour voir les détails du produit -->
    <a href="produit.php?id=<?=$value['id']?>" class="card-link btn btn-success">Details</a>
</div>
