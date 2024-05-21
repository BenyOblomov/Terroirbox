<?php
// Inclusion du fichier d'en-tête
include dirname(__DIR__) . "/admin/adminHeader.php";
// Inclusion du fichier contenant les fonctions d'administration
require_once dirname(__DIR__) . "/functions/admin.fn.php"; 

// Récupération de l'identifiant de l'utilisateur à modifier depuis l'URL
$userId = $_GET['id'];

// Récupération des informations de l'utilisateur à modifier depuis la base de données
$user = findUserById($db, $userId);

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
?>

<div class="container">
    <!-- Titre de la page -->
    <h2 class="my-4 text-center">Modifier le profil</h2>
    <!-- Formulaire de modification du profil utilisateur -->
    <form method="post" action="">
        <!-- Champ pour le nom de l'utilisateur -->
        <div class="mb-3">
            <label for="last_name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $user['last_name']; ?>">
        </div>
        <!-- Champ pour le prénom de l'utilisateur -->
        <div class="mb-3">
            <label for="first_name" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $user['first_name']; ?>">
        </div>
        <!-- Champ pour l'email de l'utilisateur -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
        </div>
        <!-- Liste déroulante pour le rôle de l'utilisateur -->
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role">
                <option value="1" <?php if($user['role'] == "admin") echo "selected"; ?>>Admin</option>
                <option value="2" <?php if($user['role'] == "user") echo "selected"; ?>>User</option>
            </select>
        </div>
        <!-- Champ pour l'adresse de l'utilisateur -->
        <div class="mb-3">
            <label for="address" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo $user['address']; ?>">
        </div>
        <!-- Champ pour le numéro de téléphone de l'utilisateur -->
        <div class="mb-3">
            <label for="phone_number" class="form-label">Téléphone</label>
            <input type="tel" class="form-control" id="phone_number" name="phone_number" value="<?php echo $user['phone_number']; ?>">
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date d'inscription</label>
            <input type="date" class="form-control" id="registration_date" name="registration_date" value="<?php echo $user['registration_date']; ?>">
        </div>
        <!-- Bouton de soumission du formulaire pour enregistrer les modifications -->
        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
    </form>
</div>

<?php
include dirname(__DIR__) . "/admin/adminFooter.php";
