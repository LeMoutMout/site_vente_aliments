function openPopup(id_produit, nom, stock, prix, unite, promotion, bio, categorie) {
    document.getElementById("overlay").style.display = "block";
    document.getElementById("popup").style.display = "block";
  
    var form = document.querySelector('form');
    form.reset();
  
    var gestionProduitInput = document.querySelector('input[name="achat_produit"]');
    gestionProduitInput.value = id_produit;
    fillFormWithProductDetails(nom, stock, prix, unite, bio, promotion, categorie);
  }
  
  function fillFormWithProductDetails(nom, stock, prix, unite, bio, promotion, categorie) {
    document.querySelector('input[name="nom"]').value = nom;
    document.querySelector('input[name="stock"]').value = stock;
    //document.querySelector('input[name="categorie"]').value = produit[''];
    document.querySelector('input[name="prix"]').value = prix;
    document.querySelector('input[name="unite"]').value = unite;
    document.querySelector('input[name="promotion"]').value = promotion;
    document.querySelector('input[name="bio"]').checked = bio;
  }
  
  function closePopup() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("popup").style.display = "none";
  }