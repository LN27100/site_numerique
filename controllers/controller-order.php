<?php
require_once '../config.php';
require_once '../models/Stones.php';

// Démarrez la session
session_start();

// Récupère le pseudo de l'utilisateur
$name = isset($_SESSION['user']['USERPROFIL_NAME']) ? ($_SESSION['user']['USERPROFIL_NAME']) : "Nom non défini";
$firstname = isset($_SESSION['user']['USERPROFIL_FIRSTNAME']) ? ($_SESSION['user']['USERPROFIL_FIRSTNAME']) : "Prénom non défini";

// Vérifier si l'action est définie et égale à 'view_order'
if (isset($_POST['action']) && $_POST['action'] === 'view_order') {
    // Vérifier si les IDs des produits sont envoyés depuis le formulaire
    if (isset($_POST['product_ids'])) {
        // Récupérer les IDs des produits depuis le formulaire
        $product_ids = explode(',', $_POST['product_ids']);

        // Initialiser un tableau pour stocker les détails de la commande
        $order_details = array();

        // Initialiser le montant total de la commande
$total_order_amount = 0;

// Boucler à travers chaque ID de produit pour obtenir les détails
foreach ($product_ids as $product_id) {
    // Récupérer les détails du produit depuis le modèle
    $product_details = Stones::getAllStones($product_id);
    
    // Récupérer la quantité commandée depuis la session
    $quantity_ordered = isset($_SESSION['cart'][$product_id]['quantity']) ? $_SESSION['cart'][$product_id]['quantity'] : 0;
    
    // Si les détails sont récupérés avec succès, les ajouter au tableau des détails de la commande
    if ($product_details) {
        // Calculer le montant total par produit
        $total_per_product = $product_details[0]['PRODUCT_UNIT_PRICE'] * $quantity_ordered;
        $product_details[0]['quantity_ordered'] = $quantity_ordered;
        $product_details[0]['total_per_product'] = $total_per_product;
        $order_details[] = $product_details[0];
        
        // Ajouter le montant total de chaque produit au montant total de la commande
        $total_order_amount += $total_per_product;
    }
}

    }

    // Inclure la vue view-order.php
    include_once '../views/view-order.php';
}
