<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <?php foreach ($csss as $css) { ?>
        <link rel="stylesheet" href="<?php echo $css; ?>">
    <?php } ?>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nomPage; ?></title>
</head>

<body>
    <script src="../connexion.js"></script>
    <header>
        <div class="top_header">
            <div class="logo">
                <img src="<?php echo $pathImage . '/VegeShoplogo.svg' ?>">
            </div>
            <div class="align_img_text" <?php echo (!$isConnected) ? 'onclick="openConnectionPopup();"' : null; ?>>
                <img class="img_header auto_size_img_header" src="<?php echo ($isConnected) ? getUserImage($idUtilisateur) : $pathImage . '/logoDefaultUser.svg'; ?>">
                <a class="text_header opt425">
                    <?php echo ($isConnected) ? $mailUtilisateur : "connexion"; ?>
                </a>
            </div>
        </div>
        <div class="middle_header">
            <?php if ($devenirProducteur) { ?>
                <form class="opt425" action="<?php echo $pathcontrolleurs . '/CreationCompteProducteur.php'; ?>">
                    <button class="bouton_header">
                        <div class="align_img_text">
                            <img class="img_header auto_size_img_header" src="<?php echo $pathImage . '/fermier.svg' ?>" alt="">
                            <a class="text_header align_center">
                                devenir producteur
                            </a>
                        </div>
                    </button>
                </form>
            <?php } ?>
            <?php if ($ajouteUnProduit) { ?>
                <!-- verifier le path -->
                <button class="bouton_header">
                    <div class="align_img_text">
                        <img class="img_header auto_size_img_header" src="<?php echo $pathImage . '/carbon_fruit-bowl.svg' ?>" alt="">
                        <a class="text_header align_center opt425">
                            ajoute un produit
                        </a>
                    </div>
                </button>
            <?php } ?>

            <?php if ($gestionProduit) { ?>
                <form action="<?php echo $pathcontrolleurs . '/GestionProducteur.php'; ?>">
                    <button class="bouton_header">
                        <div class="align_img_text">
                            <img class="img_header auto_size_img_header" src="<?php echo $pathImage . '/fermier.svg' ?>" alt="">
                            <a class="text_header align_center opt425">
                                gestion production
                            </a>
                        </div>
                    </button>
                </form>
            <?php } ?>

            <?php if ($gestionCompte) { ?>
                <form action="<?php echo $pathcontrolleurs . '/admin.php'; ?>">
                    <button class="bouton_header">
                        <div class="align_img_text">
                            <img class="img_header auto_size_img_header" src="<?php echo $pathImage . '/gestionCompte.svg' ?>" alt="">
                            <a class="text_header align_center opt425">
                                gestion des comptes
                            </a>
                        </div>
                    </button>
                </form>
            <?php } ?>

            <?php if ($messagerie) { ?>
                <form action="<?php echo $pathcontrolleurs . '/messagerie.php'; ?>">
                    <button class="bouton_header">
                        <div class="align_img_text">
                            <img class="img_header auto_size_img_header" src="<?php echo $pathImage . '/envelope.svg' ?>" alt="">
                            <a class="text_header align_center opt768">
                                messagerie
                            </a>
                        </div>
                    </button>
                </form>
            <?php } ?>

            <?php if ($barreDeRecherche) { ?>
                <form id="recherche" class="search" action="<?php echo $recherchePath; ?>" method="get">
                    <input class="text_search" type="text" name="recherche" value="<?php echo isset($_GET['recherche']) ? $_GET['recherche'] : null  ?>" require />
                    <button class="button_search">
                        <svg class="auto_size" xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 19 18" fill="none">
                            <path d="M17.5 17L13.7223 13.2156M15.8158 8.15789C15.8158 10.0563 15.0617 11.8769 13.7193 13.2193C12.3769 14.5617 10.5563 15.3158 8.65789 15.3158C6.7595 15.3158 4.93886 14.5617 3.5965 13.2193C2.25413 11.8769 1.5 10.0563 1.5 8.15789C1.5 6.2595 2.25413 4.43886 3.5965 3.0965C4.93886 1.75413 6.7595 1 8.65789 1C10.5563 1 12.3769 1.75413 13.7193 3.0965C15.0617 4.43886 15.8158 6.2595 15.8158 8.15789V8.15789Z" stroke="#808080" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </button>
                </form>
            <?php } ?>

            <?php if ($mesPanier) { ?>
                <form action="<?php echo $pathcontrolleurs . '/gestionPanier.php'; ?>">
                    <button class="bouton_header">
                        <div class="align_img_text">
                            <img class="img_header auto_size_img_header" src="<?php echo $pathImage . '/cart.svg' ?>" alt="">
                            <a class="text_header align_center opt768">
                                mes paniers
                            </a>
                        </div>
                    </button>
                </form>
            <?php } ?>
        </div>

        <!-- popUp -->
        <div id="overlay_connection" class="overlay_connection"></div>
        <div class="align_center">
            <div id="popup_connection" class="popup_connection">
                <div class="f425"><img class='croix' src="<?php echo $pathImage . '/croix.svg' ?>" onclick="closeConnectionPopup();" /></div>
                <div class="connection">
                    <form class="form_connection" action="" method="post">
                        <div class="titre align_center">
                            Connexion
                        </div>
                        <div class="align_center">
                            <input class="chant_text" type="email" name="ConnectionMail" placeholder="Adresse mail" required />
                        </div>
                        <div class="align_center">
                            <input class="chant_text" type="password" name="ConnectionPassword" placeholder="Mot de passe" required />
                        </div>
                        <div class="align_center">
                            <a href="MotDePasseOublie.php">Mot de passe oublié</a>
                        </div>
                        <div class="align_center">
                            <input class="chant_text" type="submit" value="Se connecter" />
                        </div>
                        <div class="align_center">
                            <a href="CreationCompteUtilisateur.php">Créer son compte</a>
                        </div>
                    </form>
                    <div class='croix_contenaire'>
                        <img class='croix opt425' src="<?php echo $pathImage . '/croix.svg' ?>" onclick="closeConnectionPopup();" />
                    </div>
                </div>
            </div>
        </div>
    </header>
