<?php

// connexion à la bdd
require_once '../config.php';
require_once '../models/Pdf.php';

// Récupération des PDF avec les ID spécifiques
$pdfs = Pdf::getByIds([12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22,24]);

include_once '../views/exercices/view-sheetExercise.php';
?>