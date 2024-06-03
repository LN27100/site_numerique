<!-- NAV BAR -->
<!-- Formulaire de recherche -->
<form id="search-form" class="form-inline d-flex justify-content-end" action="/controllers/controller-search.php" method="GET">
    <input id="search-input" name="search" class="form-control" type="search" placeholder="Rechercher" aria-label="Search">
    <button id="search-btn" class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
</form>

<nav class="navbar navbar-expand-lg" aria-label="Thirteenth navbar example">

    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-lg-flex " id="navbarsExample11">
            <a class="navbar-brand text-light" href="/controllers/controller-home.php">LE NUMERIQUE</a>

            <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Manipuler l'ordinateur
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/controllers/controller-startEnd.php">Démarrage / Arrêt</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-keyboard.php">Clavier</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-mouse.php">Souris</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-cleaning.php">Entretien</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Initiation aux logiciels bureautique
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/controllers/controller-word.php" data-categoryId="1">Traitement de texte</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-spreadsheet.php" data-categoryId="2">Tableur</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-presentation.php" data-categoryId="3">Logiciel de présentation</a></li>

                    </ul>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Initiation au web
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/controllers/controller-search.php" data-categoryId="1">Moteurs de recherche</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-mailbox.php" data-categoryId="2">Boite mail</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-socialNetwork.php" data-categoryId="3">Réseaux sociaux</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-dataProtection.php" data-categoryId="3">Protéger ses donnéess</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Découvrir les modes de stockage
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/controllers/controller-hardDrive.php">Disque dur</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-usbKey.php">Clé usb</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-cloud.php">Cloud</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-sdCard.php">Cartes SD</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Exercices
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/controllers/controller-computerExercise.php">Ordinateur</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-wordProcessingExercise.php">Traitement de texte</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-sheetExercise.php">Tableur</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-presentationExercise.php">Logiciels de présentation</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-storageExercise.php">Stockages</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-webExercise.php">Navigation Web</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-mailboxExercise.php">Boite mail</a></li>

                    </ul>
                </li>


            </ul>
        </div>
    </div>

</nav>