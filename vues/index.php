<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../connexion.css">
  <link rel="stylesheet" href="../index.css">
  <link rel="stylesheet" href="../styleguide.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accueil</title>
</head>
  <div class="body_1_parent">
    <div class="body_1_div1">
      <div class="main_slogan_text">
        Bien plus qu'un marché en ligne, une vitrine pour nos producteurs !
      </div>
    </div>
    <div class="body_1_div2">
      <!-- promotion -->
      <div class="titre">
        Promotions
      </div>
      <div class="bloc_scrollable flex_space_arround">
        <?php foreach ($promos as $produitAAffiche) { 
          require $pathVues .'/produit.php';
        }
        ?>
      </div>
    </div>
  </div>
  <div class="tracteur">
    <div class="tracteur_div1 align_center">
      <img class="auto_size flou" src="<?php echo $pathImage . '/tracteur2.png' ?>">
    </div>
    <div class="tracteur_div2 align_center">
      <img class="auto_size" src="<?php echo $pathImage . '/surTracteurFlou.svg' ?>">
    </div>
  </div>
  <div class="align_center">
    <div class="titre">
      Des produits de VegeShop
    </div>
  </div>
  <div class="produit_block align_center">
    <div class="bloc_scrollable flex_space_arround">
      <?php foreach ($produits as $produitAAffiche) { 
         require $pathVues . '/produit.php';
       } ?>
    </div>
  </div>
  <div class="align_center">
    <!--verifier path-->
    <form class="recherche_form" action="<?php echo $pathControlleurs . '/rechercheProduit.php' //TODO verifier le chemin 
                                          ?>">
      <!--verifier path-->
      <button class="recherche_button align_center">
        <img class="img_btn_recherche align_center" src="<?php echo $pathImage . '/boite.svg' ?>">
        <div class="txt_btn_recherche align_center">
          Voir plus de produits
        </div>
      </button>
    </form>
  </div>
  <div class="align_center">
    <div class="titre">
      Nos meilleurs producteurs
    </div>
  </div>
  <div class="align_center">
    <div class="producteur_list">
      <div class="bloc_scrollable flex_space_arround">
        <?php foreach ($producteurs as $producteur) { ?>
          <section class="producteur_block producteur_parent">
            <div class="producteur_div1 align_center">
              <img src="<?php echo getUserImage($producteur['id_production']) ?>" alt="image de profil producteur" class="image_producteur">
            </div>
            <div class="producteur_div2">
              <strong><?php echo $producteur['nom_production'] ?></strong>
            </div>
            <?php $moy_avis = getAVGAvisOf($producteur['id_production']); ?>
            <div class="producteur_div3 flex_left">
              <img src="<?php echo ($moy_avis >= 1) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
              <img src="<?php echo ($moy_avis >= 2) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
              <img src="<?php echo ($moy_avis >= 3) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
              <img src="<?php echo ($moy_avis >= 4) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
              <img src="<?php echo ($moy_avis == 5) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
              <p class="avis_producteur_text">
                <?php echo getNbAvisOf($producteur['id_production']) ?> avis
              </p>
            </div>
            <div class="producteur_div4 flex_left">
                <img src="../images/point_map.svg" alt="point map" class="image_map">
                <p class="adresse_text">
                  <?php echo $producteur['adresse_producteur']; ?>
                </p>
            </div>
            <div class="producteur_div5">
              <?php echo $producteur['descr_production']; ?>
            </div>
            <div class="producteur_div6 align_center">
              <img src="../images/produit_logo.svg" alt="image panier produit" class="image_panier">
              <a class="align_center">
                <strong class="nb_produit_text"><?php echo getNbProduitsOf($producteur['id_production']); ?></strong>
                <p class="grid_1_6_produit_text">
                  <?php echo (getNbProduitsOf($producteur['id_production']) > 1) ? "Produits" : "Produit"; ?>
                </p>
              </a>
            </div>
          </section>
        <?php } ?>
      </div>
    </div>
  </div>
</body>

</html>