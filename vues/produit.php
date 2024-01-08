<link rel="stylesheet" href="../produit.css">
<div class="pr_parent">
    <div class="pr_div1 align_center">
        <img class="auto_size img_pr" src="<?php echo getProductImage($produitAAffiche['id_produit']) ?>">
    </div>
    <div class="pr_div2 align_center">
        <img class="auto_size img_producteur" src="<?php echo getUserImage($produitAAffiche['id_production']) ?>" onclick="location.href = './pageProducteur.php?prod=<?php echo $produitAAffiche['id_production'];?>'">
    </div>
    <div class="pr_div3">
        <?php echo $produitAAffiche['nom_production'] . "<br><strong>" . $produitAAffiche['nom_produit'] . "</strong>" ?>
    </div>
    <div class="pr_div4">
        <?php echo $produitAAffiche['prix_produit'] . "€/" . $produitAAffiche['nom_unite'] ?>
        <?php if (isset($produitAAffiche['promotion_produit']) && $produitAAffiche['promotion_produit'] !== 0) { ?>
        <a class="pr_val"> <?php echo "-" . $produitAAffiche['promotion_produit'] . "%" ?> </a>
        <?php } ?>
    </div>
    <div class="pr_div5" onclick="openPopup('<?php echo $produitAAffiche['id_produit'] ?>', '<?php echo $produitAAffiche['nom_produit'] ?>', '<?php echo $produitAAffiche['nom_production'] ?>', '<?php echo $produitAAffiche['quantite_produit']; ?>', '<?php echo $produitAAffiche['nom_unite']; ?>','<?php echo getUserImage($produitAAffiche['id_production']); ?>');">
        <img src="<?php echo $pathImage . '/cart.svg' ?>">
    </div>
</div>