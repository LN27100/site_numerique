<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/style.css">

    <title>Inscription Dream Stones</title>

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


    <?php if ($showform) : ?>
        <h1>Formulaire d'inscription</h1>
    <?php endif; ?>

    <div class="container">
        <?php
        if ($showform) {
        ?>
            <form class="row " method="POST" action="../controllers/controller-signup.php" novalidate>

                <div class="col-md-4">
                    <label for="validationServer01" class="form-label">Nom: </label>
                    <input type="text" class="form-control <?php if (isset($errors['userprofil_name'])) echo 'is-invalid'; ?>" id="validationServer01" name="userprofil_name" placeholder="ex.Poirier-Halley" value="<?= isset($_POST['userprofil_name']) ? htmlspecialchars($_POST['userprofil_name']) : '' ?>" required>
                    <div class="invalid-feedback" id="nomValidationFeedback">
                        <?php
                        if (isset($errors['userprofil_name'])) {
                            echo $errors['userprofil_name'];
                        }
                        ?></div>
                </div>

                <div class="col-md-4">
                    <label for="validationServer02" class="form-label">Prénom: </label>
                    <input type="text" class="form-control <?php if (isset($errors['userprofil_firstname'])) echo 'is-invalid'; ?>" id="validationServer02" name="userprofil_firstname" placeholder="ex.Hélène" value="<?= isset($_POST['userprofil_firstname']) ? htmlspecialchars($_POST['userprofil_firstname']) : '' ?>" required>
                    <div class="invalid-feedback" id="prenomValidationFeedback">
                        <?php
                        if (isset($errors['userprofil_firstname'])) {
                            echo $errors['userprofil_firstname'];
                        }
                        ?></div>
                </div>

                <div class="col-md-4">
                    <label for="validationServer03" class="form-label">Pseudo: </label>
                    <input type="text" class="form-control <?php if (isset($errors['userprofil_pseudo'])) echo 'is-invalid'; ?>" id="validationServer03" name="userprofil_pseudo" pattern="^[a-zA-ZÀ-ÿ\d]*$" placeholder="ex.LNwarrior" value="<?= isset($_POST['userprofil_pseudo']) ? htmlspecialchars($_POST['userprofil_pseudo']) : '' ?>" required>
                    <div class="invalid-feedback" id="pseudoValidationFeedback">
                        <?php
                        if (isset($errors['userprofil_pseudo'])) {
                            echo $errors['userprofil_pseudo'];
                        }
                        ?>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="validationServer02" class="form-label">Adresse: </label>
                    <input type="text" class="form-control <?php if (isset($errors['userprofil_street_name'])) echo 'is-invalid'; ?>" id="validationServer02" name="userprofil_street_name" placeholder="ex.Hélène" value="<?= isset($_POST['userprofil_street_name']) ? htmlspecialchars($_POST['userprofil_street_name']) : '' ?>" required>
                    <div class="invalid-feedback" id="prenomValidationFeedback">
                        <?php
                        if (isset($errors['userprofil_street_name'])) {
                            echo $errors['userprofil_street_name'];
                        }
                        ?></div>
                </div>

                <div class="col-md-4">
                    <label for="validationServer02" class="form-label">Complément d'adresse: </label>
                    <input type="text" class="form-control <?php if (isset($errors['userprofil_additional_adress'])) echo 'is-invalid'; ?>" id="validationServer02" name="userprofil_additional_adress" placeholder="ex.Hélène" value="<?= isset($_POST['userprofil_additional_adress']) ? htmlspecialchars($_POST['userprofil_additional_adress']) : '' ?>" required>
                    <div class="invalid-feedback" id="prenomValidationFeedback">
                        <?php
                        if (isset($errors['userprofil_additional_adress'])) {
                            echo $errors['userprofil_additional_adress'];
                        }
                        ?></div>
                </div>

                <div class="col-md-4">
                    <label for="validationServer02" class="form-label">Code postal: </label>
                    <input type="text" class="form-control <?php if (isset($errors['userprofil_zipcode'])) echo 'is-invalid'; ?>" id="validationServer02" name="userprofil_zipcode" placeholder="ex.Hélène" value="<?= isset($_POST['userprofil_zipcode']) ? htmlspecialchars($_POST['userprofil_zipcode']) : '' ?>" required>
                    <div class="invalid-feedback" id="prenomValidationFeedback">
                        <?php
                        if (isset($errors['userprofil_zipcode'])) {
                            echo $errors['userprofil_zipcode'];
                        }
                        ?></div>
                </div>

                <div class="col-md-4">
                    <label for="validationServer02" class="form-label">Ville: </label>
                    <input type="text" class="form-control <?php if (isset($errors['userprofil_city'])) echo 'is-invalid'; ?>" id="validationServer02" name="userprofil_city" placeholder="ex.Hélène" value="<?= isset($_POST['userprofil_city']) ? htmlspecialchars($_POST['userprofil_city']) : '' ?>" required>
                    <div class="invalid-feedback" id="prenomValidationFeedback">
                        <?php
                        if (isset($errors['userprofil_city'])) {
                            echo $errors['userprofil_city'];
                        }
                        ?></div>
                </div>

                <div class="col-md-4">
                    <label for="validationServer02" class="form-label">Téléphone: </label>
                    <input type="text" class="form-control <?php if (isset($errors['userprofil_phone'])) echo 'is-invalid'; ?>" id="validationServer02" name="userprofil_phone" placeholder="ex.Hélène" value="<?= isset($_POST['userprofil_phone']) ? htmlspecialchars($_POST['userprofil_phone']) : '' ?>" required>
                    <div class="invalid-feedback" id="prenomValidationFeedback">
                        <?php
                        if (isset($errors['userprofil_phone'])) {
                            echo $errors['userprofil_phone'];
                        }
                        ?></div>
                </div>

                <div class="form-group col-md-6">
                    <label for="email" class="form-label2">Email: </label>
                    <input type="email" class="form-control <?php if (isset($errors['userprofil_mail'])) echo 'is-invalid'; ?>" id="userprofil_mail" name="userprofil_mail" placeholder="adresse userprofil_mail" value="<?= isset($_POST['userprofil_mail']) ? htmlspecialchars($_POST['userprofil_mail']) : '' ?>" required>
                    <div class="invalid-feedback" id="emailValidationFeedback">
                        <?php
                        if (isset($errors['userprofil_mail'])) {
                            echo $errors['userprofil_mail'];
                        }
                        ?>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <label for="password-input" class="form-label2">Mot de passe: </label>
                    <div class="input-group d-flex">
                        <input type="password" class="form-control rounded mt-1 password-input <?php if (isset($errors['userprofil_password'])) echo 'is-invalid'; ?>" name="userprofil_password" placeholder="Votre mot de passe" aria-label="password" aria-describedby="password" id="password-input">
                        <div class="invalid-feedback" id="passwordValidationFeedback">
                            <?php
                            if (isset($errors['userprofil_password'])) {
                                echo $errors['userprofil_password'];
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="conditionPassword col-6 mt-4 mt-xxl-0 w-auto h-auto">
                    <div class="alert px-4 py-3 mb-0 d-none" role="alert" data-mdb-color="warning" id="password-alert">
                        <ul class="list-unstyled mb-0">
                            <div class="requirements leng">
                                <i class="bi bi-check text-success me-2 d-none"></i>
                                <i class="bi bi-x text-danger me-3"></i>
                                Votre mot de passe doit contenir au moins 8 caractères.
                            </div>
                            <div class="requirements big-letter">
                                <i class="bi bi-check text-success me-2 d-none"></i>
                                <i class="bi bi-x text-danger me-3"></i>
                                Votre mot de passe doit contenir une lettre majuscule.
                            </div>
                            <div class="requirements num">
                                <i class="bi bi-check text-success me-2 d-none"></i>
                                <i class="bi bi-x text-danger me-3"></i>
                                Votre mot de passe doit contenir un chiffre.
                            </div>
                            <div class="requirements special-char">
                                <i class="bi bi-check text-success me-2 d-none"></i>
                                <i class="bi bi-x text-danger me-3"></i>
                                Votre mot de passe doit contenir un caractère spécial.
                            </div>
                        </ul>
                    </div>
                </div>


                <div class="col-12 mt-4 mt-xxl-0  h-auto">
                    <div class="input-group d-flex">
                        <label for="confirm-password-input" class="form-label1">Confirmer Mot de passe:</label>
                        <input type="password" class="form-control rounded mt-1 password-input <?php if (isset($errors['conf_mot_de_passe'])) echo 'is-invalid'; ?>" name="conf_mot_de_passe" placeholder="Confirmez votre mot de passe" aria-label="confirm-password" aria-describedby="confirm-password" id="confirm-password-input" />
                        <div class="invalid-feedback" id="confirmPasswordValidationFeedback"></div>
                    </div>
                </div>


                <div class="texte form-check">
                    <input class="form-check-input" type="checkbox" value="on" id="cgu" name="cgu" required>
                    <label class="form-check-label" for="cgu">
                        J'accepte les conditions d'utilisation
                    </label>
                    <div class="invalid-feedback" id="cguValidationFeedback">Veuillez accepter les conditions d'utilisation</div>
                </div>



                <div class="text-center">

                    <button class="button" type="submit" id="submitButton">S'enregistrer</button>
                </div>

                <p class="returnConnexion">------------------------</p>

                <div class="text-center">
                <p>Déjà inscrit?</p>
                </div>

                <div class="text-center">
                    <a href="../controllers/controller-signin.php" class="buttonRetourCo">Connexion</a>
                </div>

            </form>


        <?php } else { ?>
            <h2>Inscription réussie</h2>
            <p><strong><em>Vous pouvez maintenant vous connecter.</em></strong></p>
            <a href="../controllers/controller-signin.php" class="button">Connexion</a>
        <?php } ?>

    </div>

    <footer>
        <?php include '../templates/footer.php'; ?>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="/assets/js/script.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            console.log("Le DOM est chargé. Le script fonctionne.");
            const password = document.getElementById("password-input");
            const confirmPassword = document.getElementById("confirm-password-input");
            const passwordAlert = document.getElementById("password-alert");
            const requirements = document.querySelectorAll(".requirements");
            const leng = document.querySelector(".leng");
            const bigLetter = document.querySelector(".big-letter");
            const num = document.querySelector(".num");
            const specialChar = document.querySelector(".special-char");
            requirements.forEach((element) => element.classList.add("wrong"));
            password.addEventListener("focus", () => {
                passwordAlert.classList.remove("d-none");
                if (!password.classList.contains("is-valid")) {
                    password.classList.add("is-invalid");
                }
            });
            password.addEventListener("input", () => {
                const value = password.value;
                const isLengthValid = value.length >= 8;
                const hasUpperCase = /[A-Z]/.test(value);
                const hasNumber = /\d/.test(value);
                const hasSpecialChar = /[!@#$%^&*()\[\]{}\\|;:'",<.>/?`~]/.test(value);
                leng.querySelector(".bi-x").classList.toggle("d-none", isLengthValid);
                leng.querySelector(".bi-check").classList.toggle("d-none", !isLengthValid);
                bigLetter.querySelector(".bi-x").classList.toggle("d-none", hasUpperCase);
                bigLetter.querySelector(".bi-check").classList.toggle("d-none", !hasUpperCase);
                num.querySelector(".bi-x").classList.toggle("d-none", hasNumber);
                num.querySelector(".bi-check").classList.toggle("d-none", !hasNumber);
                specialChar.querySelector(".bi-x").classList.toggle("d-none", hasSpecialChar);
                specialChar.querySelector(".bi-check").classList.toggle("d-none", !hasSpecialChar);
                const isPasswordValid = isLengthValid && hasUpperCase && hasNumber && hasSpecialChar;
                const isPasswordMatching = password.value === confirmPassword.value;
                if (confirmPassword.value.length > 0) {
                    if (isPasswordMatching) {
                        confirmPassword.classList.remove("is-invalid");
                        confirmPassword.classList.add("is-valid");
                        confirmPassword.nextElementSibling.classList.remove("invalid-feedback");
                        confirmPassword.nextElementSibling.classList.add("valid-feedback");
                    } else {
                        confirmPassword.classList.remove("is-valid");
                        confirmPassword.classList.add("is-invalid");
                        confirmPassword.nextElementSibling.classList.remove("valid-feedback");
                        confirmPassword.nextElementSibling.classList.add("invalid-feedback");
                    }
                }
                if (isPasswordValid) {
                    password.classList.remove("is-invalid");
                    password.classList.add("is-valid");
                    requirements.forEach((element) => {
                        element.classList.add("good");
                    });
                    passwordAlert.classList.remove("alert-warning");
                    passwordAlert.classList.add("alert-success");
                } else {
                    password.classList.remove("is-valid");
                    password.classList.add("is-invalid");
                    passwordAlert.classList.add("alert-warning");
                    passwordAlert.classList.remove("alert-success");
                }
            });
            confirmPassword.addEventListener("input", () => {
                const isPasswordMatching = password.value === confirmPassword.value;
                if (confirmPassword.value.length > 0) {
                    if (isPasswordMatching) {
                        confirmPassword.classList.remove("is-invalid");
                        confirmPassword.classList.add("is-valid");
                        confirmPassword.nextElementSibling.innerText = "Les mots de passe sont identiques";
                        confirmPassword.nextElementSibling.classList.remove("invalid-feedback");
                        confirmPassword.nextElementSibling.classList.add("valid-feedback");
                    } else {
                        confirmPassword.classList.remove("is-valid");
                        confirmPassword.classList.add("is-invalid");
                        confirmPassword.nextElementSibling.innerText = "Les mots de passe ne sont pas identiques";
                        confirmPassword.nextElementSibling.classList.remove("valid-feedback");
                        confirmPassword.nextElementSibling.classList.add("invalid-feedback");
                    }
                }
            });
            password.addEventListener("blur", () => {
                passwordAlert.classList.add("d-none");
            });
            const nomInput = document.getElementById("validationServer01");
            const prenomInput = document.getElementById("validationServer02");
            const pseudoInput = document.getElementById("validationServer03");
            const emailInput = document.getElementById("email");
            const nomFeedback = document.getElementById("nomValidationFeedback");
            const prenomFeedback = document.getElementById("prenomValidationFeedback");
            const pseudoFeedback = document.getElementById("pseudoValidationFeedback");
            const emailFeedback = document.getElementById("emailValidationFeedback");
         
            nomInput.addEventListener("input", function() {
                toggleValidity(nomInput, nomFeedback, /^[a-zA-ZÀ-ÿ -]*$/, "Seules les lettres, les espaces et les tirets sont autorisés dans le champ Nom");
            });
            prenomInput.addEventListener("input", function() {
                toggleValidity(prenomInput, prenomFeedback, /^[a-zA-ZÀ-ÿ -]*$/, "Seules les lettres, les espaces et les tirets sont autorisés dans le champ Prénom");
            });
    
            pseudoInput.addEventListener("input", function() {
                toggleValidity(pseudoInput, pseudoFeedback, /^[a-zA-ZÀ-ÿ\d]+$/, "Seules les lettres et les chiffres sont autorisés dans le champ Pseudo");
                if (pseudoInput.value.length < 6) {
                    formIsValid = false;
                    toggleValidity(pseudoInput, pseudoFeedback, null, "Le pseudo doit contenir au moins 6 caractères");
                }
            });

            emailInput.addEventListener("input", function() {
                var emailValue = emailInput.value;
                // vérifier la validité de l'email
                if (filter_var(emailValue, FILTER_VALIDATE_EMAIL)) {
                    emailInput.classList.remove("is-invalid");
                    emailInput.classList.add("is-valid");
                    emailFeedback.style.display = "none";
                } else {
                    emailInput.classList.remove("is-valid");
                    emailInput.classList.add("is-invalid");
                    emailFeedback.innerText = "Email non valide";
                    emailFeedback.style.display = "block";
                }
            });

            const submitButton = document.getElementById("submitButton");
            submitButton.addEventListener("click", function(event) {
                let formIsValid = true;

                // Vérification du champ Nom
                if (!nomInput.value) {
                    formIsValid = false;
                    toggleValidity(nomInput, nomFeedback);
                }
                // Vérification du champ Prénom
                if (!prenomInput.value) {
                    formIsValid = false;
                    toggleValidity(prenomInput, prenomFeedback);
                }
                // Vérification du champ Pseudo
                if (!pseudoInput.value) {
                    formIsValid = false;
                    toggleValidity(pseudoInput, pseudoFeedback);
                }
                // Vérification du champ Email
                if (!emailInput.value) {
                    formIsValid = false;
                    toggleValidity(emailInput, emailFeedback);
                }
            
                // Vérification du champ Mot de passe
                if (!password.value || password.classList.contains("is-invalid")) {
                    formIsValid = false;
                }

                // Vérification du champ Confirmation de mot de passe
                if (!confirmPassword.value || confirmPassword.classList.contains("is-invalid")) {
                    formIsValid = false;
                }
               
                // Validation des CGU
                const cguCheckbox = document.getElementById("cgu");
                const cguValidationFeedback = document.getElementById("cguValidationFeedback");
                if (cguCheckbox && submitButton) {
                    if (!cguCheckbox.checked) {
                        event.preventDefault(); // Empêche l'envoi du formulaire
                        cguValidationFeedback.style.display = "block"; // Affiche l'alerte des CGU
                        formIsValid = false; // Met à jour le statut de validation du formulaire
                    } else {
                        cguValidationFeedback.style.display = "none"; // Cache l'alerte si les CGU sont acceptées
                    }
                }
                // Si le formulaire est valide on l'envoi
                if (formIsValid) {}
            });
        });
    </script>
</body>

</html>