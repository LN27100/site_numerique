<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/assets/css/style.css">

    <title>Récapitulatif de commande Dream Stones</title>
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
    </div>


    <h1>Récapitulatif de votre commande <?php echo $firstname . ' ' . $name; ?></h1>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>photo du produit</th>
                    <th>Nom du produit</th>
                    <th>Prix unitaire</th>
                    <th>Quantité commandée</th>
                    <th>Prix total par produit</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($order_details as $product) : ?>
                    <tr>
                        <td><?php echo isset($product['PRODUCT_PICTURE']) ? '<img src="/assets/img/' . $product['PRODUCT_PICTURE'] . '" alt="' . $product['PRODUCT_NAME'] . '">' : ''; ?></td>
                        <td><?php echo $product['PRODUCT_NAME']; ?></td>
                        <td><?php echo isset($product['PRODUCT_UNIT_PRICE']) ? $product['PRODUCT_UNIT_PRICE'] . '€' : ''; ?></td>
                        <td><?php echo "<p>{$product['quantity_ordered']}</p>"; ?></td>
                        <td><?php echo isset($product['total_per_product']) ? $product['total_per_product'] . '€' : ''; ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <!-- montant total de la commande -->
                    <td colspan="1"><strong>Total de la commande</strong></td>
                    <td><?php echo number_format($total_order_amount, 2) . '€'; ?>
                    </td>
                </tr>

            </tbody>
        </table>
        <tr>
            <td class="fictive1"></td>
            <button id="validateOrderBtn">Valider ma commande</button>
        </tr>
    </div>


    <footer>
        <?php include '../templates/footer.php'; ?>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="/assets/js/script.js"></script>


    <script>
        function validateOrder() {
            // Fonction pour vérifier si l'utilisateur est connecté
            // Fonction pour vérifier si l'utilisateur est connecté
            function isLoggedIn() {
                return <?php echo isset($_SESSION['user']) ? 'true' : 'false'; ?>;
            }

            // Vérifie si l'utilisateur est connecté
            if (isLoggedIn()) {
                // Si l'utilisateur est connecté, effectuez l'action de validation de la commande
                window.location.href = "/controllers/controller-validateorder.php";
            } else {
                // Si l'utilisateur n'est pas connecté, affichez une boîte de dialogue modale
                var response = confirm("Vous devez être connecté pour valider votre commande. Voulez-vous vous connecter ou vous inscrire ?");
                if (response === true) {
                    // Redirigez l'utilisateur vers la page de connexion ou d'inscription
                    window.location.href = "controller-signin.php";
                }
            }
        }

        // Ajoutez un écouteur d'événements au bouton de validation de commande
        document.getElementById("validateOrderBtn").addEventListener("click", validateOrder);
    </script>

</body>

</html>