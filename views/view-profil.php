<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">

    <title>Profil utilisateur Dream Stones</title>
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




    <h2 class="tittleProfil">Votre profil</h2>
    <?php
    // Bouton de déconnexion
    echo '<a href="../controllers/controller-signout.php" class="buttonHome2"><i class="fa-solid fa-power-off"></i>

</a>';
    ?>
    <div class="container3">

        <div class="profile-info">
            <p><span class="styleProfil"> Nom:</span> <?= $userprofil_name ?></p>
            <p><span class="styleProfil">Prenom: </span> <?= $userprofil_firstname ?></p>
            <p><span class="styleProfil">Pseudo:</span> <?= $userprofil_pseudo ?></p>
            <p><span class="styleProfil">Email: </span> <?= $userprofil_mail ?></p>
            <p><span class="styleProfil">Adresse: </span> <?= $userprofil_street_name ?></p>
            <p><span class="styleProfil">Complément d'adresse: </span> <?= $userprofil_additional_adress ?></p>
            <p><span class="styleProfil">Code postal: </span> <?= $userprofil_zipcode ?></p>
            <p><span class="styleProfil">Ville: </span> <?= $userprofil_city ?></p>
            <p><span class="styleProfil">Numéro de tel: </span> <?= $userprofil_phone ?></p>

        </div>

        <div class="contnair">
            <button id="editDescriptionBtn">Modifier le profil</button>

            <form action="/controllers/controller-profil.php" method="post" class="deleteProfil">
                        <input type="hidden" name="delete_profile" value="<?= $USERPROFIL_ID ?>">
                        <button class="delete_profile hoverable" type="submit" name="delete_profile" onclick="return confirm('Voulez-vous vraiment supprimer ce profil ?')">Supprimer le profil</button>
                    </form>
    </div>

    </div>

   

    <!-- Formulaire de modification du profil (masqué par défaut) -->
    <form method="post" action="../controllers/controller-profil.php" class="transparent-form" enctype="multipart/form-data" id="editDescriptionForm" style="display: none;">

        <div class="profile-info">
            <p><span class="styleProfil"> Nom:</span></p>
            <input type="text" name="USERPROFIL_NAME" placeholder="Nouveau nom" value="<?= $userprofil_name ?>">

            <!-- Affichage des erreurs pour le nom -->
            <?php if (isset($errors['USERPROFIL_NAME'])) { ?>
                <span class="error-message"><?= $errors['USERPROFIL_NAME']; ?></span>
            <?php } ?>

            <p><span class="styleProfil"> Prénom:</span></p>
            <input type="text" name="USERPROFIL_FIRSTNAME" placeholder="Nouveau prénom" value="<?= $userprofil_firstname ?>">

            <!-- Affichage des erreurs pour le prénom -->
            <?php if (isset($errors['USERPROFIL_FIRSTNAME'])) { ?>
                <span class="error-message"><?= $errors['USERPROFIL_FIRSTNAME']; ?></span>
            <?php } ?>


            <p><span class="styleProfil">Pseudo:</span></p>
            <input type="text" name="USERPROFIL_PSEUDO" placeholder="Nouveau pseudo" value="<?= $userprofil_pseudo ?>">

            <!-- Affichage des erreurs pour le pseudo -->
            <?php if (isset($errors['USERPROFIL_PSEUDO'])) { ?>
                <span class="error-message"><?= $errors['USERPROFIL_PSEUDO']; ?></span>
            <?php } ?>


            <p><span class="styleProfil">Email:</span></p>
            <input type="text" name="USERPROFIL_MAIL" placeholder="Nouveau email" value="<?= $userprofil_mail ?>">

            <!-- Affichage des erreurs pour l'email -->
            <?php if (isset($errors['USERPROFIL_MAIL'])) { ?>
                <span class="error-message"><?= $errors['USERPROFIL_MAIL']; ?></span>
            <?php } ?>



            <p><span class="styleProfil">Adresse:</span></p>
            <input type="text" name="USERPROFIL_STREET_NAME" placeholder="Nouveau adresse" value="<?= $userprofil_street_name ?>">

            <!-- Affichage des erreurs pour l'adresse -->
            <?php if (isset($errors['USERPROFIL_STREET_NAME'])) { ?>
                <span class="error-message"><?= $errors['USERPROFIL_STREET_NAME']; ?></span>
            <?php } ?>


            <p><span class="styleProfil">Complément d'adresse:</span></p>
            <input type="text" name="USERPROFIL_ADITTIONAL_ADRESS" placeholder="Nouveau complément d'adresse" value="<?= $userprofil_additional_adress ?>">

            <!-- Affichage des erreurs pour le pseudo -->
            <?php if (isset($errors['USERPROFIL_ADITTIONAL_ADRESS'])) { ?>
                <span class="error-message"><?= $errors['USERPROFIL_ADITTIONAL_ADRESS']; ?></span>
            <?php } ?>


            <p><span class="styleProfil">Code postal:</span></p>
            <input type="text" name="USERPROFIL_ZIPCODE" placeholder="Nouveau code postal" value="<?= $userprofil_zipcode ?>">

            <!-- Affichage des erreurs pour le code postale -->
            <?php if (isset($errors['USERPROFIL_ZIPCODE'])) { ?>
                <span class="error-message"><?= $errors['USERPROFIL_ZIPCODE']; ?></span>
            <?php } ?>


            <p><span class="styleProfil">Ville:</span></p>
            <input type="text" name="USERPROFIL_CITY" placeholder="Nouvelle ville" value="<?= $userprofil_city ?>">

            <!-- Affichage des erreurs pour la ville -->
            <?php if (isset($errors['USERPROFIL_CITY'])) { ?>
                <span class="error-message"><?= $errors['USERPROFIL_CITY']; ?></span>
            <?php } ?>


            <p><span class="styleProfil">Téléphone:</span></p>
            <input type="text" name="USERPROFIL_PHONE" placeholder="Nouveau numéro de tel" value="<?= $userprofil_phone ?>">

            <!-- Affichage des erreurs pour le numéro de tel -->
            <?php if (isset($errors['USERPROFIL_PHONE'])) { ?>
                <span class="error-message"><?= $errors['USERPROFIL_PHONE']; ?></span>
            <?php } ?>


            <div class="profile-info">
                <input type="submit" name="save_modification" value="Enregistrer" class="file-input-button">
                <button type="button" id="cancelEditBtn" class="file-input-button">Annuler</button>
            </div>
    </form>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        
        document.addEventListener("DOMContentLoaded", function() {
            const navbarToggle = document.getElementById("navbar-toggle");
            const navbarNav = document.getElementById("navbar-nav");

            if (navbarToggle && navbarNav) {
                navbarToggle.addEventListener("click", function() {
                    navbarNav.classList.toggle("active");
                });
            }

            document.getElementById('editDescriptionBtn').addEventListener('click', function() {
                // Masquer la div avec la classe profile-info
                document.querySelector('.profile-info').style.display = 'none';
                // Afficher le formulaire de modification
                document.getElementById('editDescriptionForm').style.display = 'block';
            });

            // Afficher le formulaire de modification si des erreurs sont présentes
            if (<?= !empty($errors) ? 'true' : 'false' ?>) {
                document.getElementById('editDescriptionForm').style.display = 'block';
                document.querySelector('.profile-info').style.display = 'none';
            }

            document.getElementById('cancelEditBtn').addEventListener('click', function() {
                // Afficher à nouveau la div avec la classe profile-info
                document.querySelector('.profile-info').style.display = 'block';
                // Masquer le formulaire de modification
                document.getElementById('editDescriptionForm').style.display = 'none';
            });
        });
        
    </script>


</body>

</html>