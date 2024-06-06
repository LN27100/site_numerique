<?php
// connexion à la bdd et à l'entité pdf
require_once '../config.php';
require_once '../models/Pdf.php';

// Récupération des PDF avec les ID spécifiques
// $pdfs = Pdf::getByIds([]);

// inclure la vue
include_once '../views/pdf/view-pdfPresentation.php';
?>
