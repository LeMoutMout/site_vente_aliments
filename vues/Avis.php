<script src="../avis.js"></script>
<link rel="stylesheet" href="../avis.css">
<div id="overlay_avis" class="overlay_avis"></div>
<div id="popup_avis" class="popup_avis">
    <div class="overlay_bloc_avis">
        <div class="flex_center">
            <div class="overlay_top_text">
                <strong>Avis pour la commande</strong>
            </div>
        </div>
        <form method="post">
            <input type="hidden" name="panier_avis" value="">
            <div class="overlay_mid_avis">
                <div class="flex_center">
                    Nombre d'étoiles :
                    <input type="number" name="note" id="avis_note" min="0" max="5" required>
                </div>
                <div class="flex_centers">
                    <textarea name="avis" id="avis_text" cols="120" rows="15" maxlength="255" required></textarea>
                </div>
            </div>
            <div class="overlay_bottom_avis">
                <div class="flex_center">
                    <img src="../images/panneau_interdit.svg" onclick="closePopupAvis()" alt="fermer" class="image_retour">
                    <strong>annuler</strong>
                </div>
                <div class="flex_center">
                    <input type="hidden" name="envoyer">
                    <button class="overlay_envoyer_button_avis flex_center" type="submit">
                        <img src="../images/valider_achat.svg" alt="valider" class="image_valider">
                        <strong>envoyer</strong>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>