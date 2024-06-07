<?php
// connexion à la bdd
require_once '../config.php';
require_once '../models/Pdf.php';

// Récupération des PDF avec les ID spécifiques
$pdfs = Pdf::getByIds([2, 3, 4, 5, 6, 7, 8, 9, 53, 57, 58, 59, 60, 61]);

// inclure la vue
include_once '../views/exercices/view-solutions.php';


?>
