<?php
// Je stocke le domaine de mon site
$domaine = 'https://www.paluch-benoit.com/';

// ici je stocke mes url
$index_page = $domaine;
$paniers_page = $domaine . 'paniers.php';
$Apropos_page = $domaine . 'Apropos.php';
$connexion_page = $domaine . "connexion.php";
$monPanier_page = $domaine . "monPanier.php";
$monCompte_page = $domaine . "monCompte.php";
$panier_page = $domaine . "panier.php";
$produit_page = $domaine . "produit.php";
$deconnexion_page = $domaine . "deconnexion.php";
$adminIndex_page = $domaine . "admin/adminIndex.php";



// ici je stocke l'url sur laquelle nous sommes
$current_url = $_SERVER['SCRIPT_NAME'];