<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/assets/css/style.css">

    <title>Initiation au web</title>
</head>

<body>
    <header id="top">
        <?php include '../templates/header.php'; ?>
    </header>

    <main>
        <h1>Résultat de la recherche</h1>
        <div class="container">
    <div class="row">
        <?php if (!empty($search_results)): ?>
            <?php
            // Répertoire où se trouvent les fichiers PDF
            $uploadDir = '../assets/pdf/';

            foreach ($search_results as $result): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($result['nom_fichier']) ?></h5>
                            <?php
                            // Générer le chemin complet du fichier
                            $fichierComplet = $uploadDir . $result['nom_fichier'];

                            if (file_exists($fichierComplet)): ?>
                                <a href="<?= htmlspecialchars($fichierComplet) ?>" class="button2" target="_blank">Télécharger</a>
                            <?php else: ?>
                                <span class="button2 disabled">Fichier indisponible</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun résultat trouvé pour votre recherche.</p>
        <?php endif; ?>
    </div>
</div>

    </main>

    <div class="align-right">
        <a class="bi bi-arrow-up" href="#top">
                Haut de page
            </a>
        </div>
        
    <footer>
        <?php include '../templates/footer.php'; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="/assets/js/script.js"></script>
</body>

</html>
