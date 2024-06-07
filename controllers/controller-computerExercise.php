<?php
// connexion à la bdd
require_once '../config.php';
require_once '../models/Pdf.php';

// Récupération des PDF avec les ID spécifiques
$pdfs = Pdf::getByIds([10]);

// inclure la vue
include_once '../views/exercices/view-computerExercise.php';
?>
