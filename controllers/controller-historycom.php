<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupère l'identifiant de la commande à supprimer depuis le formulaire POST
    $ORDERS_ID = isset($_POST['ORDERS_ID']) ? intval($_POST['ORDERS_ID']) : 0;

    // Vérifie si l'identifiant de la balade est valide (supérieur à 0)
    if ($ORDERS_ID > 0) {

        // Inclut les fichiers de configuration et le modèle Ride
        require_once '../config.php';
        require_once __DIR__ . '/../models/Stones.php';

        // Appelle la méthode statique pour supprimer la balade
        Stones::deleteOrder($ORDERS_ID);
    }

    // Redirige l'utilisateur vers la page d'historique après la suppression
    header("Location: ../controllers/controller-historycom.php");

    // Termine l'exécution du script pour éviter toute exécution supplémentaire après la redirection
    exit();
}

// Empêche l'accès à la page home si l'utilisateur n'est pas connecté et vérifie si la session n'est pas déjà active
if (session_status() === PHP_SESSION_NONE) {
    // Si non, démarrer la session
    session_start();
}

require_once '../config.php';
require_once __DIR__ . '/../models/Userprofil.php';
require_once __DIR__ . '/../models/Stones.php';


// Récupère le nom et prénom de l'utilisateur
$name = isset($_SESSION['user']['USERPROFIL_NAME']) ? ($_SESSION['user']['USERPROFIL_NAME']) : "Nom non défini";
$firstname = isset($_SESSION['user']['USERPROFIL_FIRSTNAME']) ? ($_SESSION['user']['USERPROFIL_FIRSTNAME']) : "Prénom non défini";

$USERPROFIL_ID = isset($_SESSION['user']['USERPROFIL_ID']) ? $_SESSION['user']['USERPROFIL_ID'] : null;
$order_details = Stones::getAllOrders($USERPROFIL_ID);

// Inclure la vue home uniquement si l'utilisateur est connecté
include_once '../views/view-historycom.php';
?>