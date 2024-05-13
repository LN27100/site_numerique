<?php
// Empêche l'accès à la page home si l'utilisateur n'est pas connecté et vérifie si la session n'est pas déjà active
if (session_status() === PHP_SESSION_NONE) {
    // Si non, démarrer la session
    session_start();
}

require_once '../config.php';
require_once '../models/Userprofil.php';
require_once '../models/Stones.php';


// Récupère le nom et prénom de l'utilisateur
$name = isset($_SESSION['user']['USERPROFIL_NAME']) ? ($_SESSION['user']['USERPROFIL_NAME']) : "Nom non défini";
$firstname = isset($_SESSION['user']['USERPROFIL_FIRSTNAME']) ? ($_SESSION['user']['USERPROFIL_FIRSTNAME']) : "Prénom non défini";


// Inclure la vue home uniquement si l'utilisateur est connecté
include_once '../views/view-home.php';
?>