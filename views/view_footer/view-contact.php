<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/assets/css/style.css">

    <title>Contact</title>
</head>

<body>

    <header id="top">
        <?php include '../templates/header.php'; ?>
    </header>

    <main>

        <div class="returnButton">
            <a class="returnHomeFooter" href="../controllers/controller-home.php">Retour</a>
        </div>

        <div class="containerUsage">

            <h1 class="specialColor">Contact</h1>

            <form class="was-validated" id="contactForm" novalidate>

                <div class="form-group">
                    <label for="validationCustom02">Nom</label>
                    <input type="text" class="form-control" id="validationCustom02" placeholder="Nom" required>
                    <div class="invalid-feedback">
                        Veuillez fournir un nom.
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Adresse email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre email" required>
                    <div class="invalid-feedback">
                        Veuillez fournir une adresse email valide.
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Sujet</label>
                    <select class="form-control" id="exampleFormControlSelect1" required>
                        <option value="" disabled selected>Sélectionnez un sujet</option>
                        <option value="Cours">Cours</option>
                        <option value="Exercices">Exercices</option>
                        <option value="Corrigés">Corrigés</option>
                        <option value="Autres">Autres</option>
                    </select>
                    <div class="invalid-feedback">
                        Veuillez sélectionner un sujet.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="validationTextarea">Message</label>
                    <textarea class="form-control" id="validationTextarea" placeholder="Entrez votre message" required></textarea>
                    <div class="invalid-feedback">
                        Veuillez écrire un message.
                    </div>
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">Cochez la case</label>
                    <div class="invalid-feedback">
                        Merci de cocher la case.
                    </div>
                </div>
                <button type="submit" class="button2">Soumettre</button>

            </form>

        </div>
    </main>

    <footer>
        <?php include '../templates/footer.php'; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="/assets/js/script.js"></script>

    <script>
    // Mode strict utilisé pour améliorer la gestion des erreurs et éviter certains comportements problématiques.
    'use strict';

    // Fonction pour initialiser la validation du formulaire
    function initializeFormValidation() {
        // Récupération du formulaire par son identifiant
        var form = document.getElementById('contactForm');

        // Ajout d'un écouteur d'événements pour l'événement 'submit' sur le formulaire
        form.addEventListener('submit', function(event) {
            // Vérification de la validité du formulaire
            if (form.checkValidity() === false) {
                // Empêche la soumission du formulaire si celui-ci n'est pas valide
                event.preventDefault();
                event.stopPropagation();
            }
            // Ajout de la classe 'was-validated' pour activer les styles de validation de Bootstrap
            form.classList.add('was-validated');
        }, false); // False signifie que l'écouteur sera appelé lors de la phase de bouillonnement de l'événement
    }

    // Ajout d'un écouteur d'événements pour l'événement 'load' sur la fenêtre
    window.addEventListener('load', initializeFormValidation, false);
</script>

</body>

</html>
