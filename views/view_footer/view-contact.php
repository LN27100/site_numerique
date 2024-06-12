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

            <form class="was-validated">

                <div class="form-group">
                    <label for="validationCustom02">Nom</label>
                    <input type="text" class="form-control" id="validationCustom02" placeholder="Nom" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Adresse email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Sujet</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option selected>Sélectionnez un sujet</option>
                        <option>Cours</option>
                        <option>Exercices</option>
                        <option>Corrigés</option>
                        <option>Autres</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="validationTextarea">Message</label>
                    <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Required example textarea" required></textarea>
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Cochez la case</label>
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

</body>

</html>