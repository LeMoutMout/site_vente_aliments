function openPopupAvis(id_panier = null) {
    document.getElementById("overlay_avis").style.display = "block";
    document.getElementById("popup_avis").style.display = "block";

    var form = document.querySelector('form');
    form.reset();

    document.querySelector('input[name="panier_avis"]').value = id_panier;
}

function closePopupAvis() {
    document.getElementById("overlay_avis").style.display = "none";
    document.getElementById("popup_avis").style.display = "none";
}