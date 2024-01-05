<link rel="stylesheet" href="../rechercheProduit.css">
<div class="sapce_between choise_block">
    <div class="no_warp">
        <div class="align_center">
            producteur
        </div>
        <img class="checkBox" src="<?php echo $pathImage.'/choixchecked.svg'?>" alt="checkBox" onclick="producteur()">
        <div class="align_center">
            produit
        </div>
    </div>
</div>
<div class="produit_block align_center">
    <div class="bloc_scrollable flex_space_arround">
        <?php foreach ($produits as $produitAAffiche) {
            require $pathVues . '/produit.php';
        } ?>
    </div>
</div>