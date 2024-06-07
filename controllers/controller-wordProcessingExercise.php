<?php
// connexion à la bdd
require_once '../config.php';
require_once '../models/Pdf.php';

// Récupération des PDF avec les ID spécifiques
$pdfs = Pdf::getByIds([25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35]);

// inclure la vue
include_once '../views/exercices/view-wordProcessingExercise.php';
?>
