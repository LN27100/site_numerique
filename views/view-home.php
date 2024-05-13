<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">

    <title>Accueil cours numérique</title>
</head>

<body>
    <header id="top">
        <?php include '../templates/header.php'; ?>
    </header>


    <h1>Le numérique à porter de mains</h1>

    <div class="container card-container">
        <div class="outer-border">
            <div class="mid-border">
                <div class="inner-border">
                    <div class="text carousel-text">
                    </div>
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/assets/img/diff_ecran.jpg" class="d-block" alt="Image 1">
                            </div>
                            <div class="carousel-item">
                                <img src="/assets/img/cle_usb.jpg" class="d-block" alt="Image 2">
                            </div>
                            <div class="carousel-item">
                                <img src="/assets/img/disque_dur.jpg" class="d-block" alt="Image 3">
                            </div>
                            <div class="carousel-item">
                                <img src="/assets/img/souris_pc.jpg" class="d-block" alt="Image 4">
                            </div>
                            <div class="carousel-item">
                                <img src="/assets/img/personne_pc.jpg" class="d-block" alt="Image 5">
                            </div>
                            <div class="carousel-item">
                                <img src="/assets/img/main_clavier.jpg" class="d-block" alt="Image 6">
                            </div>
                            <div class="carousel-item">
                                <img src="/assets/img/souris_ordi.jpg" class="d-block" alt="Image 7">
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
                        <p>Vous souhaitez apprendre à utiliser un ordinateur? Ou simplement vous perfectionner en traitement de texte ou en tableur?
                            Vous ne connaissez pas les différents modes de stockages?
                        </p>
                        <p>
                            Alors bienvenue sur mon site consacré au numérique.
                        </p>
                        <p>
                            Vous y trouverez des cours, des fiches détaillées.
                        </p>
                        <p>
                            Un onglet est également consacré à des exercices que j'ai réalisé pour que vous puissiez tester votre apprentissage, savoir où vous en êtes.
                            Vous pouvvez bien sûr avoir également accès aux corrections.
                        </p>
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