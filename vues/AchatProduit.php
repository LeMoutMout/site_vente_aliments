<script src="../AchatProduit.js"></script>
<link rel="stylesheet" href="../AchatProduit.css">
<div id="overlay_achat" class="overlay_achat"></div>
<div id="popup_achat" class="popup_achat">
    <div class="overlay_bloc_achat">
        <div class="overlay_top_achat">
            <div class="overlay_top_left_achat">
                <p id="nom_produit" class="text_produit"></p>
                <p id="nom_production" class="text_production"></p>
            </div>
            <div class="overlay_top_right_achat">
                <div class="overlay_retour_achat">
                    <img src="../images/refuser.svg" onclick="closePopup()" alt="fermer" />
                </div>
                <div class="image_utilisateur_div">
                    <img id="image" alt="image production" class="image_utilisateur">
                </div>
            </div>
        </div>
        <div class="overlay_bottom_achat">
            <p id="stock" class="overlay_bottom_left_achat"></p>
            <div class="overlay_bottom_right_achat">
                <form method="post" class="form">
                    <input type="hidden" name="achat_produit">
                    <div class="overlay_bottom_right_left_achat">
                        <p class="text_souhait">
                            Vous souhaitez commander :
                        </p>
                        &nbsp;
                        <input class="input_achat" type="number" id="quantite" name="quantite" placeholder="0" min="0.01" step="0.01" required>
                        &nbsp;
                        <p id="quantite_achat" class="text_souhait"></p>
                    </div>
                    <button class="overlay_bottom_right_right_achat" type="submit">
                        <img src="../images/valider_achat.svg" alt="valider" class="image_valider">
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>