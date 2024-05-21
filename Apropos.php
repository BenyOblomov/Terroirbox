<?php 
// Inclusion du fichier d'en-tête
include('utilities/header.php');

// Inclusion du fichier contenant les fonctions relatives aux produits
include('functions/products.fn.php');
?>

<section class="container-fluid py-3">
    <h2 class="text-center mb-3">Santé, écologie et économie</h2>
    <div class="container">
        <div class="row">
            <!-- Colonne pour le texte -->
            <div class="col-md-6 d-flex justify-content-center align-items-center mb-3">
                <!-- Ajout de justify-content-md-start pour aligner le texte à droite sur les petits écrans -->
                <p class="w-75">À l'heure où nos choix alimentaires façonnent notre bien-être et celui de notre planète, TerroirBox s'engage à vous offrir bien plus qu'une simple boîte de fruits et légumes bio. Nous croyons en la puissance d'une alimentation saine pour nourrir non seulement notre corps, mais aussi notre esprit et notre environnement.

                En optant pour nos paniers, vous choisissez de privilégier des produits locaux et de saison, cultivés avec amour par nos agriculteurs partenaires. Chaque bouchée devient alors une déclaration en faveur de la santé, de la durabilité et du soutien aux communautés locales. Chez TerroirBox, nous ne vendons pas seulement des produits, nous offrons une invitation à vivre pleinement, en harmonie avec la nature et en respectant les cycles de notre terre nourricière. Rejoignez-nous dans cette aventure vers une vie équilibrée et épanouissante.</p>
            </div>
            <!-- Colonne pour l'image -->
            <div class="col-md-6 d-flex justify-content-center align-items-center mb-3">
                <img class="w-75 rounded mx-auto d-block" src="assets/img/autres/agrumesBio.jpg" alt="Des agrumes dans un saladier sont rincés à l'eau">
            </div>
        </div>
    </div>
</section>

<!-- Section sur l'identité de l'entreprise -->
<section class="container-fluid bg-success text-white py-3">
    <h2 class="text-center mb-3">Qui sommes nous ?</h2>
    <div class="container">
        <div class="row">
            <!-- Colonne pour l'image -->
            <div class="col-md-6 d-flex justify-content-center align-items-center mb-3">
                <img class="w-75 rounded mx-auto d-block" src="assets/img/autres/livreur.jpg" alt="Un livreur tient une caisse de fruits et légumes">
            </div>
            <!-- Colonne pour le texte -->
            <div class="col-md-6 d-flex align-items-center justify-content-center flex-column">
                <h3>We are TerroirBox</h3>
                <p class="w-75">TerroirBox vous invite à découvrir une expérience culinaire unique. Nous sélectionnons avec soin des paniers de fruits et légumes bio, cultivés localement par nos partenaires agriculteurs. Chaque produit est choisi pour sa fraîcheur et sa qualité, garantissant une alimentation saine et équilibrée pour vous et votre famille.

                En choisissant TerroirBox, vous soutenez non seulement votre santé, mais aussi l'environnement et les communautés locales. Nous croyons fermement en l'importance de privilégier les produits de saison, cultivés dans le respect de la nature et des traditions agricoles.

                Rejoignez-nous dans notre engagement pour une alimentation consciente et durable. Bienvenue chez TerroirBox, où chaque livraison est une ode à la richesse de notre terroir !</p>
            </div>
        </div>
    </div>
</section>

<!-- Section sur les producteurs associés -->
<section class="container-fluid py-3">
    <h2 class="text-center mb-3">Nos producteurs associés</h2>
    <div class="container">
        <div class="row">
            <!-- Colonne pour le texte -->
            <div class="col-md-6 d-flex justify-content-center align-items-center mb-3">
                <p class="w-75">
                    Derrière chaque panier TerroirBox se cachent des histoires de passion et d'expertise agricole. Nos partenaires sont le cœur de notre entreprise, des agriculteurs locaux engagés pour une alimentation saine et respectueuse de l'environnement.

                    Chacun est sélectionné avec soin pour la qualité de ses produits et son engagement envers des pratiques agricoles durables. En choisissant TerroirBox, vous soutenez ces hommes et femmes passionnés qui cultivent nos délices saisonniers. Merci de contribuer à la croissance de nos communautés agricoles locales. Bienvenue chez TerroirBox, au cœur de l'univers de nos partenaires producteurs.
                </p>
            </div>
            <!-- Colonne pour l'image -->
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <img class="w-75 rounded mx-auto d-block" src="assets/img/autres/producteur.jpg" alt="Un producteur tient un panier de fruits et légumes">
            </div>
        </div>
    </div>
</section>

<?php
include('./avisClients.php');
// Inclusion du footer
include('utilities/footer.php');
?>
