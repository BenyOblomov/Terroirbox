<?php
// Inclusion du fichier d'en-tête de l'administration
include dirname(__DIR__) . ("/admin/adminHeader.php");
// Inclusion du fichier contenant les fonctions d'administration
require_once dirname(__DIR__) . ('/functions/admin.fn.php');

// Vérification si le formulaire de suppression d'utilisateur a été soumis
if (isset($_POST['delete_user'])) {
    // Vérification si l'ID de l'utilisateur est défini dans le formulaire
    if (isset($_POST['user_id'])) {
        // Récupération de l'ID de l'utilisateur à supprimer
        $userId = $_POST['user_id'];
        // Appel de la fonction pour supprimer l'utilisateur
        deleteUser($db, $userId);
    }
}

if (isset($_POST['trier'])) {
    // Sélection du choix de tri des produits
    $_SESSION['UsersSortBy'] = $_POST['trier'];
    // Récupération des produits triés selon le choix
    $users = SortUsersBy($db, $_SESSION['UsersSortBy']);
} else if (isset($_SESSION['UsersSortBy'])) {
    // Si aucun tri n'a été appliqué, récupérer tous les produits
    $users = SortUsersBy($db, $_SESSION['UsersSortBy']);
} else {
    $users = SortUsersBy($db, "user_id");
}

// Nombre maximum d'utilisateurs par page
$usersPerPage = 15;

// Page actuelle (par défaut: 1)
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calcul de l'index de départ pour la pagination
$start = ($page - 1) * $usersPerPage;

// Liste des utilisateurs à afficher sur la page actuelle
$usersToShow = array_slice($users, $start, $usersPerPage);

// Nombre total de pages
$totalPages = ceil(count($users) / $usersPerPage);
?>

<!-- Contenu principal de la page -->
<div class="container">
    <!-- Titre du tableau des utilisateurs -->
    <h2 class="my-4 text-center">Tableau des utilisateurs</h2>
    <div class="d-flex justify-content-center align-items-center">
        <form class="d-flex m-2 col-3" method="post" action="adminUsers.php">
            <!-- Sélection du critère de tri -->
            <select class="form-select" name="trier" aria-label="Default select example">
                <option value="first_name" <?php if (isset($_POST['trier']) && $_POST['trier']=="first_name") { echo 'selected'; } ?>>Prénom</option>
                <option value="last_name" <?php if (isset($_POST['trier']) && $_POST['trier']=="last_name") { echo 'selected'; } ?>>Nom</option>
                <option value="email" <?php if (isset($_POST['trier']) && $_POST['trier']=="email") { echo 'selected'; } ?>>Email</option>
            </select>
            <!-- Bouton pour soumettre le formulaire de tri -->
            <button class="btn btn-primary btn-sm" type="submit">Trier</button>
        </form>
    <!-- Tableau pour afficher les utilisateurs -->
    </div>
    <table class="table table-striped">
        <thead class="thead-dark">
            <!-- En-tête du tableau -->
            <tr>
                <th>ID</th>
                <th class="d-none d-md-table-cell">Prénom</th>
                <th>Nom</th>
                <th class="d-none d-md-table-cell">Email</th>
                <th>Date d'inscription</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Boucle à travers chaque utilisateur
            foreach ($usersToShow as $user): 
            ?>
            <tr>
                <!-- Affichage de l'ID de l'utilisateur -->
                <td><?php echo $user['user_id']; ?></td>
                <!-- Affichage du prénom de l'utilisateur -->
                <td class="d-none d-md-table-cell"><?php echo $user['first_name']; ?></td>
                <!-- Affichage du nom de l'utilisateur -->
                <td><?php echo $user['last_name']; ?></td>
                <!-- Affichage de l'email de l'utilisateur (visible uniquement sur les écrans de taille moyenne et supérieure) -->
                <td class="d-none d-md-table-cell"><?php echo $user['email']; ?></td>
                <td><?php echo $user['registration_date']; ?></td>
                <!-- Cellule contenant les boutons d'action pour chaque utilisateur -->
                <td class="d-flex">
                    <!-- Bouton pour afficher les détails de l'utilisateur -->
                    <a href="adminDetailUser.php?id=<?= $user['user_id'] ?>"><button class="btn btn-success btn-sm"><i class="bi bi-three-dots"></i></button></a>
                    <!-- Bouton pour éditer l'utilisateur -->
                    <a href="adminEditUser.php?id=<?= $user['user_id'] ?>"><button class="btn btn-primary btn-sm mx-3"><i class="bi bi-pencil"></i></button></a>
                    <!-- Formulaire pour supprimer l'utilisateur -->
                    <form method="post" action="adminUsers.php">
                        <!-- Champ caché contenant l'ID de l'utilisateur à supprimer -->
                        <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                        <!-- Bouton pour soumettre le formulaire de suppression de l'utilisateur -->
                        <button class="btn btn-danger btn-sm" type="submit" name="delete_user" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce compte?')"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
    <!-- Fin de la pagination -->
</div>

<?php
include dirname(__DIR__) . "/admin/adminFooter.php";
