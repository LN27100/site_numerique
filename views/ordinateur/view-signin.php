<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/style.css">

    <title>Connexion Dream Stones</title>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

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

    <h1>Veuillez vous connecter</h1>
    <div class="container2">
        <form class="row" method="POST" action="../controllers/controller-signin.php" novalidate>

            <div class="form-group col-md-6">
                <label for="email" class="form-label">Email : </label>
                <input type="email" class="form-control <?php if (isset($errors['email'])) echo 'is-invalid'; ?>" id="validationServerEmail" name="email" placeholder="adresse email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" required>
                <div class="invalid-feedback" id="emailValidationFeedback">
                    <?php
                    echo isset($errors['email']) ? $errors['email'] : "Champ obligatoire";
                    ?>
                </div>
            </div>

            <div class="form-group col-md-12">
                <label for="password-input" class="form-label">Mot de passe : </label>
                <div class="input-group d-flex position-relative">
                    <input type="password" class="form-control rounded mt-1 password-input <?php if (isset($errors['mot_de_passe'])) echo 'is-invalid'; ?>" name="mot_de_passe" placeholder="Votre mot de passe" aria-label="password" aria-describedby="password" id="validationServerPassword">
                    <i class="bi bi-eye password-toggle-icon" onclick="togglePasswordVisibility()"></i>
                    <div class="invalid-feedback" id="passwordValidationFeedback">
                        <?php
                        echo isset($errors['mot_de_passe']) ? $errors['mot_de_passe'] : "Champ obligatoire";
                        ?>
                    </div>
                </div>
            </div>


            <div class="text-center">

                <!-- reCaptcha -->
                <div class="g-recaptcha" data-sitekey="6Lc5hHwpAAAAALpMporAgrWut8AzcGscZTSTcFml"></div>
                <?php
                if (isset($errors['recaptcha'])) {
                ?>
                    <p class="recaptchas"><?= $errors['recaptcha']; ?></p>
                <?php
                }
                ?>

                <button class="button" type="submit" id="submitButton">Se connecter</button>
            </div>

            <div class="pushbottom text-center">
                <p>Pas encore membre?</p>
                <a href="../controllers/controller-signup.php">Inscrivez-vous!</a>
            </div>

        </form>

    </div>

    <footer>
        <?php include '../templates/footer.php'; ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="/assets/js/script.js"></script>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('validationServerPassword');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }
    </script>
</body>

</html>