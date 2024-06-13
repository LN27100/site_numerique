<?php
// Inclure la configuration de la base de données
require_once '../config.php';

// Inclure le modèle ContactModel
require_once '../models/contactModel.php';

class ContactController {
    private $contactModel;

    public function __construct() {
        // Initialisation du modèle ContactModel
        $this->contactModel = new ContactModel();
    }

    public function handleFormSubmission() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer et nettoyer les données du formulaire
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : '';
            $subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
            $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

            // Vérifier que toutes les données sont valides
            if ($name && $email && $subject && $message) {
                // Envoi de l'e-mail à l'administrateur (optionnel, à activer si nécessaire)
                // $to = 'heloceinlove@laposte.net'; // Adresse e-mail de l'administrateur
                // $subjectEmail = "Nouveau message de contact : $subject";
                // $body = "Nom : $name\nEmail : $email\nSujet : $subject\nMessage : $message";
                // $headers = "From: $email";

                // Tentative d'envoi de l'e-mail
                // if (mail($to, $subjectEmail, $body, $headers)) {
                // Afficher une alerte pour l'envoi de l'e-mail
                echo "<script>alert('Votre message a été envoyé.');</script>";
                // } else {
                //     echo "Échec de l'envoi du message.";
                // }

                // Enregistrement des données dans la base de données
                $success = $this->contactModel->saveContact($name, $email, $subject, $message);

                // Ne pas afficher de message pour l'enregistrement dans la base de données

            } else {
                echo "Veuillez remplir tous les champs correctement.";
            }
        }
    }
}

// Création de l'objet contrôleur et appel de la méthode pour traiter le formulaire
$controller = new ContactController();
$controller->handleFormSubmission();

// Inclure la vue
include_once '../views/view_footer/view-contact.php';
?>
