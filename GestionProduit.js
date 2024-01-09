function openPopup(action, id_produit = null, nom = null, stock = null, prix = null, unite = null, promotion = null, bio = null, categorie = null) {
  document.getElementById("overlay").style.display = "block";
  document.getElementById("popup").style.display = "block";

  var form = document.querySelector('form');
  form.reset();

  var gestionProduitInput = document.querySelector('input[name="gestion_produit"]');
  if (action === 'add') {
    gestionProduitInput.value = '-1';
    document.getElementById("categorie").required = true;
  } else if (action === 'edit' && id_produit !== null) {
    gestionProduitInput.value = id_produit;
    fillFormWithProductDetails(nom, stock, prix, unite, bio, promotion, categorie);
  }
}

function fillFormWithProductDetails(nom, stock, prix, unite, bio, promotion, categorie) {
  document.querySelector('input[name="nom"]').value = nom;
  document.querySelector('input[name="stock"]').value = stock;
  document.querySelector('input[name="prix"]').value = prix;
  document.querySelector('input[name="promotion"]').value = promotion;
  document.querySelector('input[name="bio"]').checked = bio;

  var unites = document.getElementById("unite");

  for (var i = 0; i < unites.options.length; i++) {
    if (unites.options[i].innerHTML === unite) {
      unites.options[i].selected = true;
      break;
    }
  }
}

function closePopup() {
  document.getElementById("overlay").style.display = "none";
  document.getElementById("popup").style.display = "none";
}