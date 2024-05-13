<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/assets/css/style.css">

    <title>Accueil Dream Stones</title>
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


    <h1>Historique de vos commandes <?php echo $firstname . ' ' . $name; ?></h1>


      <!-- Popup confirmation suppression -->
      <div id="popupConfirm" class="popup-confirm">
                <div class="popup-content">
                    <p id="deleteText"></p>
                    <form id="deleteForm" action="../controllers/controller-historycom.php" method="POST">
                        <input type="hidden" name="ORDERS_ID" id="ORDERS_ID" value="">
                        <div class="btn-container">
                            <button id="btn-accept" class="btnYes" type="submit">Oui</button>
                            <button id="btn-cancel" class="btnNo">Non</button>
                        </div>
                    </form>
                </div>
            </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Référence commande</th>
                    <th>Date de commande</th>
                    <th>Statuts de la commande</th>
                    <th>Montant de la commande</th>
                    <th>Annuler la commande</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($order_details as $order) : ?>
                    <tr>
                        <td><?php echo isset($order['ORDERS_REF']) ? $order['ORDERS_REF'] : ''; ?></td>
                        <td><?php echo isset($order['ORDERS_DATE_FR']) ? $order['ORDERS_DATE_FR'] : ''; ?></td>
                        <td><?php echo isset($order['ORDER_STATUS']) ? $order['ORDER_STATUS'] : ''; ?></td>
                        <td><?php echo isset($order['ORDERS_TOTAL_PRICE']) ? $order['ORDERS_TOTAL_PRICE'] . '€' : ''; ?></td>
                        <td>
                            <form action="" method="post">
                                <input class="suppRide" type="hidden" name="ORDERS_ID" value="<?= $order['ORDERS_ID'] ?>">
                                <button class="btnSupp" type="submit">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>


            </tbody>
        </table>
    </div>


    <footer>
        <?php include '../templates/footer.php'; ?>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="/assets/js/script.js"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
        let popupConfirm = document.getElementById("popupConfirm");
        let btnCancel = document.getElementById("btn-cancel");
        let btnDelete = document.querySelectorAll(".btnSupp");
        let orderIdInput = document.getElementById("ORDERS_ID");
        let deleteText = document.getElementById("deleteText");

        // Cache le pop-up de confirmation au chargement de la page
        popupConfirm.style.display = "none";

        btnDelete.forEach(function(button) {
            button.addEventListener("click", function(event) {
                event.preventDefault();
                let orderId = button.parentElement.querySelector('input[type="hidden"]').value;
                let orderStatus = button.closest("tr").querySelector("td:nth-child(3)").innerText;

                // Vérifie si le statut de la commande est "validé"
                if (orderStatus.trim() === "validée") {
                    // Affiche une alerte côté client
                    alert("La suppression de cette commande n'est pas autorisée car son statut est déjà validé.");
                } else {
                    // Si le statut n'est pas "validé", affiche le pop-up de confirmation
                    let orderRef = button.closest("tr").querySelector("td:first-child").innerText;
                    let orderDate = button.closest("tr").querySelector("td:nth-child(2)").innerText;

                    orderIdInput.value = orderId;
                    deleteText.innerHTML = "<b>Annuler cette commande ?</b> </br>" + orderRef + "</br>" + orderDate;
                    popupConfirm.style.display = "block"; // Affiche le pop-up de confirmation
                }
            });
        });

        btnCancel.addEventListener("click", function(event) {
            event.preventDefault(); // Empêche le formulaire de soumettre ses données
            popupConfirm.style.display = "none"; // Masque le pop-up de confirmation lorsque "Non" est cliqué
        });

        window.onclick = function(event) {
            if (event.target == popupConfirm) {
                popupConfirm.style.display = "none"; // Masque le pop-up de confirmation lorsque l'utilisateur clique en dehors du pop-up
            }
        };
    });
</script>


</body>

</html>