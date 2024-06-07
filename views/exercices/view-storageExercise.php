<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/style.css">

    <title>Exercices</title>

</head>

<body>

    <header id="top">
        <?php include '../templates/header.php'; ?>
    </header>

   
<h1>Exercices sur les différents types de stockages</h1>
    
<div class="container">
        <div class="row">
        <h3>A VENIR</h3>
        </div>
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