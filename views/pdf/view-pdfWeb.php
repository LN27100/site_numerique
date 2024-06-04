<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/assets/css/style.css">

    <title>PDF à télécharger</title>
</head>

<body>
    <header id="top">
        <?php include '../templates/header.php'; ?>
    </header>



    <h1>Liste des pdf sur l'utilisation du web et de la boite mail</h1>


    <div class="container">
        <div class="row">
        

            <!-- Téléchargement pdf -->
            <?php if ($pdf) : ?>
                <p>Nom du fichier : <?= htmlspecialchars($pdf['nom_fichier']) ?></p>
                <p><a href="<?= htmlspecialchars($pdf['chemin_fichier']) ?>" download>Télécharger le fichier</a></p>
            <?php else : ?>
                <p>Le fichier PDF n'a pas été trouvé.</p>
            <?php endif; ?>

        </div>
    </div>



    <footer>
        <?php include '../templates/footer.php'; ?>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="/assets/js/script.js"></script>



</body>

</html>