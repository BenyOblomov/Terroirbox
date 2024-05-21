<?php 
// Inclusion des fichiers de configuration et des fonctions
include('config/config.php');
include('functions/products.fn.php');
include('functions/database.fn.php');
include('mail.php');


// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $firstName = htmlspecialchars(($_POST['firstName']));
    $lastName = htmlspecialchars(($_POST['lastName']));
    $email = htmlspecialchars(($_POST['email2']));
    $password = htmlspecialchars(($_POST['password2']));
    $confirmPassword = htmlspecialchars(($_POST['confirmPassword']));
    $address = htmlspecialchars(($_POST['address']));
    $phone_number = htmlspecialchars(($_POST['phone_number']));
    $registration_date = date("Y-m-d");

    // Vérification si les mots de passe correspondent
    if ($password !== $confirmPassword) {
        $errorMessage = 'Les mots de passe ne correspondent pas.';
    } else {
        // Hachage du mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Récupération de la connexion à la base de données
        $db = getPDOlink($config);
        
        // Enregistrement de l'utilisateur dans la base de données
        $registrationResult = registerUser($db, $firstName, $lastName, $email, $hashedPassword, $address, $phone_number, $registration_date);
        $userEmail = $email;
        $subject = "Bienvenu(e) chez Terroirbox !";
        $body = "Bonjour ".$firstName." !\n\nVotre inscription à Terroirbox a bien été prise en compte !";
        // Redirection en cas de succès
        if ($registrationResult === true) {
            sendEmail($mail, $userEmail, $subject, $body);
            header("Location: registration_success.php");
            exit();
        } else {
            // Message d'erreur en cas d'échec de l'inscription
            $errorMessage = 'Une erreur s\'est produite lors de l\'inscription. Veuillez réessayer.';
        }
    }
}

// Affichage du message d'erreur s'il existe
if (!empty($errorMessage)) : ?>
    <div class="alert alert-danger text-center" role="alert">
        <?php echo $errorMessage; ?>
    </div>
<?php endif; 

// Inclusion de l'en-tête de la page
include('utilities/header.php'); ?>

<!-- Formulaire de connexion -->
<section class="container mt-4">
  <h2 class="text-center mb-3">Connexion</h2>
  <div class="row justify-content-center">
    <div class="col-md-6">
      <form action="login.php" method="POST">
        <div class="mb-3">
          <label for="email" class="form-label">Adresse email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Mot de passe</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-success m-auto">Se connecter</button>
      </form>
    </div>
  </div>
</section>

<!-- Formulaire d'inscription -->
<section class="container mt-4">
    <h2 class="text-center mb-3">Inscription</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" action="<?php echo ($_SERVER["PHP_SELF"]); ?>">
                <div class="mb-3">
                    <label for="firstName" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="lastName" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="email2" class="form-label">Adresse Email</label>
                    <input type="email" class="form-control" id="email2" name="email2" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="password2" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password2" name="password2" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Adresse</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label for="phoneNumber" class="form-label">Numéro de téléphone</label>
                    <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
                    <div class="invalid-feedback"></div>
                </div>
                <button type="submit" class="btn btn-success m-auto">S'inscrire</button>
            </form>
        </div>
    </div>
</section>

<!-- Inclusion du script JavaScript -->
<script src="connexion.js"></script>

<!-- Inclusion du pied de page -->
<?php include('utilities/footer.php');
