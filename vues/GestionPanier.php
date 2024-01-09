<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../GestionPanier.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main>
        <div class="menu">
            <div class="btn_left_bar" onclick="location.href = 'compte.php'">
                mon compte
            </div>

            <div class="btn_left_bar" onclick="location.href = 'gestionPanier.php'">
                mes paniers
            </div>

            <div class="btn_left_bar" onclick="location.href = 'resetSession.php';">
            déconnexion
            </div>
            <?php if (isProducteur($_SESSION['id_util'])) { ?>
                <div class="btn_left_bar" onclick="location.href = 'gestionProducteur.php';">
                    gestion production
                </div>
            <?php } ?>
            <?php if (isAdmin($_SESSION['id_util'])) { ?>
                <div class="btn_left_bar" onclick="location.href = 'admin.php';">
                    gestion compte
                </div>
            <?php } ?>
        </div>
        <div class="panier">
            <div class="flex_space_evenly">
                <form method="post" class="choix_panier flex_center">
                    <input type="hidden" name="panier_enCours" value="<?php echo $panier['id_panier'] ?>">
                    <div class="flex_center">
                        <button type="submit" class="flex_center">
                            <img src="../images/enCours.svg" alt="panier_enCours" class="enCours_img">
                            Paniers en cours de réalisation
                        </button>
                    </div>
                </form>
                <form method="post" class="choix_panier flex_center">
                    <input type="hidden" name="panier_prep_pret" value="<?php echo $panier['id_panier'] ?>">
                    <div class="flex_center">
                        <button type="submit" class="flex_center">
                            <img src="../images/time.svg" alt="panier_livre" class="time_img">
                            Paniers en préparation et prêts
                        </button>
                    </div>
                </form>
                <form method="post" class="choix_panier flex_center">
                    <input type="hidden" name="panier_livre" value="<?php echo $panier['id_panier'] ?>">
                    <div class="flex_center">
                        <button type="submit" class="flex_center">
                            <img src="../images/camion.svg" alt="panier_livre" class="livre_img">
                            Paniers livrés
                        </button>
                    </div>
                </form>
                <form method="post" class="choix_panier flex_center">
                    <input type="hidden" name="panier_annule" value="<?php echo $panier['id_panier'] ?>">
                    <div class="flex_center">
                        <button type="submit" class="flex_center">
                            <img src="../images/panneau_interdit.svg" alt="panier_annule" class="interdit_img">
                            Paniers annulés
                        </button>
                    </div>
                </form>
            </div>
            <article>
                <div class="flex_center scroll_conteneur_y">
                    <div class="flex_space_around scrollable_y">
                        <?php foreach ($paniers as $panier) {
                            $total = 0;
                            foreach (getProduitOf($panier['id_panier']) as $produit) {
                                $total = $total + $produit['qte_produit_commandee'] * $produit['prix_produit'] * (1 - $produit['promotion_produit'] / 100);
                                $total = round($total, 2);
                            }
                            $user = getUserByID($panier['id_util']);
                            $producteur = getProducteurOf($panier['id_panier']) ?>
                            <article class="grid_parent">
                                <div class="grid_1">
                                    <div class="producteur align_center">
                                        <div class="fullW">
                                            <?php echo $producteur['nom_production'] ?>
                                        </div>
                                        <div class="img_producteur flex_center">
                                            <img class="image_producteur" src="<?php echo getUserImage($producteur['id_production']) ?>" alt="<?php echo $producteur['nom_production'] ?>_img">
                                        </div>
                                        <div class="nowrap adresse_producteur flex_center">
                                            <img class="ptmap" src="<?php echo $pathImage . '/point_map.svg' ?>" alt="ptMap.svg">
                                            <div class="flex_center">
                                                <?php echo $producteur['adresse_producteur'] ?>
                                            </div>
                                        </div>
                                        <div class="flex_center avis">
                                            <?php $moy_avis = getAVGAvisOf($producteur['id_production']); ?>
                                            <img src="<?php echo ($moy_avis >= 1) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                                            <img src="<?php echo ($moy_avis >= 2) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                                            <img src="<?php echo ($moy_avis >= 3) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                                            <img src="<?php echo ($moy_avis >= 4) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                                            <img src="<?php echo ($moy_avis == 5) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                                            <?php echo number_format($moy_avis, 2); ?>/5
                                        </div>
                                        <div class="voir_avis" onclick="location.href = 'pageProducteur.php?prod=<?php echo $producteurs[$producteur]['id_production'] ?>'">
                                            plus d'informations
                                        </div>
                                    </div>
                                </div>
                                <div class="grid_2">
                                    <div class="flex_center scroll_conteneur_x">
                                        <div class="scrollable_x">
                                            <?php
                                            foreach (getProduitOf($panier['id_panier']) as $produit) { ?>
                                                <article class="produit_commande">
                                                    <div class="produit_commande_top">
                                                        <img class="produit_commande_image" src="<?php echo getProductImage($produit['id_produit']); ?>" alt="image du produit">
                                                    </div>
                                                    <div class="grid_produit_commande_bottom_parent">
                                                        <div class="flex_left grid_produit_commande_bottom_1">
                                                            <strong><?php echo $produit['nom_produit']; ?></strong>
                                                        </div>
                                                        <div class="flex_left grid_produit_commande_bottom_2">
                                                            Quantité souhaitée :
                                                            <?php echo $produit['qte_produit_commandee'] . $produit['nom_unite'] ?>
                                                        </div>
                                                        <div class="flex_left grid_produit_commande_bottom_3">
                                                            <div class="produit_commande_initial">
                                                                Prix unitaire :
                                                                <?php echo $produit['prix_produit'] . '€/' . $produit['nom_unite'] ?>
                                                            </div>
                                                            <div class="produit_commande_promo">
                                                                <?php if (isset($produit['promotion_produit']) && $produit['promotion_produit'] !== 0) { ?>
                                                                    &nbsp;
                                                                    -
                                                                    <?php echo $produit['promotion_produit'] ?>
                                                                    %
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <?php if ($panier['id_statut'] == 1) { ?>
                                                            <div class="flex_center grid_produit_commande_bottom_4">
                                                                <form method="post" class="flex_center">
                                                                    <input type="hidden" name="supprimer_produit" value="<?php echo $panier['id_panier'] ?>">
                                                                    <input type="hidden" name="supprimer_produit_2" value="<?php echo $produit['id_produit'] ?>">
                                                                    <div class="annuler flex_center">
                                                                        <button type="submit" class="flex_center">
                                                                            <img src="../images/poubelle.svg" alt="annuler" class="annuler_img">
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="flex_center grid_produit_commande_bottom_5">
                                                            <strong><?php echo $produit['qte_produit_commandee'] * $produit['prix_produit'] * (1 - $produit['promotion_produit'] / 100) . '€' ?></strong>
                                                        </div>
                                                        <?php if ($panier['id_statut'] == 1) { ?>
                                                            <div class="flex_center grid_produit_commande_bottom_6" onclick="openPopup('<?php echo $produit['id_produit'] ?>', '<?php echo $produit['nom_produit'] ?>', '<?php echo $producteur['nom_production'] ?>', '<?php echo $produit['quantite_produit'] ?>', '<?php echo $produit['nom_unite'] ?>','<?php echo getUserImage($producteur['id_production']) ?>');">
                                                                <img src=" ../images/crayon_modif.svg" alt="modifier qte achat" class="image_crayon">
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </article>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid_3 flex_center">
                                    <?php if ($panier['id_statut'] == 1) { ?>
                                        Vous êtes actuellement en train de réaliser ce panier.
                                    <?php } ?>
                                    <?php if ($panier['id_statut'] == 2) { ?>
                                        Le panier est en cours de préparation.
                                    <?php } ?>
                                    <?php if ($panier['id_statut'] == 3) { ?>
                                        Votre panier est prêt à être récupérer.
                                    <?php } ?>
                                    <?php if ($panier['id_statut'] == 4) { ?>
                                        Vous avez récupéré ce panier. Les prix des produits et le total peuvent être différents que lors de l'achat.
                                    <?php } ?>
                                    <?php if ($panier['id_statut'] == 5) { ?>
                                        Ce panier a été refusé par le producteur
                                    <?php } ?>
                                </div>
                                <div class="grid_4 flex_center">
                                    <div class="souligne">
                                        Total :
                                    </div>
                                    <strong><?php echo '&nbsp' . $total . '€' ?></strong>
                                </div>
                                <?php if ($panier['id_statut'] == 1) { ?>
                                    <div class="grid_5 flex_space_around">
                                        <form method="post" class="flex_center">
                                            <input type="hidden" name="annuler" value="<?php echo $panier['id_panier'] ?>">
                                            <div class="annuler flex_center">
                                                <button type="submit" class="flex_center">
                                                    <img src="../images/poubelle.svg" alt="annuler" class="annuler_img">
                                                </button>
                                            </div>
                                        </form>
                                        <form method="post" class="flex_center">
                                            <input type="hidden" name="commander" value="<?php echo $panier['id_panier'] ?>">
                                            <div class="commander flex_center">
                                                <button type="submit" class="text_commander flex_center"><strong>Commander</strong></button>
                                            </div>
                                        </form>
                                    </div>
                                <?php } ?>
                                <?php if ($panier['id_statut'] == 4) { ?>
                                    <div class="grid_5 flex_center " onclick="openPopupAvis('<?php echo $panier['id_panier'] ?>')">
                                        <p class="text_avis flex_center">
                                            <strong>Mettre un avis</strong>
                                        </p>
                                    </div>
                                <?php } ?>
                            </article>
                        <?php } ?>
                    </div>
                </div>
            </article>
        </div>
    </main>
    <footer>

    </footer>
</body>

</html>