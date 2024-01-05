<div id="overlay" class="overlay"></div>
<div id="popup" class="popup">
    <input type="hidden" name="achat_produit" value="">
    <div class="overlay_bloc">
        <div class="overlay_top">
            <div class="overlay_top_left">
                <p class="text_produit">
                    <?php echo $produit['nom_produit'] ?>
                </p>
                <p class="text_production">
                    Vendu par :
                    <?php echo $produit['nom_production'] ?>
                </p>
            </div>
            <div class="overlay_top_right">
                <div class="overlay_retour">
                    <img src="../images/refuser.svg" onclick="closePopup()" alt="fermer" />
                </div>
                <div class="image_utilisateur">
                    <img src="<?php echo getUserImage($produit['id_produit']); ?>" alt="image production">
                </div>
            </div>
        </div>
        <div class="overlay_mid">
            <p>
                Quantité disponible : 
                <?php echo $produit['quantite_produit']?>
                <?php echo $produit['nom_unite']?>
            </p>
            <div>
                <form action="post">
                    <p>
                        Vous souhaitez commander : 
                        <input type="number" name="quantite" placeholder="0" min="0.01" 
                        max="<?php echo $produit['quantite_produit']?>" step="0.01" required>
                        <?php echo $produit['nom_unite']?>
                    </p>
                </form>
            </div>
        </div>
        <div class="overlay_bottom">

        </div>
    </div>
</div>