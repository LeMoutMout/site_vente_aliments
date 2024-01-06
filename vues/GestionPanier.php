<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="GestionPanier.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>

    </header>
    <main>
        <div class="flex_center scroll_conteneur_y">
            <div class="flex_space_around scrollable_y">
                <?php foreach ($paniers as $panier) {
                    $total = 0;
                    foreach (getProduitOf($panier['id_panier']) as $produit) {
                        $total = $total + $produit['quantite_produit'] * $produit['prix_produit'] * (1 - $produit['promotion_produit'] / 100);
                    }
                    $user = getUserByID($panier['id_util']) ?>
                    <article class="grid_parent">
                        <div class="grid_1 flex_center">
                            <img src="<?php echo getUserImage($user['id_util']) ?>" alt="" class="commande_image_utilisateur">
                        </div>
                        <div class="grid_2">
                            <strong> <?php echo 'CCCCCCCCCCCCCCCCCCCCCCCCC &nbsp CCCCCCCCCCCCCCCCCCCCCCCCC' //$user['pren_util'] .' &nbsp'. $user['nom_util']
                                        ?> </strong>
                        </div>
                        <div class="grid_3 flex_left">
                            <?php echo $user['tel_util'] ?>
                        </div>
                        <div class="grid_4">
                            <?php echo 'CCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCC' //$user['mail_util']
                            ?>
                        </div>
                        <div class="grid_5">
                            <div class="flex_center scroll_conteneur_x">
                                <div class="scrollable_x">
                                    <?php
                                    foreach (getProduitOf($panier['id_panier']) as $produit) { ?>
                                        <article class="produit_commande">
                                            <div class="produit_commande_top">
                                                <img class="produit_commande_image" src="<?php echo getProductImage($produit['id_produit']); ?>" alt="image du produit">
                                            </div>
                                            <div class="grid_produit_commande_bottom_parent">
                                                <div class="grid_produit_commande_bottom_1">
                                                    <strong><?php echo 'CCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCC'; //$produit['nom_produit']; 
                                                            ?></strong>
                                                </div>
                                                <div class="flex_center grid_produit_commande_bottom_2">
                                                    <?php echo $produit['qte_produit_commandee'] ?>
                                                </div>
                                                <div class="flex_center grid_produit_commande_bottom_3">
                                                    <strong><?php echo $produit['qte_produit_commandee'] * $produit['prix_produit'] . '€' ?></strong>
                                                </div>
                                                <div class=" flex_center grid_produit_commande_bottom_4">
                                                    <?php echo $produit['prix_produit'] . '€/' . $produit['nom_unite'] ?>
                                                </div>
                                            </div>
                                        </article>
                                    <?php }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="grid_6 flex_space_around">
                            <form class="flex_center" method="post">
                                <input type="hidden" name="refusee" value=<?php echo $panier['id_panier'] ?>>
                                <button class="transparent_button">
                                    <img src="../images/refuser.svg" alt="refuser" class="image_refuser">
                                </button>
                            </form>
                            <?php if ($panier['id_statut'] == 2) { ?>
                                <form class="flex_center" method="post">
                                    <input type="hidden" name="prete" value=<?php echo $panier['id_panier'] ?>>
                                    <button class="transparent_button">
                                        <img src="../images/prete.svg" alt="prete" class="image_panier_encours">
                                    </button>
                                </form>
                            <?php } else { ?>
                                <form class="flex_center" method="post">
                                    <input type="hidden" name="livree" value=<?php echo $panier['id_panier'] ?>>
                                    <button class="transparent_button">
                                        <img src="../images/livree.svg" alt="livree" class="image_panier_livre">
                                    </button>
                                </form>
                            <?php } ?>
                        </div>
                        <div class="grid_7 flex_center">
                            <div class="souligne">
                                Générer un pdf :
                            </div>
                            &nbsp;
                            <form class="flex_center" method="post">
                                <input type="hidden" name="pdf" value=<?php echo $panier['id_panier'] ?>>
                                <button class="transparent_button">
                                    <img src="../images/pdf.svg" alt="pdf" class="image_pdf">
                                </button>
                            </form>
                        </div>
                        <div class="grid_8 flex_center">
                            <div class="souligne">
                                Total :
                            </div>
                            <strong><?php echo '&nbsp' . $total . '€' ?></strong>
                        </div>
                    </article>
                <?php } ?>
            </div>
        </div>
    </main>
    <footer>

    </footer>
</body>

</html>