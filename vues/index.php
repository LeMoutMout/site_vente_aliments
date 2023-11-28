<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../connexion.css">
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="../styleguide.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>

<body>
    <script src="../connexion.js"></script>
    <header class="header">
        <div class="header_bloc">
            <a href="index.html">
                <h1 id="header_logo">Vege<b class="header_logo_shop">Shop</b></h1>
            </a>

            <div class="header_connect">
                <p class="header_connect_i">
                    <i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 0C5.4948 0 0 5.4948 0 12C0 18.5052 5.4948 24 12 24C18.5052 24 24 18.5052 24 12C24 5.4948 18.5052 0 12 0ZM12 6C14.0724 6 15.6 7.5264 15.6 9.6C15.6 11.6736 14.0724 13.2 12 13.2C9.9288 13.2 8.4 11.6736 8.4 9.6C8.4 7.5264 9.9288 6 12 6ZM5.8728 17.7264C6.9492 16.1424 8.7444 15.0864 10.8 15.0864H13.2C15.2568 15.0864 17.0508 16.1424 18.1272 17.7264C16.5936 19.368 14.418 20.4 12 20.4C9.582 20.4 7.4064 19.368 5.8728 17.7264Z" fill="black" />
                        </svg></i>
                </p>
                <p class="header_connect_text" onclick="openPopup();">Se connecter</p></a>
            </div>
        </div>
        <p class="header_bar"><svg xmlns="http://www.w3.org/2000/svg" width="1520" height="2" viewBox="0 0 1520 2" fill="none">
                <path d="M0 1L1520 1.00013" stroke="#808080" />
            </svg></p>
        <nav class="header_nav">
            <div class="header_producter">
                <i class="header_producter_logo"><svg xmlns="http://www.w3.org/2000/svg" width="37" height="36" viewBox="0 0 37 36" fill="none">
                        <g clip-path="url(#clip0_222_309)">
                            <path d="M36.5 36V34C36.5 32.4087 35.8679 30.8826 34.7426 29.7574C33.6174 28.6321 32.0913 28 30.5 28H14.5C12.9087 28 11.3826 28.6321 10.2574 29.7574C9.13214 30.8826 8.5 32.4087 8.5 34V36H36.5Z" fill="#77B255" />
                            <path d="M22.5 34C23.267 34 27.5 31 27.5 28H17.5C17.5 31 21.733 34 22.5 34Z" fill="#3E721D" />
                            <path d="M18.14 28.038C18.14 30.884 26.86 31 26.86 28.038V24.289H18.14V28.038Z" fill="#FFDC5D" />
                            <path d="M18.132 25.973C19.348 27.347 20.856 27.719 22.496 27.719C24.135 27.719 25.643 27.347 26.86 25.973V22.482H18.132V25.973Z" fill="#F9CA55" />
                            <path d="M25.652 3.30001C23.727 2.67701 19.776 2.84001 18.644 4.31201C16.771 4.34801 17.048 8.02201 13.531 7.27901C12.793 8.28301 12.272 9.47701 12.107 10.755C11.659 14.23 12.342 15.629 12.698 18.241C13.101 21.201 14.765 22.148 16.095 22.544C18.009 25.073 20.044 24.965 23.461 24.965C30.133 24.965 32.732 20.507 33.013 12.925C33.093 10.768 32.54 8.85801 31.429 7.27601C27.592 8.76601 28.216 4.13001 25.652 3.30001Z" fill="#FFAC33" />
                            <path d="M30.047 13.243C29.401 12.349 28.575 11.629 26.763 11.375C27.443 11.686 28.637 13.577 28.722 14.172C28.807 14.767 28.892 15.248 28.354 14.653C26.199 12.271 23.309 12.394 20.984 10.939C19.36 9.923 18.865 8.798 18.865 8.798C18.865 8.798 18.667 10.298 16.204 11.827C15.49 12.27 14.638 13.257 14.166 14.715C13.826 15.763 13.932 16.697 13.932 18.293C13.932 22.953 17.773 26.871 22.51 26.871C27.247 26.871 31.088 22.918 31.088 18.293C31.086 15.395 30.783 14.263 30.047 13.243Z" fill="#FFDC5D" />
                            <path d="M23.461 20.677H21.555C21.4285 20.677 21.3072 20.6267 21.2177 20.5373C21.1283 20.4478 21.078 20.3265 21.078 20.2C21.078 20.0735 21.1283 19.9522 21.2177 19.8627C21.3072 19.7732 21.4285 19.723 21.555 19.723H23.461C23.5875 19.723 23.7088 19.7732 23.7983 19.8627C23.8877 19.9522 23.938 20.0735 23.938 20.2C23.938 20.3265 23.8877 20.4478 23.7983 20.5373C23.7088 20.6267 23.5875 20.677 23.461 20.677Z" fill="#C1694F" />
                            <path d="M18.6949 17.341C18.4422 17.341 18.1998 17.2406 18.0211 17.0619C17.8423 16.8831 17.7419 16.6407 17.7419 16.388V15.435C17.7419 15.1822 17.8423 14.9398 18.0211 14.7611C18.1998 14.5824 18.4422 14.482 18.6949 14.482C18.9477 14.482 19.1901 14.5824 19.3688 14.7611C19.5475 14.9398 19.6479 15.1822 19.6479 15.435V16.388C19.6479 16.6407 19.5475 16.8831 19.3688 17.0619C19.1901 17.2406 18.9477 17.341 18.6949 17.341ZM26.3209 17.341C26.0682 17.341 25.8258 17.2406 25.6471 17.0619C25.4683 16.8831 25.3679 16.6407 25.3679 16.388V15.435C25.3679 15.1822 25.4683 14.9398 25.6471 14.7611C25.8258 14.5824 26.0682 14.482 26.3209 14.482C26.5737 14.482 26.8161 14.5824 26.9948 14.7611C27.1735 14.9398 27.2739 15.1822 27.2739 15.435V16.388C27.2739 16.6407 27.1735 16.8831 26.9948 17.0619C26.8161 17.2406 26.5737 17.341 26.3209 17.341Z" fill="#662113" />
                            <path d="M22.634 24.657C19.88 24.657 19.034 23.952 18.893 23.809C18.8306 23.7498 18.7805 23.6788 18.7455 23.6003C18.7106 23.5217 18.6914 23.437 18.6892 23.351C18.6847 23.1773 18.7494 23.009 18.869 22.883C18.9886 22.757 19.1533 22.6837 19.327 22.6792C19.5007 22.6747 19.669 22.7394 19.795 22.859C19.847 22.896 20.516 23.346 22.634 23.346C24.834 23.346 25.47 22.861 25.476 22.856C25.5364 22.7961 25.6082 22.7489 25.6871 22.7171C25.7661 22.6854 25.8506 22.6698 25.9356 22.6712C26.0207 22.6726 26.1046 22.691 26.1825 22.7253C26.2603 22.7596 26.3305 22.8091 26.389 22.871C26.5102 22.9981 26.5766 23.1677 26.574 23.3434C26.5714 23.519 26.4999 23.6866 26.375 23.81C26.233 23.952 25.388 24.657 22.634 24.657Z" fill="#C1694F" />
                            <path d="M13.5 28H16.5V36H13.5V28ZM28.5 28H31.5V36H28.5V28Z" fill="#3B88C3" />
                            <path d="M13.625 35H31.5V36H13.625V35Z" fill="#3B88C3" />
                            <path d="M30.5 8.8C30.5 10.12 27.408 11 22.5 11C17.591 11 14.5 10.12 14.5 8.8C14.5 5.253 18.5 0 19.833 0C21.167 0 22.056 1.76 22.5 1.76C22.944 1.76 23.833 0 25.167 0C26.5 0 30.5 5.253 30.5 8.8Z" fill="#C1694F" />
                            <path d="M36.441 8C36.441 9.657 32.941 14 22.441 14C11.941 14 8.44104 9.657 8.44104 8C8.44104 6.343 15.261 7 22.441 7C29.621 7 36.441 6.343 36.441 8Z" fill="#C1694F" />
                            <path d="M30.5 8.8C30.5 10.12 27.408 11 22.5 11C17.591 11 14.5 10.12 14.5 8.8C14.5 8.234 14.602 7.625 14.779 7C17.167 9 27.833 9 30.222 7.004C30.397 7.627 30.5 8.235 30.5 8.8Z" fill="#292F33" />
                            <path d="M7.5 31.75C7.5 31.4185 7.3683 31.1005 7.13388 30.8661C6.89946 30.6317 6.58152 30.5 6.25 30.5C5.91848 30.5 5.60054 30.6317 5.36612 30.8661C5.1317 31.1005 5 31.4185 5 31.75V36H7.5V31.75Z" fill="#C1694F" />
                            <path d="M10.503 22.75C10.503 25.1 8.599 27.003 6.25 27.003C3.901 27.003 1.997 25.1 1.997 22.75C1.997 22.664 0.5 22.666 0.5 22.75C0.5 24.275 1.1058 25.7375 2.18414 26.8159C3.26247 27.8942 4.72501 28.5 6.25 28.5C7.77499 28.5 9.23753 27.8942 10.3159 26.8159C11.3942 25.7375 12 24.275 12 22.75C12 22.666 10.503 22.664 10.503 22.75Z" fill="#66757F" />
                            <path d="M2 22.75C2 22.9489 1.92098 23.1397 1.78033 23.2803C1.63968 23.421 1.44891 23.5 1.25 23.5C1.05109 23.5 0.860322 23.421 0.71967 23.2803C0.579018 23.1397 0.5 22.9489 0.5 22.75V14.25C0.5 14.0511 0.579018 13.8603 0.71967 13.7197C0.860322 13.579 1.05109 13.5 1.25 13.5C1.44891 13.5 1.63968 13.579 1.78033 13.7197C1.92098 13.8603 2 14.0511 2 14.25V22.75ZM12 22.75C12 22.9489 11.921 23.1397 11.7803 23.2803C11.6397 23.421 11.4489 23.5 11.25 23.5C11.0511 23.5 10.8603 23.421 10.7197 23.2803C10.579 23.1397 10.5 22.9489 10.5 22.75V14.25C10.5 14.0511 10.579 13.8603 10.7197 13.7197C10.8603 13.579 11.0511 13.5 11.25 13.5C11.4489 13.5 11.6397 13.579 11.7803 13.7197C11.921 13.8603 12 14.0511 12 14.25V22.75ZM7 31C7 31.1989 6.92098 31.3897 6.78033 31.5303C6.63968 31.671 6.44891 31.75 6.25 31.75C6.05109 31.75 5.86032 31.671 5.71967 31.5303C5.57902 31.3897 5.5 31.1989 5.5 31V14.25C5.5 14.0511 5.57902 13.8603 5.71967 13.7197C5.86032 13.579 6.05109 13.5 6.25 13.5C6.44891 13.5 6.63968 13.579 6.78033 13.7197C6.92098 13.8603 7 14.0511 7 14.25V31Z" fill="#66757F" />
                        </g>
                        <defs>
                            <clipPath id="clip0_222_309">
                                <rect width="36" height="36" fill="white" transform="translate(0.5)" />
                            </clipPath>
                        </defs>
                    </svg></i><a href=""><strong class="header_producter_text">Devenir vendeur producteur</strong></a>
            </div>
            <div class="searchbar" id="header_search">
                <input class="header_search_bar" type="text" placeholder="Rechercher...">
                <button class="header_search_bar_button"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                        <path d="M17.5 17L13.7223 13.2156M15.8158 8.15789C15.8158 10.0563 15.0617 11.8769 13.7193 13.2193C12.3769 14.5617 10.5563 15.3158 8.65789 15.3158C6.7595 15.3158 4.93886 14.5617 3.5965 13.2193C2.25413 11.8769 1.5 10.0563 1.5 8.15789C1.5 6.2595 2.25413 4.43886 3.5965 3.0965C4.93886 1.75413 6.7595 1 8.65789 1C10.5563 1 12.3769 1.75413 13.7193 3.0965C15.0617 4.43886 15.8158 6.2595 15.8158 8.15789V8.15789Z" stroke="#808080" stroke-width="2" stroke-linecap="round" />
                    </svg></button>
            </div>
            <div class="header_cart">
                <i class="header_cart_logo"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M17 18C17.5304 18 18.0391 18.2107 18.4142 18.5858C18.7893 18.9609 19 19.4696 19 20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22C16.4696 22 15.9609 21.7893 15.5858 21.4142C15.2107 21.0391 15 20.5304 15 20C15 18.89 15.89 18 17 18ZM1 2H4.27L5.21 4H20C20.2652 4 20.5196 4.10536 20.7071 4.29289C20.8946 4.48043 21 4.73478 21 5C21 5.17 20.95 5.34 20.88 5.5L17.3 11.97C16.96 12.58 16.3 13 15.55 13H8.1L7.2 14.63L7.17 14.75C7.17 14.8163 7.19634 14.8799 7.24322 14.9268C7.29011 14.9737 7.3537 15 7.42 15H19V17H7C6.46957 17 5.96086 16.7893 5.58579 16.4142C5.21071 16.0391 5 15.5304 5 15C5 14.65 5.09 14.32 5.24 14.04L6.6 11.59L3 4H1V2ZM7 18C7.53043 18 8.03914 18.2107 8.41421 18.5858C8.78929 18.9609 9 19.4696 9 20C9 20.5304 8.78929 21.0391 8.41421 21.4142C8.03914 21.7893 7.53043 22 7 22C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20C5 18.89 5.89 18 7 18ZM16 11L18.78 6H6.14L8.5 11H16Z" fill="black" />
                    </svg></i><a href="panier.html"><strong class="header_cart_text">Mes Paniers</strong></a>
            </div>
        </nav>
        <nav class="header_menu">
            <a class="header_menu_list" href="">Fruits & Légumes</a>
            <a class="header_menu_list" href="">Viandes & Poissons</a>
            <a class="header_menu_list" href="">Vin & Bières</a>
            <a class="header_menu_list" href="">Charcuterie & Traiteur</a>
            <a class="header_menu_list" href="">Produits Bio</a>
            <a class="header_menu_list" href="">Fromages et crémerie</a>
            <a class="header_menu_list" href="">Epicerie Sucrée</a>
            <a class="header_menu_list" href="">Epicerie Salée</a>
            <a class="header_menu_list" href="">Boissons</a>
        </nav>
        <div id="overlay" class="overlay"></div>
        <div id="popup" class="popup">
            <div class="connexion">
                <div class="div">
                    <form action="connect" method="post">
                        <div class="text-wrapper">Connexion</div>

                        <div class="group">
                            <input class="rectangle" type="email" id="email" name="email" placeholder="Adresse mail" required />
                        </div>

                        <div class="overlap-wrapper">
                            <input class="rectangle" type="password" id="password" name="password" placeholder="Mot de passe" required />
                        </div>

                        <div class="text-wrapper-4">
                            <a href="MotDePasseOublie.php">Mot de passe oublié</a>
                        </div>

                        <div class="overlap-group-wrapper">
                            <input class="rectangle" type="submit" value="Se connecter" />
                        </div>

                        <div class="text-wrapper-6">
                            <a href="CreationCompteUtilisateur.php">Créer son compte</a>
                        </div>
                    </form>

                    <img id="croix" class="vector" src="./images/Vector.png" onclick="closePopup()" />
                </div>
            </div>
        </div>
    </header>

    <div class="body_1_parent">
        <div class="body_1_div1">
            <div class="main_slogan_text">
                Bien plus qu'un marché en ligne, une vitrine pour nos producteurs !
            </div>
        </div>
        <div class="body_1_div2">
            <div class="bloc_scrollable">
                <?php foreach($promos as $promo) {?>
                    <div class="promo_parent">
                        <div class="promo_div1">
                            <img class="auto_size" src="<?php echo getProductImage($promo['id_produit']) ?>">
                        </div>
                        <div class="promo_div2">
                            <img class="auto_size" src="<?php echo getUserImage($promo['id_production']) ?>">
                        </div>
                        <div class="promo_div3">
                            <?php echo $promo['nom_production']."<br>".$promo['nom_produit'] ?>
                        </div>
                        <div class="promo_div4">
                            <?php echo $promo['prix_produit']."/".$promo['nom_unite'] ?>
                        </div>
                        <div class="promo_div5">
                            
                        </div>
                    </div>
                <?php
                } 
                ?>
            </div>
        </div>
    </div>
</body>

</html>