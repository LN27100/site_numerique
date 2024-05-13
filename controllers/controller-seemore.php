<?php
// Empêche l'accès à la page home si l'utilisateur n'est pas connecté et vérifie si la session n'est pas déjà active
if (session_status() === PHP_SESSION_NONE) {
    // Si non, démarrer la session
    session_start();
}

require_once '../config.php';
require_once __DIR__ . '/../models/Stones.php';



// Vérifier si un ID de pierre est passé via l'URL
if (isset($_GET['product_id'])) {
    // Récupérer l'ID de la pierre depuis l'URL
    $product_id = $_GET['product_id'];

    // Utiliser le modèle Stones pour obtenir les détails de la pierre spécifiée par l'ID
    $stoneDetails = Stones::getAllStones($product_id);

    // Vérifier si les détails de la pierre ont été récupérés avec succès
    if ($stoneDetails) {
        // Passer les détails de la pierre à la vue view_seemore.php pour affichage
        include_once '../views/view-seemore.php';
    } else {
        // Gérer le cas où aucune pierre n'est trouvée avec l'ID spécifié
        echo "<p>Aucune pierre trouvée avec l'ID spécifié.</p>";
    }
} else {
    // Si aucun ID de pierre n'est passé, rediriger l'utilisateur vers une autre page ou afficher un message d'erreur
    header("Location: /error.php");
    exit;
}
?>
