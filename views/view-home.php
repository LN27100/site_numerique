<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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

    <!-- Affichage du prénom et nom lorsque l'utilisateur est connecté -->
    <div class="container4 <?php echo isset($_SESSION['user']) ? '' : 'hidden'; ?>">
        <?php echo "<h3>Bienvenue $firstname $name </h3>"; ?>
    </div>

    <h1>PIERRE DU MOMENT</h1>

    <div class="container card-container">
        <div class="outer-border">
            <div class="mid-border">
                <div class="inner-border">
                    <div class="text carousel-text">
                        <h3>La malachite</h3>
                    </div>
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/assets/img/malachite.jpg" class="d-block" alt="Image 1">
                            </div>
                            <div class="carousel-item">
                                <img src="/assets/img/malachite2.jpg" class="d-block" alt="Image 2">
                            </div>
                            <div class="carousel-item">
                                <img src="/assets/img/malachite3.jpg" class="d-block" alt="Image 3">
                            </div>
                            <div class="carousel-item">
                                <img src="/assets/img/malachite4.jpg" class="d-block" alt="Image 4">
                            </div>
                            <div class="carousel-item">
                                <img src="/assets/img/malachite5.jpg" class="d-block" alt="Image 5">
                            </div>
                            <div class="carousel-item">
                                <img src="/assets/img/malachite6.jpg" class="d-block" alt="Image 6">
                            </div>
                            <div class="carousel-item">
                                <img src="/assets/img/malachite7.jpg" class="d-block" alt="Image 7">
                            </div>
                            <div class="carousel-item">
                                <img src="/assets/img/malachite8.jpg" class="d-block" alt="Image 8">
                            </div>
                            <div class="carousel-item">
                                <img src="/assets/img/malachite9.jpg" class="d-block" alt="Image 9">
                            </div>
                            <div class="carousel-item">
                                <img src="/assets/img/malachite10.jpg" class="d-block" alt="Image 10">
                            </div>
                            <div class="carousel-item">
                                <img src="/assets/img/malachite11.jpg" class="d-block" alt="Image 11">
                            </div>
                            <div class="carousel-item">
                                <img src="/assets/img/malachite12.jpg" class="d-block" alt="Image 12">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <div class="text carousel-text">
                        <p>Aujourd'hui nous allons parler de la malachite. Une pierre verte très originale de par ses dessins. Elle possède de nombreuses vertus tant physiques, émotionnelles que spirituelles. Côté physique, elle soutient les maladies articulaires et inflammatoires en soulageant les douleurs liées à celles-ci.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <footer>
        <?php include '../templates/footer.php'; ?>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="/assets/js/script.js"></script>


</body>

</html>