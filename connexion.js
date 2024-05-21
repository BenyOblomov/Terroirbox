// Attend que le DOM soit entièrement chargé pour exécuter le script
document.addEventListener("DOMContentLoaded", function() {
    // Récupération des éléments du formulaire
    const firstNameInput = document.getElementById('firstName');
    const lastNameInput = document.getElementById('lastName');
    const emailInput = document.getElementById('email2');
    const passwordInput = document.getElementById('password2');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    const addressInput = document.getElementById('address');
    const phoneNumberInput = document.getElementById('phone_number');

    // Expressions régulières pour la validation
    const firstNameRegex = /^[a-zA-ZÀ-ÿ\s'-]+$/;
    const lastNameRegex = /^[a-zA-ZÀ-ÿ\s'-]+$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    const confirmPasswordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    const addressRegex = /^[a-zA-ZÀ-ÿ0-9\s'-.,]+$/;
    const phoneNumberRegex = /^(\+?\d{1,3})?[-.\s]?\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}$/;

    // Fonction de validation générique
    function validateInput(input, regex, message) {
        const feedbackDiv = input.parentElement.querySelector('.invalid-feedback');
        if (regex.test(input.value)) {
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');
            feedbackDiv.textContent = '';
        } else {
            input.classList.remove('is-valid');
            input.classList.add('is-invalid');
            feedbackDiv.textContent = message;
        }
    }

    // Fonction de validation de la correspondance des mots de passe
    function validatePasswordMatch() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;
        const passwordMatchDiv = confirmPasswordInput.parentElement.querySelector('.invalid-feedback');
        
        if (confirmPassword === password) {
            confirmPasswordInput.classList.remove('is-invalid');
            confirmPasswordInput.classList.add('is-valid');
            passwordMatchDiv.textContent = '';
            return true;
        } else {
            confirmPasswordInput.classList.remove('is-valid');
            confirmPasswordInput.classList.add('is-invalid');
            passwordMatchDiv.textContent = 'Les mots de passe ne correspondent pas.';
            return false;
        }
    }

    // Événement d'entrée pour le champ prénom
    firstNameInput.addEventListener('input', function() {
        validateInput(firstNameInput, firstNameRegex, 'Le prénom doit contenir uniquement des lettres, des espaces, des apostrophes ou des tirets.');
    });

    // Événement d'entrée pour le champ nom de famille
    lastNameInput.addEventListener('input', function() {
        validateInput(lastNameInput, lastNameRegex, 'Le nom doit contenir uniquement des lettres, des espaces, des apostrophes ou des tirets.');
    });

    // Événement d'entrée pour le champ email
    emailInput.addEventListener('input', function() {
        validateInput(emailInput, emailRegex, 'Veuillez entrer une adresse email valide.');
    });

    // Événement d'entrée pour le champ mot de passe
    passwordInput.addEventListener('input', function() {
        validateInput(passwordInput, passwordRegex, 'Le mot de passe doit contenir au moins 8 caractères, dont au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.');
    });

    // Événement d'entrée pour le champ confirmation de mot de passe
    confirmPasswordInput.addEventListener('input', function() {
        validateInput(confirmPasswordInput, confirmPasswordRegex, 'Les mots de passe doivent correspondre et respecter les critères de validation.');
        validatePasswordMatch();
    });

    // Événement d'entrée pour le champ adresse
    addressInput.addEventListener('input', function() {
        validateInput(addressInput, addressRegex, 'L\'adresse doit contenir uniquement des lettres, des chiffres, des espaces, des apostrophes, des tirets ou des virgules.');
    });

    // Événement d'entrée pour le champ numéro de téléphone
    phoneNumberInput.addEventListener('input', function() {
        validateInput(phoneNumberInput, phoneNumberRegex, 'Veuillez entrer un numéro de téléphone valide.');
    });
});
