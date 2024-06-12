<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/assets/css/style.css">

    <title>Manipuler l'ordinateur</title>
</head>

<body>
    <header id="top">
        <?php include '../templates/header.php'; ?>
    </header>

    <main>

        <h1>Entretenir son ordinateur</h1>

        <div class="container">

            <div class="container2">

                <img class="imageAccueil" src="/assets/img/nettoyage_disque.JPG" alt="nettoyage disque dur">
                <img class="imageAccueil" src="/assets/img/depoussierage_pc.JPG" alt="dépoussiérge pc">
            </div>
            <p>Conseils détaillés pour entretenir ton ordinateur afin de maintenir ses performances et prolonger sa durée de vie :</p>

            <ol>
                <li><span style="font-weight: bold"> Nettoyage Physique</span></li>

                <ul>
                    <li>Dépoussiérage : La poussière peut s'accumuler à l'intérieur de ton PC et causer des surchauffes. Utilise une bombe d'air comprimé pour nettoyer les ventilateurs, les grilles d'aération et les composants internes. Pour les portables, nettoie régulièrement le clavier et l'écran avec des produits adaptés.</li>
                    <li>Environnement : Garde ton ordinateur dans un environnement propre et sec. Évite de manger ou de boire à proximité de ton ordinateur pour éviter les accidents.</li>
                </ul>
                <br>
                <li><span style="font-weight: bold">Gestion des Fichiers</span></li>

                <ul>
                    <li>Nettoyage de disque : Utilise régulièrement l'outil de nettoyage de disque pour supprimer les fichiers temporaires, les caches et les fichiers inutiles.</li>
                    <li>Organisation des fichiers : Garde tes fichiers bien organisés dans des dossiers spécifiques. Supprime ou archive les fichiers dont tu n'as plus besoin.</li>

                </ul>
                <br>
                <li><span style="font-weight: bold">Mises à jour</span></li>

                <ul>
                    <li>Système d'exploitation : Assure-toi que ton système d'exploitation est à jour. Les mises à jour corrigent souvent des failles de sécurité et améliorent les performances.</li>
                    <li>Logiciels : Mets régulièrement à jour tous tes logiciels pour bénéficier des dernières fonctionnalités et des corrections de bugs.</li>
                </ul>
                <br>
                <li><span style="font-weight: bold">Sécurité</span></li>

                <ul>
                    <li>Antivirus : Installe un bon antivirus et effectue des analyses régulières pour détecter et supprimer les malwares.
                        <img class="image2" src="/assets/img/avast.JPG" alt="Avast">
                    </li>
                    <li>Pare-feu : Active et configure ton pare-feu pour protéger ton ordinateur contre les attaques extérieures.</li>
                    <li>Mots de passe : Utilise des mots de passe forts et uniques pour tes comptes et change-les régulièrement.</li>
                </ul>
                <br>
                <li><span style="font-weight: bold">Gestion des Programmes</span></li>

                <ul>
                    <li>Désinstallation : Désinstalle les programmes que tu n'utilises plus pour libérer de l'espace et améliorer les performances.</li>
                    <li>Programmes au démarrage : Désactive les programmes inutiles qui se lancent au démarrage pour accélérer le temps de démarrage de ton ordinateur.</li>
                </ul>
                <br>
                <li><span style="font-weight: bold">Performance et optimisation</span></li>

                <ul>
                    <li>RAM et stockage : Si ton ordinateur commence à ralentir, envisage d'ajouter de la RAM ou de remplacer ton disque dur par un SSD pour améliorer les performances.</li>
                    <li>Nettoyage du registre (Windows) : Utilise des outils comme CCleaner pour nettoyer le registre de Windows des entrées obsolètes ou corrompues.
                        <img class="image2" src="/assets/img/ccleaner.png" alt="Ccleaner">
                    </li>

                </ul>
            </ol>


            <p class="lienPDF">Retrouverez le nettoyage du disque en détail dans le fichier "base_ordinateur" du sous-menu "Ordinateur" de l'onglet "PDF à télécharger"</p>

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