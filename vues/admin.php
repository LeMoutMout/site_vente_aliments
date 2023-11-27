<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header class="header">
        <div class="header_bloc">
            <a href="index.html">
                <h1 id="header_logo">
                    Vege<b class="header_logo_shop">Shop</b>
                </h1>
            </a>
            <div class="header_connect">
                <p class="header_connect_i">
                    <img src="<?php echo $pathImage ?>/logo_tete_compte.svg" alt="logo de création de compte"> <a href="">
                        <p class="header_connect_text">Se connecter</p>
                    </a>
                </p>
            </div>
        </div>
        <p class="header_bar">
            <svg xmlns="http://www.w3.org/2000/svg" width="1520" height="2" viewBox="0 0 1520 2" fill="none">
                <path d="M0 1L1520 1.00013" stroke="#808080" />
            </svg>
        </p>
    </header>
    <div>
        <div class="parent_g_body">
            <div class="body_g_div1">
                <!-- barre de recherche -->
                <form class="flex_center" action="" method="get">
                    <input class="text_search" type="text" name="recherche" value="<?php echo isset($_GET['recherche']) ? $_GET['recherche'] : null  ?>" require />
                    <button class="button_search">
                        <svg class="auto_size" xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 19 18" fill="none">
                            <path d="M17.5 17L13.7223 13.2156M15.8158 8.15789C15.8158 10.0563 15.0617 11.8769 13.7193 13.2193C12.3769 14.5617 10.5563 15.3158 8.65789 15.3158C6.7595 15.3158 4.93886 14.5617 3.5965 13.2193C2.25413 11.8769 1.5 10.0563 1.5 8.15789C1.5 6.2595 2.25413 4.43886 3.5965 3.0965C4.93886 1.75413 6.7595 1 8.65789 1C10.5563 1 12.3769 1.75413 13.7193 3.0965C15.0617 4.43886 15.8158 6.2595 15.8158 8.15789V8.15789Z" stroke="#808080" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </button>
                </form>
            </div>
            <div class="body_g_div2 scrollable">
                <!-- liste des utilisateur -->
                <section class="flex_space_between">
                    <?php
                    if (isset($usersSearch))
                        foreach ($usersSearch as $userSearch) {
                    ?>
                        <article class="art_user">
                            <div class="user_parent">
                                <div class="user_div1 flex_center">
                                    <img class="auto_size" src="<?php echo getUserImage($userSearch['id_util']) ?>" alt="photo de profile">
                                </div>
                                <div class="user_div2 word_break">
                                    <?php echo $userSearch['nom_util'] . " " . $userSearch['pren_util'] . "<br>" . $userSearch['mail_util'] ?>
                                </div>
                                <div class="user_div3">
                                    <form method="post">
                                        <input type="hidden" name="idUserASupr" value="<?php echo $userSearch['id_util']; ?>">
                                        <button class="transparent_button"><img class="auto_size" src="<?php echo $pathImage."/refuser.svg" ?>"></button>
                                    </form>
                                </div>
                            </div>
                        </article>
                    <?php
                        }
                    ?>
                </section>
            </div>
            <div class="body_g_div3 scrollable">
                <h3>Producteur en attente de validation</h3>
                <!-- liste des producteur a valide -->
                <?php
                if (isset($producteursNonValide))
                    foreach ($producteursNonValide as $producteurNonValide) {
                ?>
                    <article>
                        <div class="prod_parent">
                            <div class="prod_div1 flex_center">
                                <img class="auto_size" src="<?php echo getUserImage($producteurNonValide['id_producteur']) ?>" alt="photo de profile">
                            </div>
                            <div class="prod_div2 word_break">
                                <?php echo $producteurNonValide['nom_producteur'] . " " . $producteurNonValide['prenom_producteur'] . "<br>" . $producteurNonValide['mail_producteur'] ?>
                            </div>
                            <div class="prod_div3">
                                <form method="post">
                                    <input type="hidden" name="idUserAValide" value="<?php echo $producteurNonValide['id_production']; ?>">
                                    <button class="transparent_button"><img class="auto_size" src="<?php echo $pathImage."/accepte.svg" ?>"></button>
                                </form>
                            </div>
                            <div class="prod_div4">
                                <form method="post">
                                    <input type="hidden" name="idUserASupr" value="<?php echo $producteurNonValide['id_producteur']; ?>">
                                    <button class="transparent_button" ><img class="auto_size" src="<?php echo $pathImage."/refuser.svg" ?>"></button>
                                </form>
                            </div>
                        </div>
                    </article>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</body>

</html>