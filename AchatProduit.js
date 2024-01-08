function openPopup(id_produit, nom_produit, nom_production, stock, unite, image) {
    document.getElementById("overlay_achat").style.display = "block";
    document.getElementById("popup_achat").style.display = "block";
  
    var form = document.querySelector('form');
    form.reset();
  
    var gestionProduitInput = document.querySelector('input[name="achat_produit"]');
    gestionProduitInput.value = id_produit;
    fillIdWithDetails(nom_produit, nom_production, stock, unite, image);
  }
  
  function fillIdWithDetails(nom_produit, nom_production, stock, unite, image) {
    document.getElementById('nom_produit').innerHTML = nom_produit;
    document.getElementById('nom_production').innerHTML = "Vendu par : " + nom_production;
    document.getElementById('stock').innerHTML = "Quantite disponible : " + stock + " " + unite;
    document.getElementById('quantite_achat').innerHTML = unite;
    document.getElementById('image').src = image;
    document.getElementById('quantite').max = stock
  }
  
  function closePopup() {
    document.getElementById("overlay_achat").style.display = "none";
    document.getElementById("popup_achat").style.display = "none";
  }