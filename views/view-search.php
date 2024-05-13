<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/assets/css/style.css">

    <title>Pierres par couleur</title>
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

    <h1>Résultat de la recherche</h1>

    <!-- Container pour afficher les résultats de la recherche -->
    <div id="search-results" class="container">
        <?php $count = 0; ?>
        <?php foreach ($results as $stone) : ?>
            <?php if ($count % 4 == 0) : ?>
                <div class="row">
            <?php endif; ?>
            <div class="col-4">
                <div class="card result-card">
                <h3><?php echo $stone['PRODUCT_NAME']; ?></3>

                    <div class="card-image">
                        <img src="/assets/img/<?php echo $stone['PRODUCT_PICTURE']; ?>" alt="Image de la pierre">
                    </div>
                    <div class="card-body">
                        <p><span class="styleProfil">Description:</span> <?php echo $stone['PRODUCT_DESC']; ?></p>
                        <p><span class="styleProfil">Référence:</span> <?php echo $stone['PRODUCT_REF']; ?></p>
                        <p><span class="styleProfil">Couleur:</span> <?php echo $stone['PRODUCT_COLOR']; ?></p>
                        <p><span class="styleProfil">Catégorie :</span> <?php echo $stone['TYPE_CATEGORY']; ?></p>
                        <p><span class="styleProfil">Quantité en stock:</span> <?php echo $stone['PRODUCT_STOCK']; ?></p>
                        <p><span class="styleProfil">Pays de provenance:</span> <?php echo $stone['PRODUCT_ORIGIN_COUNTRY']; ?></p>
                        <p><span class="styleProfil">Prix:</span> <?php echo $stone['PRODUCT_UNIT_PRICE']; ?> €</p>
                        <button class="btn-add-to-cart" data-id="<?php echo $stone['PRODUCT_ID']; ?>" data-name="<?php echo $stone['PRODUCT_NAME']; ?>" data-price="<?php echo $stone['PRODUCT_UNIT_PRICE']; ?>" data-picture="<?php echo $stone['PRODUCT_PICTURE']; ?>"><i class="bi bi-cart-fill"></i> Ajouter au panier</button>
                    </div>
                </div>
            </div>
            <?php $count++; ?>
            <?php if ($count % 4 == 0 || $count == count($results)) : ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php if (empty($results)) : ?>
            <p>Aucun résultat trouvé.</p>
        <?php endif; ?>
    </div>

    <footer>
        <?php include '../templates/footer.php'; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="/assets/js/script.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('#search-form');
            const input = document.querySelector('#search-input');
            const resultContainer = document.querySelector('#search-results');

            form.addEventListener('submit', function(event) {
                event.preventDefault();
                const searchTerm = input.value.trim();

                // Envoie une requête AJAX pour récupérer les résultats de recherche
                fetch(`/controllers/controller-search.php?search=${searchTerm}`)
                    .then(response => response.json())
                    .then(data => {
                        // Efface les résultats précédents
                        resultContainer.innerHTML = '';

                        if (data.length > 0) {
                            // Affiche les résultats de la recherche
                            data.forEach(stone => {
                                const card = document.createElement('div');
                                card.innerHTML = `
                                <div class="card result-card" style="width: 70rem;">
                                    <div class="card-image">
                                        <img src="/assets/img/${stone.PRODUCT_PICTURE}" alt="Image de la pierre">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">${stone.PRODUCT_NAME}</h5>
                                        <p class="card-text">${stone.PRODUCT_DESC}</p>
                                        <p><span class="styleProfil">Référence:</span> ${stone.PRODUCT_REF}</p>
                                        <p><span class="styleProfil">Couleur:</span> ${stone.PRODUCT_COLOR}</p>
                                        <p><span class="styleProfil">Catégorie :</span> ${stone.TYPE_CATEGORY}</p>
                                        <p><span class="styleProfil">Quantité en stock:</span> ${stone.PRODUCT_STOCK}</p>
                                        <p><span class="styleProfil">Pays de provenance:</span> ${stone.PRODUCT_ORIGIN_COUNTRY}</p>
                                        <p><span class="styleProfil">Prix:</span> ${stone.PRODUCT_UNIT_PRICE} €</p>
                                        <button class="btn-add-to-cart" data-id="<?php echo 'PRODUCT_ID'; ?>" data-name="
                                    </div>
                                </div>`;
                                resultContainer.appendChild(card);
                            });
                        } else {
                            // Affiche un message si aucun résultat n'est trouvé
                            resultContainer.innerHTML = '<p>Aucun résultat trouvé.</p>';
                        }
                    })
                    .catch(error => console.error('Erreur lors de la recherche :', error));
            });
        });

   


    </script>

</body>

</html>
