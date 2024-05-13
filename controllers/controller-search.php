<?php


// Empêche l'accès à la page home si l'utilisateur n'est pas connecté et vérifie si la session n'est pas déjà active
if (session_status() === PHP_SESSION_NONE) {
    // Si non, démarrer la session
    session_start();
}

require_once '../config.php';
require_once '../models/Stones.php'; 

// Vérifie si le formulaire de recherche a été soumis
if(isset($_GET['search'])) {
    // Récupère le nom de la pierre depuis le formulaire
    $search_term = $_GET['search'];
    $results = Stones::searchStones($search_term);
} else {
    // Gérer le cas où le paramètre 'search' n'est pas défini
    $search_term = ""; // ou une autre valeur par défaut
    $results = array(); // ou un tableau vide
}


include_once '../views/view-search.php';
?>



