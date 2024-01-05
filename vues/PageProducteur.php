<!DOCTYPE html>
<html lang="Francais">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../PageProducteur.css" type="text/css">
    <link rel="stylesheet" href="../AchatProduit.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script src="../AchatProduit.js"></script>
    <header>

    </header>
    <div class="main_conteneur">
        <main class="main_grid_parent flex_center">
            <section class="main_grid_1 grid_1_parent">
                <div class="grid_1_1 flex_center">
                    <img src="<?php echo $image_producteur ?>" alt="image de profil producteur" class="image_producteur">
                </div>
                <div class="grid_1_2">
                    <strong><?php echo $nom_producteur ?></strong>
                </div>
                <div class="grid_1_3 flex_left">
                    <img src="<?php echo ($moy_avis >= 1) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                    <img src="<?php echo ($moy_avis >= 2) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                    <img src="<?php echo ($moy_avis >= 3) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                    <img src="<?php echo ($moy_avis >= 4) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                    <img src="<?php echo ($moy_avis == 5) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                    <p class="avis_producteur_text">
                        <?php echo $nb_avis ?> avis
                    </p>
                </div>
                <div class="grid_1_4">
                    <h3 class="flex_left">
                        <img src="../images/point_map.svg" alt="point map" class="image_map">
                        <p class="adresse_text">
                            <?php echo $adresse ?>
                        </p>
                    </h3>
                </div>
                <div class="grid_1_5">
                    <?php echo $desc ?>
                </div>
                <div class="grid_1_6 flex_center">
                    <img src="../images/produit_logo.svg" alt="image panier produit" class="image_panier">
                    <a class="flex_center">
                        <strong class="nb_produit_text"><?php echo $nb_produits ?></strong>
                        <p class="grid_1_6_produit_text">
                            <?php echo ($nb_produits > 1) ? "Produits" : "Produit"; ?>
                        </p>
                    </a>
                </div>
            </section>
            <section class="main_grid_2">
                <div class=" main_grid_titre_text">
                    <p class="flex_center">
                        Produits
                    </p>
                </div>
                <div class="flex_center scroll_conteneur_y">
                    <div class="flex_space_around scrollable_y ">
                        <?php
                        foreach ($produits as $produit) { ?>
                            <article class="produit_stock">
                                <div class="produit_stock_top">
                                    <img class="produit_image" src="<?php echo getProductImage($produit['id_produit']); ?>" alt="image du produit">
                                </div>
                                <div class="grid_produit_bottom_parent">
                                    <div class="grid_produit_bottom_1">
                                        <?php echo $nom_producteur ?>
                                    </div>
                                    <div class="grid_produit_bottom_2">
                                        <strong><?php echo 'CCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCC'; //$produit['nom_produit'];
                                                ?></strong>
                                    </div>
                                    <div class="grid_produit_bottom_3">
                                        <strong><?php echo $produit['prix_produit'] . '€/' . $produit['nom_unite'] ?></strong>
                                    </div>
                                    <div class="flex_center grid_produit_bottom_4" onclick="openPopup('<?php echo $produit['id_produit'] ?>', '<?php echo $produit['nom_produit'] ?>', '<?php echo $produit['quantite_produit'] ?>', '<?php echo $produit['prix_produit'] ?>', '<?php echo $produit['nom_unite'] ?>', '<?php echo $produit['promotion_produit'] ?>', '<?php echo $produit['bio_produit'] ?>', '<?php echo 'prout' ?>');">
                                        <img src="../images/cart.svg" alt="acheter produit" class="image_cart">
                                    </div>
                                    <div class="grid_produit_bottom_5 flex_center">
                                        <div class="souligne">
                                            Stock :
                                        </div>
                                        <?php echo '&nbsp;' . $produit['quantite_produit'] . '&nbsp;' . $produit['nom_unite'] ?>
                                    </div>
                                </div>
                            </article>
                        <?php }
                        ?>
                    </div>
                    <div class="scroll_arrow">
                        <img src="../images/fleche_stock.svg" alt="image descendre stock">
                    </div>
                </div>
            </section>
            <section class="main_grid_3">
                <div class="main_grid_titre_text">
                    <p class="flex_center">
                        Avis
                    </p>
                </div>
                <div class="flex_center scroll_conteneur_y">
                    <div class="flex_space_around scrollable_y">
                        <?php
                        foreach ($avis as $avis_) { ?>
                            <article class="grid_3_parent">
                                <div class="grid_3_1 flex_center">
                                    <img src="<?php echo getUserImage($avis_['id_util']) ?>" alt="image utilisateur" class="avis_image_utilisateur">
                                </div>
                                <div class="grid_3_2">
                                    <?php echo '<strong>' . /*$avis_['pren_util']*/ 'CCCCCCCCCCCCCCCCCCCCCCCCC &nbsp CCCCCCCCCCCCCCCCCCCCCCCCC &nbsp' . /*$avis_['nom_util']*/ '</strong> le ' . $avis_['date_avis'] ?>
                                </div>
                                <div class="grid_3_3 flex_left">
                                    <img src="<?php echo ($moy_avis >= 1) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile_2">
                                    <img src="<?php echo ($moy_avis >= 2) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile_2">
                                    <img src="<?php echo ($moy_avis >= 3) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile_2">
                                    <img src="<?php echo ($moy_avis >= 4) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile_2">
                                    <img src="<?php echo ($moy_avis == 5) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile_2">
                                    <p class="avis_producteur_text_2">
                                        <?php echo $avis_['note_avis']; ?> étoiles
                                    </p>
                                </div>
                                <div class="grid_3_4">
                                    <?php echo 'CCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCC'; //$avis_['contenu_avis']
                                    ?>
                                </div>
                            </article>
                        <?php } ?>
                    </div>
                    <div class="scroll_arrow">
                        <img src="../images/fleche_stock.svg" alt="image descendre stock">
                    </div>
                </div>
            </section>
            <section class="main_grid_4">
                <div class="main_grid_titre_text">
                    <p class="flex_center">Où nous trouver ?</p>
                </div>
                <iframe id="map-canvas" class="map_part" width="100%" height="80%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=fr&amp;q='<?php echo $adresse ?>'+(Nom%20de%20votre%20%C3%A9tablissement)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
            </section>
        </main>
    </div>
    <footer class="footer">
        <div class="footer_bloc">
            <h1 class="footer_title">Vege<b class="footer_title_weight">Shop</b></h1>
            <nav class="footer_list">
                <a class="list_name" href="">A propos de nous</a>
                <a class="list_name" href="">Contact</a>
                <a class="list_name" href="">Aide</a>
            </nav>
            <div class="footer_language">
                <i class="language_logo"><svg xmlns="http://www.w3.org/2000/svg" width="37" height="36" viewBox="0 0 37 36" fill="none">
                        <g clip-path="url(#clip0_222_80)">
                            <path d="M36.2307 27C36.2307 28.0609 35.8093 29.0783 35.0591 29.8284C34.309 30.5786 33.2916 31 32.2307 31H24.2307V5H32.2307C33.2916 5 34.309 5.42143 35.0591 6.17157C35.8093 6.92172 36.2307 7.93913 36.2307 9V27Z" fill="#ED2939" />
                            <path d="M4.23071 5C3.16985 5 2.15243 5.42143 1.40229 6.17157C0.65214 6.92172 0.230713 7.93913 0.230713 9L0.230713 27C0.230713 28.0609 0.65214 29.0783 1.40229 29.8284C2.15243 30.5786 3.16985 31 4.23071 31H12.2307V5H4.23071Z" fill="#002495" />
                            <path d="M12.2307 5H24.2307V31H12.2307V5Z" fill="#EEEEEE" />
                        </g>
                        <defs>
                            <clipPath id="clip0_222_80">
                                <rect width="36" height="36" fill="white" transform="translate(0.230713)" />
                            </clipPath>
                        </defs>
                    </svg></i>
                <p class="language_text">Francais</p>
            </div>
        </div>
    </footer>
</body>

</html>