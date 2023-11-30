<div id="overlay" class="overlay"></div>
<div id="popup" class="popup">
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="gestion_produit" value="">
        <div class="overlay_bloc">
            <div class="overlay_top">
                <div class="overlay_image_produit">
                    <input type="file" accept="image/*" name="image" placeholder="Photo du produit">
                </div>
                <div class="overlay_contenu">
                    <div class="overlay_nom_text">
                        Nom :
                    </div>
                    <div class="overlay_nom_completion">
                        <input type="text" name="nom" placeholder="Nom du produit" required>
                    </div>
                    <div class="overlay_stock_glob">
                        <div class="overlay_stock_text">
                            Stock :
                        </div>
                        &nbsp;
                        <div class="overlay_stock_qte">
                            <input type="number" name="stock" placeholder="0" min="0" required>
                        </div>
                    </div>
                    <div class="overlay_categorie_glob">
                        <div class="overlay_categorie_text">
                            Categorie :
                        </div>
                        &nbsp;
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
                            Prix :
                        </div>
                        &nbsp;
                        <div class="overlay_prix_modif">
                            <input type="number" name="prix" placeholder="0" min="0" step="0.1" required>
                        </div>
                        €/
                        <div class="overlay_unite">
                            <input type="search" name="unite">
                        </div>

                    </div>
                    <div class="overlay_promotion_glob">
                        <div class="overlay_promotion_text">
                            Promotion :
                        </div>
                        &nbsp;
                        <div class="overlay_promotion_modif">
                            <input type="number" name="promotion" min="0" max="100">
                        </div>
                        %
                    </div>
                </div>
                <div class="overlay_bottom_bottom">
                    <input type="checkbox" class="overlay_image_bio" name="bio" value="checked">
                    <img src="../images/bio.svg" alt="sauvegarder">
                    </input>
                    <button class="overlay_image_save" type="submit" name="save">
                        <img src="../images/save.svg" alt="sauvegarder">
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>