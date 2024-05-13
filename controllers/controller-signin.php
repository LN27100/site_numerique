<?php
require_once '../config.php';
require_once '../models/Userprofil.php';

// Vérifie si la session est active, sinon la démarre
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Si l'utilisateur est déjà connecté, redirige vers la page d'accueil
if (isset($_SESSION['user'])) {
    header("Location: ../controllers/controller-home.php");
    exit();
}

// Vérifie si un formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];

    // Vérifie si l'email est vide
    if (empty($_POST["email"])) {
        $errors["email"] = "Champ obligatoire";
    } else {
        $email = $_POST["email"];
    }

    // Vérifie si le mot de passe est vide
    if (empty($_POST["mot_de_passe"])) {
        $errors["mot_de_passe"] = "Champ obligatoire";
    }

    // Vérifie si le reCAPTCHA a été validé
    if (isset($_POST["g-recaptcha-response"])) {
        $secret = '6Lc5hHwpAAAAAIbf0qZjfDjaHz_1XYUIla0kYlTa';
        $reponse = $_POST['g-recaptcha-response'];
        $remoteip = $_SERVER['REMOTE_ADDR'];

        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$reponse&remoteip=$remoteip ";

        $reponseData = file_get_contents($url);
        $dataRow = json_decode($reponseData, true);

        if (!$dataRow['success']) {
            $errors['recaptcha'] = 'Recaptcha obligatoire';
        }
    }

    // Si aucune erreur, procéder à la vérification de l'utilisateur
    if (empty($errors)) {
        // Vérifie si l'email existe dans la base de données
        if (!Userprofil::checkMailExists($email)) {
            $errors['email'] = 'Utilisateur inconnu';
        } else {
            // Récupère les informations de l'utilisateur
            $utilisateurInfos = Userprofil::getInfos($email);

            // Comparaison du mot de passe
            if (password_verify($_POST["mot_de_passe"], $utilisateurInfos['USERPROFIL_PASSWORD'])) {
                // Mot de passe correct

                // Stocke les informations dans la variable de session
                $_SESSION['user'] = $utilisateurInfos;

                // Redirige vers la page d'accueil
                header("Location: ../controllers/controller-home.php");
                exit();
            } else {
                $errors['mot_de_passe'] = 'Mauvais mot de passe';
            }
        }
    }
}

// Inclut la vue de connexion
include_once '../views/view-signin.php';
?>
