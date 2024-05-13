<?php
// Empêche l'accès à la page home si l'utilisateur n'est pas connecté et vérifie si la session n'est pas déjà active
if (session_status() === PHP_SESSION_NONE) {
    // Si non, démarrer la session
    session_start();
}
require_once '../config.php';
require_once __DIR__ . '/../models/Userprofil.php';
// // Vérifie si l'utilisateur est connecté
// if (!isset($_SESSION['user'])) {
//     // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
//     header("Location: ../controllers/controller-signin.php");
//     exit();
// }
$userprofil_pseudo = isset($_SESSION['user']['USERPROFIL_PSEUDO']) ? ($_SESSION['user']['USERPROFIL_PSEUDO']) : "Pseudo non défini";
$userprofil_name = isset($_SESSION['user']['USERPROFIL_NAME']) ? ($_SESSION['user']['USERPROFIL_NAME']) : "Nom non défini";
$userprofil_firstname = isset($_SESSION['user']['USERPROFIL_FIRSTNAME']) ? ($_SESSION['user']['USERPROFIL_FIRSTNAME']) : "Prénom non défini";
$userprofil_mail = isset($_SESSION['user']['USERPROFIL_MAIL']) ? ($_SESSION['user']['USERPROFIL_MAIL']) : "Email non défini";
$userprofil_street_name = isset($_SESSION['user']['USERPROFIL_STREET_NAME']) ? ($_SESSION['user']['USERPROFIL_STREET_NAME']) : "nom de rue non défini";
$userprofil_additional_adress = isset($_SESSION['user']['USERPROFIL_ADITTIONAL_ADRESS']) ? ($_SESSION['user']['USERPROFIL_ADITTIONAL_ADRESS']) : "Complément d'adresse non défini";
$userprofil_zipcode = isset($_SESSION['user']['USERPROFIL_ZIPCODE']) ? ($_SESSION['user']['USERPROFIL_ZIPCODE']) : "Code postal non défini";
$userprofil_city = isset($_SESSION['user']['USERPROFIL_CITY']) ? ($_SESSION['user']['USERPROFIL_CITY']) : "Ville non défini";
$userprofil_phone = isset($_SESSION['user']['USERPROFIL_PHONE']) ? ($_SESSION['user']['USERPROFIL_PHONE']) : "Numéro de téléphone non défini";
// Gestion du formulaire
$errors = array();
$USERPROFIL_ID = isset($_SESSION['user']['USERPROFIL_ID']) ? $_SESSION['user']['USERPROFIL_ID'] : null;
// Gestion du formulaire
if (isset($_POST['save_modification'])) {
    $USERPROFIL_ID = isset($_SESSION['user']['USERPROFIL_ID']) ? $_SESSION['user']['USERPROFIL_ID'] : 0;
    $new_name = isset($_POST['USERPROFIL_NAME']) ? ($_POST['USERPROFIL_NAME']) : "";
    $new_firstname = isset($_POST['USERPROFIL_FIRSTNAME']) ? ($_POST['USERPROFIL_FIRSTNAME']) : "";
    $new_pseudo = isset($_POST['USERPROFIL_PSEUDO']) ? ($_POST['USERPROFIL_PSEUDO']) : "";
    $new_email = isset($_POST['USERPROFIL_MAIL']) ? ($_POST['USERPROFIL_MAIL']) : "";
    $new_street = isset($_POST['USERPROFIL_STREET_NAME']) ? ($_POST['USERPROFIL_STREET_NAME']) : "";
    $new_additionnal = isset($_POST['USERPROFIL_ADITTIONAL_ADRESS']) ? ($_POST['USERPROFIL_ADITTIONAL_ADRESS']) : "";
    $new_zipcode = isset($_POST['USERPROFIL_ZIPCODE']) ? ($_POST['USERPROFIL_ZIPCODE']) : "";
    $new_city = isset($_POST['USERPROFIL_CITY']) ? ($_POST['USERPROFIL_CITY']) : "";
    $new_phone = isset($_POST['USERPROFIL_PHONE']) ? ($_POST['USERPROFIL_PHONE']) : "";
    // Contrôle du nom
    if (empty($_POST["USERPROFIL_NAME"])) {
        $errors["USERPROFIL_NAME"] = "Champ obligatoire";
    } elseif (!preg_match("/^[a-zA-ZÀ-ÿ -]*$/", $_POST["USERPROFIL_NAME"])) {
        $errors["USERPROFIL_NAME"] = "Seules les lettres, les espaces et les tirets sont autorisés dans le champ Nom";
    }
    // Contrôle du prénom
    if (empty($_POST["USERPROFIL_FIRSTNAME"])) {
        $errors["USERPROFIL_FIRSTNAME"] = "Champ obligatoire";
    } elseif (!preg_match("/^[a-zA-ZÀ-ÿ -]*$/", $_POST["USERPROFIL_FIRSTNAME"])) {
        $errors["USERPROFIL_FIRSTNAME"] = "Seules les lettres, les espaces et les tirets sont autorisés dans le champ Prénom";
    }
    // Contrôle du pseudo
    if (empty($_POST["USERPROFIL_PSEUDO"])) {
        $errors["USERPROFIL_PSEUDO"] = "Champ obligatoire";
    } elseif (!preg_match("/^[a-zA-ZÀ-ÿ\d]+$/", $_POST["USERPROFIL_PSEUDO"])) {
        $errors["USERPROFIL_PSEUDO"] = "Seules les lettres et les chiffres sont autorisés dans le champ Pseudo";
    } elseif (strlen($_POST["USERPROFIL_PSEUDO"]) < 6) {
        $errors["USERPROFIL_PSEUDO"] = "Le pseudo doit contenir au moins 6 caractères";
    } elseif (Userprofil::checkPseudoExists($_POST["USERPROFIL_PSEUDO"]) && $_POST["USERPROFIL_PSEUDO"] != $_SESSION["user"]["USERPROFIL_PSEUDO"]) {
        $errors["USERPROFIL_PSEUDO"] = 'Pseudo déjà utilisé';
    }
    // Contrôle de l'email 
    if (empty($_POST["USERPROFIL_MAIL"])) {
        $errors["USERPROFIL_MAIL"] = "Champ obligatoire";
    } elseif (!filter_var($_POST["USERPROFIL_MAIL"], FILTER_VALIDATE_EMAIL)) {
        $errors["USERPROFIL_MAIL"] = "Le format de l'adresse email n'est pas valide";
    } elseif (Userprofil::checkMailExists($_POST["USERPROFIL_MAIL"]) && $_POST["USERPROFIL_MAIL"] != $_SESSION["user"]["USERPROFIL_MAIL"]) {
        $errors["USERPROFIL_MAIL"] = 'Mail déjà utilisé';
    }
    // Contrôle de l'adresse
    if (empty($_POST["USERPROFIL_STREET_NAME"])) {
        $errors["USERPROFIL_STREET_NAME"] = "Champ obligatoire";
    }
    // Contrôle du complément d'adresse
    if (empty($_POST["USERPROFIL_ADITTIONAL_ADRESS"])) {
        $errors["USERPROFIL_ADITTIONAL_ADRESS"] = "Champ obligatoire";
    }
    // Contrôle du code postal
    if (empty($_POST["USERPROFIL_ZIPCODE"])) {
        $errors["USERPROFIL_ZIPCODE"] = "Champ obligatoire";
    }
    // Contrôle de la ville
    if (empty($_POST["USERPROFIL_CITY"])) {
        $errors["USERPROFIL_CITY"] = "Champ obligatoire";
    }
    // Contrôle du numéro de téléphone
    if (empty($_POST["USERPROFIL_PHONE"])) {
        $errors["USERPROFIL_PHONE"] = "Champ obligatoire";
    }
    // Si des erreurs sont détectées, redirigez l'utilisateur vers le formulaire avec les erreurs
    if (empty($errors)) {
        try {
            Userprofil::updateProfil($USERPROFIL_ID, $new_street, $new_name, $new_firstname, $new_pseudo, $new_email, $new_additionnal, $new_zipcode, $new_city, $new_phone);
            $_SESSION['user']['USERPROFIL_NAME'] = $new_name;
            $_SESSION['user']['USERPROFIL_FIRSTNAME'] = $new_firstname;
            $_SESSION['user']['USERPROFIL_PSEUDO'] = $new_pseudo;
            $_SESSION['user']['USERPROFIL_MAIL'] = $new_email;
            $_SESSION['user']['USERPROFIL_PHONE'] = $new_phone;
            $_SESSION['user']['USERPROFIL_STREET_NAME'] = $new_street;
            $_SESSION['user']['USERPROFIL_ADITTIONAL_ADRESS'] = $new_additionnal;
            $_SESSION['user']['USERPROFIL_ZIPCODE'] = $new_zipcode;
            $_SESSION['user']['USERPROFIL_CITY'] = $new_city;
        } catch (Exception $e) {
            echo "Erreur lors de la mise à jour du profil : " . $e->getMessage();
        }
        // Redirigez l'utilisateur vers la page du profil après la mise à jour
        header("Location: ../controllers/controller-profil.php");
        exit();
    }
}



// Supprimer le profil entreprise
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_profile'])) {
    $delete_result = Userprofil::deleteUser($USERPROFIL_ID);
    if ($delete_result === true) {
        header("Location: controller-signin.php");
        exit();
    } else {
        echo "Erreur lors de la suppression du profil : " . $delete_result;
        exit();
    }
}
// Inclure la vue home uniquement si l'utilisateur est connecté
include_once '../views/view-profil.php';