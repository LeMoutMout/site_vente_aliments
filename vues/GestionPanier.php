<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../GestionPanier.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>

    </header>
    <main>
        <div class="menu">

        </div>
        <div class="panier">
            <div class="flex_center scroll_conteneur_y">
                <div class="flex_space_around scrollable_y">
                    <?php foreach ($paniers as $panier) {
                        $total = 0;
                        foreach (getProduitOf($panier['id_panier']) as $produit) {
                            $total = $total + $produit['quantite_produit'] * $produit['prix_produit'] * (1 - $produit['promotion_produit'] / 100);
                        }
                        $user = getUserByID($panier['id_util']);
                        $producteur = getProducteurOf($panier['id_panier']) ?>
                        <article class="grid_parent">
                            <div class="grid_1">
                                <div class="producteur align_center warp">
                                    <div class="fullW">
                                        <?php echo $producteur['nom_production'] ?>
                                    </div>
                                    <div class="img_producteur align_center">
                                        <img class="auto_size" src="<?php echo getUserImage($producteur['id_production']) ?>" alt="<?php echo $producteur['nom_production'] ?>_img">
                                    </div>
                                    <div class="no_warp adresse_producteur align_center">
                                        <img class="ptmap" src="<?php echo $pathImage . '/point_map.svg' ?>" alt="ptMap.svg">
                                        <div class="align_center">
                                            <?php echo $producteur['adresse_producteur'] ?>
                                        </div>
                                    </div>
                                    <div class="align_center">
                                        <?php $moy_avis = getAVGAvisOf($producteur['id_production']); ?>
                                        <img src="<?php echo ($moy_avis >= 1) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                                        <img src="<?php echo ($moy_avis >= 2) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                                        <img src="<?php echo ($moy_avis >= 3) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                                        <img src="<?php echo ($moy_avis >= 4) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                                        <img src="<?php echo ($moy_avis == 5) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                                        <?php echo number_format($moy_avis, 2); ?>/5
                                    </div>
                                    <div class="voir_avis">
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
                            <div class="grid_3 flex_center">
                                <?php if ($panier['id_statut'] == 1) { ?>
                                    Vous êtes actuellement de réaliser ce panier.
                                <?php } ?>
                                <?php if ($panier['id_statut'] == 2) { ?>
                                    Le panier est en cours de préparation.
                                <?php } ?>
                                <?php if ($panier['id_statut'] == 3) { ?>
                                    Votre panier est prêt à être récupérer.
                                <?php } ?>
                                <?php if ($panier['id_statut'] == 4) { ?>
                                    Vous avez récupérer ce panier. Les prix des produits et le total peuvent être différent que lors de l'achat.
                                <?php } ?>
                            </div>
                            <div class="grid_4 flex_center">
                                <div class="souligne">
                                    Total :
                                </div>
                                <strong><?php echo '&nbsp' . $total . '€' ?></strong>
                            </div>
                            <div class="grid_5 flex_space_around">
                                <form method="post" class="flex_center">
                                    <div class="annuler flex_center">
                                        <button type="submit" class="flex_center">
                                            <img src="../images/poubelle.svg" alt="annuler" class="annuler_img">
                                        </button>
                                    </div>
                                </form>
                                <form method="post" class="flex_center">
                                    <div class="commander flex_center">
                                        <button type="submit" class="text_commander flex_center"><strong>Commander</strong></button>
                                    </div>
                                </form>
                            </div>
                        </article>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
    <footer>

    </footer>
</body>

</html>