<?php
// Empêche l'accès à la page home si l'utilisateur n'est pas connecté et vérifie si la session n'est pas déjà active
if (session_status() === PHP_SESSION_NONE) {
    // Si non, démarrer la session
    session_start();
}

require_once '../config.php';
require_once __DIR__ . '../../models/Userprofil.php';

// permet d'afficher le formulaire
$showform = true;

// VERIFICATION DE LA SOUMISSION DU FORMULAIRE
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array();

    // Récupération des données du formulaire en le rendant "safe" (enlever les caractères spéciaux etc)
    $userprofil_name = trim($_POST['userprofil_name']);
    $userprofil_firstname = trim($_POST['userprofil_firstname']);
    $userprofil_pseudo = trim($_POST['userprofil_pseudo']);
    $userprofil_street_name = trim($_POST['userprofil_street_name']);
    $userprofil_additional_adress = trim($_POST['userprofil_additional_adress']);
    $userprofil_zipcode = trim($_POST['userprofil_zipcode']);
    $userprofil_city = trim($_POST['userprofil_city']);
    $userprofil_phone = trim($_POST['userprofil_phone']);
    $userprofil_mail = trim($_POST['userprofil_mail']);
    $userprofil_password = trim($_POST['userprofil_password']);


    // Contrôle du nom
    if (empty($_POST["userprofil_name"])) {
        $errors["userprofil_name"] = "Champ obligatoire";
    } elseif (!preg_match("/^[a-zA-ZÀ-ÿ -]*$/", $_POST["userprofil_name"])) {
        $errors["userprofil_name"] = "Seules les lettres, les espaces et les tirets sont autorisés dans le champ Nom";
    }

    // Contrôle du prénom
    if (empty($_POST["userprofil_firstname"])) {
        $errors["userprofil_firstname"] = "Champ obligatoire";
    } elseif (!preg_match("/^[a-zA-ZÀ-ÿ -]*$/", $_POST["userprofil_firstname"])) {
        $errors["userprofil_firstname"] = "Seules les lettres, les espaces et les tirets sont autorisés dans le champ Prénom";
    }

    // Contrôle du pseudo
    if (empty($_POST["userprofil_pseudo"])) {
        $errors["userprofil_pseudo"] = "Champ obligatoire";
    } elseif (!preg_match("/^[a-zA-ZÀ-ÿ\d]+$/", $_POST["userprofil_pseudo"])) {
        $errors["userprofil_pseudo"] = "Seules les lettres et les chiffres sont autorisés dans le champ userprofil_pseudo";
    } elseif (strlen($_POST["userprofil_pseudo"]) < 6) {
        $errors["userprofil_pseudo"] = "Le pseudo doit contenir au moins 6 caractères";
    } elseif (Userprofil::checkPseudoExists($_POST["userprofil_pseudo"])) {
        $errors["userprofil_pseudo"] = 'Pseudo déjà utilisé';
    }

     // Contrôle de l'adresse
     if (empty($_POST["userprofil_street_name"])) {
        $errors["userprofil_street_name"] = "Champ obligatoire";
    } elseif (!preg_match("/^[a-zA-ZÀ-ÿ0-9 -]*$/", $_POST["userprofil_street_name"])) {
        $errors["userprofil_street_name"] = "Seules les lettres, les espaces , les chiffres et les tirets sont autorisés dans le champ Prénom";
    }

     // Contrôle du complément d'adresse
     if (empty($_POST["userprofil_additional_adress"])) {
        $errors["userprofil_additional_adress"] = "Champ obligatoire";
    } elseif (!preg_match("/^[a-zA-ZÀ-ÿ0-9 -]*$/", $_POST["userprofil_additional_adress"])) {
        $errors["userprofil_additional_adress"] = "Seules les lettres, les espaces les chiffres et les tirets sont autorisés dans le champ complément d'adresse";
    }

     // Contrôle du code postal
     if (empty($_POST["userprofil_zipcode"])) {
        $errors["userprofil_zipcode"] = "Champ obligatoire";
    } elseif (!preg_match("/^[0-9]+$/", $_POST["userprofil_zipcode"])) {
        $errors["userprofil_zipcode"] = "Seuls les chiffres sont autorisés dans le champ code postal";
    }

     // Contrôle de la ville
     if (empty($_POST["userprofil_city"])) {
        $errors["userprofil_city"] = "Champ obligatoire";
    } elseif (!preg_match("/^[a-zA-ZÀ-ÿ -]*$/", $_POST["userprofil_city"])) {
        $errors["userprofil_city"] = "Seules les lettres, les espaces et les tirets sont autorisés dans le champ ville";
    }

     // Contrôle du numéro de téléphone
     if (empty($_POST["userprofil_phone"])) {
        $errors["userprofil_phone"] = "Champ obligatoire";
    } elseif (!preg_match("/^[0-9]+$/", $_POST["userprofil_phone"])) {
        $errors["userprofil_phone"] = "Seuls les chiffres sont autorisés dans le champ numéro de téléphone";
    }

    // Contrôle de l'email
    if (empty($_POST["userprofil_mail"])) {
        $errors["userprofil_mail"] = "Champ obligatoire";
    } elseif (!filter_var($_POST["userprofil_mail"], FILTER_VALIDATE_EMAIL)) {
        $errors["userprofil_mail"] = "Le format de l'adresse email n'est pas valide";
    } elseif (Userprofil::checkMailExists($_POST["userprofil_mail"])) {
        $errors["userprofil_mail"] = 'mail déjà utilisé';
    }


    // Contrôle du mot de passe
    if (empty($_POST["userprofil_password"])) {
        $errors["userprofil_password"] = "Champ obligatoire";
    } elseif (strlen($_POST["userprofil_password"]) < 8) {
        $errors["userprofil_password"] = "Le mot de passe doit contenir au moins 8 caractères";
    }

    // Contrôle de la confirmation du mot de passe
    if ($_POST["userprofil_password"] !== $_POST["conf_mot_de_passe"]) {
        $errors["conf_mot_de_passe"] = "Les mots de passe ne correspondent pas";
    }


    // Contrôle des CGU
    if (empty($_POST["cgu"]) || $_POST["cgu"] !== "on") {
        $errors["cgu"] = "Veuillez accepter les conditions générales d'utilisation pour continuer.";
    }

    // On s'assure qu'il n'y a pas d'erreur dans le formuaire
    if (empty($errors)) {

        Userprofil::create($userprofil_name, $userprofil_firstname, $userprofil_pseudo, $userprofil_mail, $userprofil_zipcode, $userprofil_street_name, $userprofil_phone, $userprofil_additional_adress, $userprofil_city, $userprofil_password);
        $showform = false;

    }

    // Donne toutes les propriétés du serveur
    // var_dump($_SERVER)
}



// Affichage du formulaire ou des erreurs
include_once __DIR__ . '/../views/view-signup.php';


?>
