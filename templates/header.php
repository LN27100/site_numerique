<!-- NAV BAR -->
<nav class="navbar navbar-expand-lg" aria-label="Thirteenth navbar example">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-lg-flex " id="navbarsExample11">
            <a class="navbar-brand col-lg-3 me-0 text-light" href="/controllers/controller-home.php">LE NUMERIQUE</a>
            <ul class="navbar-nav col-lg-6 justify-content-lg-center">

            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Manipuler l'ordinateur
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/controllers/controller-roulees.php">Pierres roulées</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-brutes.php">Pierres brutes</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-spheres.php">Sphères</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-pointes.php">Pointes</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-bijoux.php">Bijoux</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-geodes.php">Géodes</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Cours Traitement de texte 
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/controllers/controller-blue.php" data-categoryId="1">Bleues</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-green.php" data-categoryId="2">Vertes</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-purple.php" data-categoryId="3">Violettes</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-white.php" data-categoryId="3">Blanches</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-red.php" data-categoryId="3">Rouges</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-brown.php" data-categoryId="3">Marrons</a></li>
                        <li><a class="dropdown-item" data-categoryId="3">Jaunes</a></li>
                        <li><a class="dropdown-item" data-categoryId="3">Grises</a></li>
                        <li><a class="dropdown-item" data-categoryId="3">Noires</a></li>
                        <li><a class="dropdown-item" data-categoryId="3">Oranges</a></li>
                        <li><a class="dropdown-item" data-categoryId="3">Roses</a></li>
                        <li><a class="dropdown-item" data-categoryId="3">Multicolores</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Cours Tableur
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/controllers/controller-roulees.php">Pierres roulées</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-brutes.php">Pierres brutes</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-spheres.php">Sphères</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-pointes.php">Pointes</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-bijoux.php">Bijoux</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-geodes.php">Géodes</a></li>
                    </ul>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Cours Stockages
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/controllers/controller-roulees.php">Pierres roulées</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-brutes.php">Pierres brutes</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-spheres.php">Sphères</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-pointes.php">Pointes</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-bijoux.php">Bijoux</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-geodes.php">Géodes</a></li>
                    </ul>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Exercices
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/controllers/controller-roulees.php">Pierres roulées</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-brutes.php">Pierres brutes</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-spheres.php">Sphères</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-pointes.php">Pointes</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-bijoux.php">Bijoux</a></li>
                        <li><a class="dropdown-item" href="/controllers/controller-geodes.php">Géodes</a></li>
                    </ul>
                </li>
           

            </ul>
        </div>
    </div>

   <!-- Formulaire de recherche -->
<form id="search-form" class="form-inline col-lg-2" action="/controllers/controller-search.php" method="GET">
    <button id="search-btn" class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="bi bi-search"></i></button>
    <input id="search-input" name="search" class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search">
</form>



</nav>