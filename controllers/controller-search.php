<?php

// connexion à la bdd
require_once '../config.php';
require_once '../models/Pdf.php';

// Vérifier si une recherche a été effectuée
$search_results = [];
if (isset($_GET['search'])) {
    $search = htmlspecialchars($_GET['search']);
    $search_results = Pdf::searchByKeyword($search);
}

// Inclure la vue et passer les résultats de recherche
include_once '../views/view-search.php';
?>
