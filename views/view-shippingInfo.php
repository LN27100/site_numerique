<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/assets/css/style.css">

    <title>Livraison Dream Stones</title>
</head>

<body>

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

    <header id="top">
        <?php include '../templates/header.php'; ?>
    </header>


    <a class= "returnHomeFooter" href="../controllers/controller-home.php">Retour</a>

    <div class="containerUsage">
        <h1 class="tittleUsage">EXPÉDITION</h1>


        <p>
            La totalité de nos articles sont expédiés en 24/48h. (sauf week-end et jours fériés)
        <h5>TEMPS DE LIVRAISON :</h5>
            <p>
                Notre délai de livraison moyen est compris entre 2 et 5 jours ouvrés* après expédition. (48/72h en général)

                Nous envoyons tous nos articles en lettre suivie ainsi qu'en Colissimo* selon la taille et le poids de votre commande.

                Le délai de livraison moyen des Point Relais Colissimo est de 2 à 3 jours ouvrés après expédition.

                Le délai de livraison moyen des Point Relais Mondial Relay est de 3 à 4 jours ouvrés après expédition.

                Le délai de livraison est toujours à prendre en compte après le délai d'expédition de la commande.
            </p>

            <h5>NUMÉRO DE SUIVI :</h5>
            <p>

                Dès que votre commande est prête à être expédiée vous recevrez par mail votre numéro de suivi consultable dans les 24/48h sur le site de La Poste ou de Mondial Relay.

            </p>


            <h5> FRAIS DE LIVRAISON :</h5>
            <p>
            <h6>Pour la France :</h6>

            Livraison Standard Offerte inférieure à 50€ : 2,90€
            Livraison Standard Offerte supérieure à 50€ : Gratuit
            Livraison Colissimo avec Signature (jusqu'à 130€) : 5,90€
            Livraison avec Signature au delà de 130€ : Offerte
            Livraison Mondial Relay Jusqu'à 99€ : 3,90€
            Livraison Mondial Relay au délà de 100€ : Offerte
            Livraison Colissimo Point Relais Jusqu'à 99€ : 4,90€
            Livraison Colissimo Point Relais au délà de 100€ : Offerte
            </p>


            <h5>ANNULATION DE COMMANDE :</h5>
            <p>
                Il est tout à fait possible d'annuler sa commande avant qu'elle soit validée en respectant le délai prévu à cet effet.
                Le délai pour annuler votre commande est de 2h maximum après le passage de la commande (Du Lundi au Vendredi entre 9h et 17h et hors week-end et/ou jours fériés), au delà de ce délai (ou si vous passez votre commande après 17h ou un week-end ou un jour férié), votre commande vous sera envoyée sans possibilité d'annuler.
                
                Tout ce qu'il faut savoir sur les livraisons :

                Les livraisons sont effectuées uniquement par la Poste. L'adresse de livraison demandée lors de votre commande doit correspondre à l'adresse de votre domicile. Si vous demandez la livraison en relais colis et que celui-ci est refusé et nous est retourné, des frais de renvoi de commande vous seront demandés pour renvoyer votre colis. Si après cela vous décidez d'annuler votre commande et de demander un remboursement, des frais pourront être facturés suite à l'échec de la première livraison.

            <ul>Si votre commande est livrée en Colissimo avec signature :

                En cas de colis perdu, erreur livraison, vol en boite aux lettres, Dream Stones s'engage à vous réexpédier votre commande, ou à vous rembourser .

                <li>
                    Si vous avez choisi une livraison sans signature :

                    Le client est responsable du mode de livraison qu'il choisit, et ceci quel que soit le montant de sa commande. Il lui appartient de s'assurer que sa boîte aux lettres est conforme (avec le nom du destinataire), accessible et sécurisée s'il choisit une livraison sans signature. Si la livraison n'est pas possible dû à une erreur d'adresse fournie (cela s'applique également pour une adresse incomplète) lors du passage de votre commande ou d'étiquetage de votre boite aux lettres, des frais de renvoi vous seront demandés.

                    Lorsque le client choisi une livraison sans signature, il s'accorde sur le fait que, en cas de litige, les enregistrements de suivi de livraison du serveur de La Poste font foi. Si le colis est déclaré comme livré par les services postaux, la responsabilité du vendeur ne saurait être engagée et le client ne pourra pas prétendre à un remboursement ou remplacement quelconque. Si et uniquement si le colis est déclaré perdu par la poste, le site s'engage à vous le réexpédié ou à vous rembourser quelque soit le mode de livraison choisi.
                </li>
                <li>
                    Si le colis est indiqué livré par la Poste mais que ce n'est pas le cas ou alors que le colis ne vous est pas livré pour une raison inconnue, vous avez 14 jours après la date de livraison supposée de la Poste pour nous faire part de cela par mail en précisant votre numéro de commande. Au delà de ce délai nous ne saurions être tenu responsable de la non livraison de votre colis.
                </li>
            </ul>
            <p>PS : Si vous avez fait une erreur dans votre adresse (erreur de nom, de numéro ou de nom de rue ; ou encore manque d'indications comme le nom/prénom, numéro d'appartement, d'étage et de bâtiment ou que vous n'avez pas ajouté les articles que vous souhaitiez) et que vous ne nous l'avez pas précisé dans les 2 heures suivant votre commande (hors week-end et jours fériés), nous ne saurions être tenu responsable si votre colis ne vous est pas livré.
            </p>
            <p>
                **Une adresse est considérée incomplète si il manque au moins une information dans celle-ci comme : le numéro de rue, de bâtiment ou d'appartement. Le nom de rue ou de bâtiment. Le nom complet du destinataire.</p>
            </p>
    </div>



    <footer>
        <?php include '../templates/footer.php'; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="/assets/js/script.js"></script>
    
</body>

</html>