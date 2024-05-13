<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/assets/css/style.css">

    <title>Dream Stones - voir plus</title>
</head>

<body>
    <header id="top">
        <?php include '../templates/header.php'; ?>
    </header>


    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title text-light" id="offcanvasExampleLabel">Votre panier</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <!-- PANIER COTE -->
        <div id="cart">
            <div class="product border border-light d-flex" data-id="1">
                <div class="offcanvas-body">
                    <div>
                        <div class="row">
                            <div class="col-md-6">
                                <div id="cartItems"></div>
                                <p class="text-light">Total : €<span id="cartTotal">0.00</span></p>
                            </div>
                        </div>
                    </div>
                    <form id="orderForm" action="/controllers/controller-order.php" method="post">
                        <input type="hidden" name="action" value="view_order">
                        <input type="hidden" name="product_ids" id="productIds">
                        <button type="button" class="btn2" onclick="commander()">Commander</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- Bouton retour à la page précédente -->
    <button onclick="goBack()" class="btn-back">Retour</button>

    <?php
    // Vérifiez si les détails de la pierre sont définis et non vides
    if (!empty($stoneDetails)) {
    ?>
        <h1><?php echo $stoneDetails[0]['PRODUCT_NAME']; ?></h1>
        <div class="card2">
            <div class="card-image2">
                <img src="/assets/img/<?php echo $stoneDetails[0]['PRODUCT_PICTURE']; ?>" alt="Image de la pierre">
            </div>
            <div class="card-details">
                <p><span class="styleProfil">Description:</span> <?php echo $stoneDetails[0]['PRODUCT_DESC']; ?></p>
                <p><span class="styleProfil">Référence:</span> <?php echo $stoneDetails[0]['PRODUCT_REF']; ?></p>
                <p><span class="styleProfil">Couleur:</span> <?php echo $stoneDetails[0]['PRODUCT_COLOR']; ?></p>
                <p><span class="styleProfil">Catégorie :</span> <?php echo $stoneDetails[0]['TYPE_CATEGORY']; ?></p>
                <p><span class="styleProfil">Quantité en stock:</span> <?php echo $stoneDetails[0]['PRODUCT_STOCK']; ?></p>
                <p><span class="styleProfil">Pays de provenance:</span>  <?php echo $stoneDetails[0]['PRODUCT_ORIGIN_COUNTRY']; ?></p>
                
                <p><span class="styleProfil">Prix:</span> <?php echo $stoneDetails[0]['PRODUCT_UNIT_PRICE']; ?> €</p>

                <button class="btn-add-to-cart" data-id="<?php echo 'PRODUCT_ID'; ?>" data-name="<?php echo 'PRODUCT_NAME'; ?>" data-price="<?php echo 'PRODUCT_UNIT_PRICE'; ?>" data-picture="<?php echo 'PRODUCT_PICTURE'; ?>"><i class="bi bi-cart-fill"></i> Ajouter au panier</button>
            </div>
        </div>
    <?php
    } else {
        // Afficher un message si les détails de la pierre ne sont pas disponibles
        echo "<p>Aucun détail de pierre disponible.</p>";
    }
    ?>


    <footer>
        <?php include '../templates/footer.php'; ?>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="/assets/js/script.js"></script>

    <script>
    // Fonction pour revenir à la page précédente
    function goBack() {
        window.history.back();
    }
</script>

</body>

</html>