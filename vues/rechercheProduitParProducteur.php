<link rel="stylesheet" href="../rechercheProduit.css">
<div class="sapce_between choise_block">
    <div class="no_warp">
        <div class="align_center">
            producteur
        </div>
        <img class="checkBox" src="<?php echo $pathImage . '/choixunchecked.svg' ?>" alt="checkBox" onclick="produit()">
        <div class="align_center">
            produit
        </div>
    </div>
</div>

<div class="produit_block align_center">
    <div class="flex_space_arround bloc_scrollable">
        <?php foreach ($producteurProduit as $producteur => $produits) {
            if (!empty($produits)) { ?>
                <div class="no_warp productor_block">
                    <!--sa commence la-->
                    <div class="producteur align_center warp">
                        <div class="fullW">
                            <?php echo $producteurs[$producteur]['nom_production'] ?>
                        </div>
                        <div class="img_producteur align_center">
                            <img class="auto_size" src="<?php echo getUserImage($producteurs[$producteur]['id_production']) ?>" alt="<?php echo $producteurs[$producteur]['nom_production'] ?>_img">
                        </div>
                        <div class="no_warp adresse_producteur align_center">
                            <img class="ptmap" src="<?php echo $pathImage . '/point_map.svg' ?>" alt="ptMap.svg">
                            <div class="align_center">
                                <?php echo $producteurs[$producteur]['adresse_producteur'] ?>
                            </div>
                        </div>
                        <div class="align_center">
                            <?php $moy_avis = getAVGAvisOf($producteurs[$producteur]['id_production']); ?>
                            <img src="<?php echo ($moy_avis >= 1) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                            <img src="<?php echo ($moy_avis >= 2) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                            <img src="<?php echo ($moy_avis >= 3) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                            <img src="<?php echo ($moy_avis >= 4) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                            <img src="<?php echo ($moy_avis == 5) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                            <?php echo number_format($moy_avis, 2); ?>/5
                        </div>
                        <div class="voir_avis">
                            plus d'information
                        </div>
                    </div>
                    <!--sa fini la-->
                    <div class="bloc_scrollable flex_space_arround">
                        <?php foreach ($produits as $produitAAffiche) {
                            require $pathVues . '/produit.php';
                        } ?>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>