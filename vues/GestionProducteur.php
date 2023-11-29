<!DOCTYPE html>
<html lang="Francais">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../GestionProducteur.css" type="text/css">
    <link rel="stylesheet" href="../GestionProduit.css" type="text/css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script src="../GestionProduit.js"></script>
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
                        Produits / Stocks
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
                                    <div class="flex_center grid_produit_bottom_4" onclick="openPopup();">
                                        <img src="../images/crayon_modif.svg" alt="modifier produit" class="image_crayon">
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
                        <form class="flex_center produit_stock" action="" method="post">
                            <input type="hidden" name="ajout">
                            <button class="transparent_button">
                                <img src="../images/croix_produit_sup.svg" alt="croix pproduit supplémentaire">
                            </button>
                        </form>
                    </div>
                    <div class="scroll_arrow">
                        <img src="../images/fleche_stock.svg" alt="image descendre stock">
                    </div>
                </div>
            </section>
            <div id="overlay" class="overlay"></div>
            <div id="popup" class="popup">
                <form action="" method="post">
                    <div class="overlay_bloc">
                        <div class="overlay_top">
                            <div class="overlay_image_produit">
                                <input type="file" accept="image/*" name="image" placeholder="Photo du produit" required>
                            </div>
                            <div class="overlay_contenu">
                                <div class="overlay_nom_text">
                                    Nom : &nbsp;
                                </div>
                                <div class="overlay_nom_completion">
                                    <input type="text" name="nom" placeholder="Nom du produit" required>
                                </div>
                                <div class="overlay_stock_glob">
                                    <div class="overlay_stock_text">
                                        Stock : &nbsp;
                                    </div>
                                    <div class="overlay_stock_qte">
                                        <input type="number" name="stock" placeholder="0" min="0" required>
                                    </div>
                                    <div class="overlay_stock_change">

                                    </div>
                                </div>
                                <div class="overlay_categorie_glob">
                                    <div class="overlay_categorie_text">
                                        Categorie : &nbsp;
                                    </div>
                                    <div class="overlay_categorie_choix">

                                    </div>
                                </div>
                            </div>
                            <div class="overlay_retour">
                                <img src="../images/refuser.svg" onclick="closePopup()" alt="fermer" />
                            </div>
                        </div>
                        <div class="overlay_bottom">
                            <div class="overlay_bottom_top">
                                <div class="overlay_prix_glob">
                                    <div class="overlay_prix_text">
                                        Prix : &nbsp;
                                    </div>
                                    <div class="overlay_prix_modif">
                                        <input type="number" name="prix" placeholder="0" min="0" required>
                                    </div>
                                    <div class="overlay_unite">
                                        <input type="search" name="" id="">
                                    </div>
                                    €/
                                </div>
                                <div class="overlay_promotion_glob">
                                    <div class="overlay_promotion_text">
                                        Promotion : &nbsp;
                                    </div>
                                    <div class="overlay_promotion_modif">
                                        <input type="number" name="promotion" min="0" max="100">
                                    </div>
                                    %
                                </div>
                            </div>
                            <div class="overlay_bottom_bottom">
                                <div class="overlay_image_bio">
                                    <img src="../images/bio.svg" alt="sauvegarder">
                                </div>
                                <div class="overlay_image_save">
                                    <img src="../images/save.svg" alt="sauvegarder">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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
                    <p class="flex_center">
                        Commandes
                    </p>
                </div>
                <div class="flex_center scroll_conteneur_y">
                    <div class="flex_space_around scrollable_y">
                        <?php foreach ($paniers as $panier) {
                            $total = 0;
                            foreach (getProduitOf($panier['id_panier']) as $produit) {
                                $total = $total + $produit['quantite_produit'] * $produit['prix_produit'];
                            }
                            $user = getUserByID($panier['id_util']) ?>
                            <article class="grid_4_parent">
                                <div class="grid_4_1 flex_center">
                                    <img src="<?php echo getUserImage($user['id_util']) ?>" alt="" class="commande_image_utilisateur">
                                </div>
                                <div class="grid_4_2">
                                    <strong> <?php echo 'CCCCCCCCCCCCCCCCCCCCCCCCC &nbsp CCCCCCCCCCCCCCCCCCCCCCCCC' //$user['pren_util'] .' &nbsp'. $user['nom_util']
                                                ?> </strong>
                                </div>
                                <div class="grid_4_3 flex_left">
                                    <?php echo $user['tel_util'] ?>
                                </div>
                                <div class="grid_4_4">
                                    <?php echo 'CCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCC' //$user['mail_util']
                                    ?>
                                </div>
                                <div class="grid_4_5">
                                    <div class="flex_center scroll_conteneur_x">
                                        <div class="scrollable_x">
                                            <?php
                                            foreach (getProduitOf($panier['id_panier']) as $produit) { ?>
                                                <article class="produit_commande">
                                                    <div class="produit_commande_top">
                                                        <img class="produit_commande_image" src="<?php echo getProductImage($produit['id_produit']); ?>" alt="image du produit">
                                                    </div>
                                                    <div class="grid_produit_commande_bottom_parent">
                                                        <div class="grid_produit_commande_bottom_1">
                                                            <strong><?php echo 'CCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCC'; //$produit['nom_produit']; 
                                                                    ?></strong>
                                                        </div>
                                                        <div class="flex_center grid_produit_commande_bottom_2">
                                                            <?php echo $produit['qte_produit_commandee'] ?>
                                                        </div>
                                                        <div class="flex_center grid_produit_commande_bottom_3">
                                                            <strong><?php echo $produit['qte_produit_commandee'] * $produit['prix_produit'] . '€' ?></strong>
                                                        </div>
                                                        <div class=" flex_center grid_produit_commande_bottom_4">
                                                            <?php echo $produit['prix_produit'] . '€/' . $produit['nom_unite'] ?>
                                                        </div>
                                                    </div>
                                                </article>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid_4_6 flex_space_around">
                                    <form class="flex_center" action="" method="post">
                                        <input type="hidden" name="refusee" value=<?php echo $panier['id_panier'] ?>>
                                        <button class="transparent_button">
                                            <img src="../images/refuser.svg" alt="refuser" class="image_refuser">
                                        </button>
                                    </form>
                                    <?php if ($panier['id_statut'] == 2) { ?>
                                        <form class="flex_center" action="" method="post">
                                            <input type="hidden" name="prete" value=<?php echo $panier['id_panier'] ?>>
                                            <button class="transparent_button">
                                                <img src="../images/prete.svg" alt="prete" class="image_panier_encours">
                                            </button>
                                        </form>
                                    <?php } else { ?>
                                        <form class="flex_center" action="" method="post">
                                            <input type="hidden" name="livree" value=<?php echo $panier['id_panier'] ?>>
                                            <button class="transparent_button">
                                                <img src="../images/livree.svg" alt="livree" class="image_panier_livre">
                                            </button>
                                        </form>
                                    <?php } ?>
                                </div>
                                <div class="grid_4_7 flex_center">
                                    <div class="souligne">
                                        Générer un pdf :
                                    </div>
                                    &nbsp;
                                    <form class="flex_center" action="" method="post">
                                        <input type="hidden" name="pdf" value=<?php echo $panier['id_panier'] ?>>
                                        <button class="transparent_button">
                                            <img src="../images/pdf.svg" alt="pdf" class="image_pdf">
                                        </button>
                                    </form>
                                </div>
                                <div class="grid_4_8 flex_center">
                                    <div class="souligne">
                                        Total :
                                    </div>
                                    <strong><?php echo '&nbsp' . $total . '€' ?></strong>
                                </div>
                            </article>
                        <?php } ?>
                    </div>
                </div>
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