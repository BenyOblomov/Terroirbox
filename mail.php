<?php
//  la classe principale pour envoyer des emails
use PHPMailer\PHPMailer\PHPMailer;
// permet de configurer comment les emails sont envoyés
use PHPMailer\PHPMailer\SMTP;
// gestion des erreurs
use PHPMailer\PHPMailer\Exception;

require_once "utilities/phpmailer/Exception.php";
require_once "utilities/phpmailer/PHPMailer.php";
require_once "utilities/phpmailer/SMTP.php";

// on  crée une nouvelle "instance" ou "objet" de la classe 
$mail = new PHPMailer(true);

// on créé une fonction qui enverra l'email avec les paramètres à définir
function sendEmail($mail, $userEmail, $subject, $body) {
    try {
        // Configuration du SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.fr';
        $mail->SMTPAuth = true;
        $mail->Username = 'username'; 
        $mail->Password = 'motdepasse';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
    
        // Destinataire
        $mail->addAddress($userEmail);
    
        // Expéditeur
        $mail->setFrom("terroirbox@paluch-benoit.com");
    
        // Contenu
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
    
        // Envoi de l'e-mail
        $mail->send();
    
    } catch(Exception $e) {
        echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
    }
}

