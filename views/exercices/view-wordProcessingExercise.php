<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/assets/css/style.css">

    <title>Exercices</title>
</head>

<body>
    <header id="top">
        <?php include '../templates/header.php'; ?>
    </header>


    <h1>Exercices de traitement de texte</h1>


    <div class="container">
        <div class="row">
            <?php foreach ($blueStones as $stone) { ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-image">
                            <img src="/assets/img/<?php echo $stone['PRODUCT_PICTURE']; ?>" alt="Image de <?php echo $stone['PRODUCT_NAME']; ?>">
                            <a href="../controllers/controller-seemore.php?product_id=<?php echo isset($stone['PRODUCT_ID']) ? $stone['PRODUCT_ID'] : ''; ?>" class="btn-view-more"><i class="bi bi-plus"></i></a>
                        </div>
                        <div class="card-details">
                            <h2><?php echo $stone['PRODUCT_NAME']; ?></h2>
                            <p>Prix : <?php echo $stone['PRODUCT_UNIT_PRICE']; ?> €</p>
                            <p>Quantité en stock : <?php echo $stone['PRODUCT_STOCK']; ?></p>
                            <button class="btn-add-to-cart" data-id="<?php echo $stone['PRODUCT_ID']; ?>" data-name="<?php echo $stone['PRODUCT_NAME']; ?>" data-price="<?php echo $stone['PRODUCT_UNIT_PRICE']; ?>" data-picture="<?php echo $stone['PRODUCT_PICTURE']; ?>"><i class="bi bi-cart-fill"></i> Ajouter au panier</button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>



    <footer>
        <?php include '../templates/footer.php'; ?>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="/assets/js/script.js"></script>

    
    
</body>

</html>