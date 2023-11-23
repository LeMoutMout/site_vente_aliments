<!DOCTYPE html>
<html lang="Francais">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../GestionProducteur.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>

    </header>
    <div class="main_conteneur">
        <main class="main_grid_parent">
            <section class="main_grid_1 grid_1_parent">
                <div class="grid_1_1 flex_center">
                    <img src="<?php echo $image_producteur ?>" alt="image de profil producteur" height="170" width="170">
                </div>
                <div class="grid_1_2">
                    <p class="nom_production_text"><strong><?php echo $nom_producteur ?></strong></p>
                </div>
                <div class="grid_1_3 flex_left">
                    <img src="<?php echo ($moy_avis > 0) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                    <img src="<?php echo ($moy_avis > 1) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                    <img src="<?php echo ($moy_avis > 2) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                    <img src="<?php echo ($moy_avis > 3) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                    <img src="<?php echo ($moy_avis > 4) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                    <p class="avis_producteur_text">
                        <?php echo $nb_avis ?> avis
                    </p>
                </div>
                <div class="grid_1_4">
                    <h3 class="flex_left">
                        <img src="../images/point_map.svg" alt="point map">
                        <p style="margin-left: 20px;">
                            <?php echo $adresse ?>
                        </p>
                    </h3>
                </div>
                <div class="grid_1_5">
                    <p class="desc_production_text">
                        <?php echo $desc ?>
                    </p>
                </div>
                <div class="grid_1_6 flex_center">
                    <img src="../images/produit_logo" alt="image produit">
                    <?php echo $nb_produits ?>
                    <?php echo ($nb_produits > 1) ? "Produits" : "Produit"; ?>
                </div>
            </section>
            <section class="main_grid_2">
                <p class="flex_center">
                    Produits / Stocks
                </p>
                <div>
                    <?php
                    foreach ($produits as $produit) { ?>
                        <article>
                            <img src="" alt="">
                        </article>
                    <?php }
                    ?>
                    <div>

                    </div>
                </div>
            </section>
            <section class="main_grid_3">
                <p class="flex_center">
                    Avis
                </p>
                <div>
                    <div>
                        <img src="<?php echo ($moy_avis > 0) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                        <img src="<?php echo ($moy_avis > 1) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                        <img src="<?php echo ($moy_avis > 2) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                        <img src="<?php echo ($moy_avis > 3) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                        <img src="<?php echo ($moy_avis > 4) ? "../images/full_star.svg" : "../images/empty_star.svg"; ?>" alt="etoile" class="avis_etoile">
                        <p class="avis_producteur_text">
                            <?php echo $note_avis ?> étoiles
                        </p>
                    </div>
                </div>
            </section>
            <section class="main_grid_4">

            </section>
        </main>
    </div>
    <footer class="footer">
        <div class="footer_bloc">
            <h1 class="footer_title">Vege<b class="footer_title_weight">Shop</b></h1>
            <nav class="footer_list">
                <a class="list_name" href="">A propos de nous</a>
                <a class="list_name" href="">Contact</a>
                <a class="list_name" href="">Aide</a>
            </nav>
            <div class="footer_language">
                <i class="language_logo"><svg xmlns="http://www.w3.org/2000/svg" width="37" height="36" viewBox="0 0 37 36" fill="none">
                        <g clip-path="url(#clip0_222_80)">
                            <path d="M36.2307 27C36.2307 28.0609 35.8093 29.0783 35.0591 29.8284C34.309 30.5786 33.2916 31 32.2307 31H24.2307V5H32.2307C33.2916 5 34.309 5.42143 35.0591 6.17157C35.8093 6.92172 36.2307 7.93913 36.2307 9V27Z" fill="#ED2939" />
                            <path d="M4.23071 5C3.16985 5 2.15243 5.42143 1.40229 6.17157C0.65214 6.92172 0.230713 7.93913 0.230713 9L0.230713 27C0.230713 28.0609 0.65214 29.0783 1.40229 29.8284C2.15243 30.5786 3.16985 31 4.23071 31H12.2307V5H4.23071Z" fill="#002495" />
                            <path d="M12.2307 5H24.2307V31H12.2307V5Z" fill="#EEEEEE" />
                        </g>
                        <defs>
                            <clipPath id="clip0_222_80">
                                <rect width="36" height="36" fill="white" transform="translate(0.230713)" />
                            </clipPath>
                        </defs>
                    </svg></i>
                <p class="language_text">Francais</p>
            </div>
        </div>
    </footer>
</body>

</html>