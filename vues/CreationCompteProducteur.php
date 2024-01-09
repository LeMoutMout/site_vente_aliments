
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CreationCompteProducteur.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <div class="devenir_conteneur">
        <div class="devenir_bloc_1">
            <img src="../images/logo_client_compte.svg" alt="logo de client" class="logo_devenir">
            <a href="<?php echo $pathcontrolleurs . '/CreationCompteUtilisateur.php' ?>">
                <strong class="logo_devenir_text">Devenir consommateur</strong>
            </a>
        </div>
        <div class="devenir_bloc_2">
            <img src="../images/logo_fermier_compte.svg" alt="logo de fermier" class="logo_devenir">
            <a href="">
                <strong class="logo_devenir_text">Devenir vendeur producteur</strong>
            </a>
        </div>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="grid_parent">
            <div class="grid_1">
                <input class="input_bloc input_text" type="text" name="prenom" placeholder="Prénom" maxlength="25" value="<?php echo (isset($prenom)) ? $prenom : ""; ?>" required>
            </div>
            <div class="grid_2">
                <input class="input_bloc input_text" type="text" name="nom" placeholder="Nom" maxlength="25" value="<?php echo (isset($nom)) ? $nom : ""; ?>" required>
            </div>
            <div class="grid_3">
                <input class="input_bloc_image input_text" type="file" accept="image/*" name="image" placeholder="Photo de profil" required>
            </div>
            <div class="grid_4">
                <input class="input_bloc input_text" type="email" name="email" placeholder="Adresse électronique" maxlength="50" value="<?php echo (isset($email)) ? $email : ""; ?>" required>
            </div>
            <div class="grid_5">
                <input class="input_bloc input_text" type="text" name="domaine" placeholder="Domaine de production" maxlength="50" value="<?php echo (isset($domain)) ? $domain : ""; ?>" required>
            </div>
            <div class="grid_6">
                <input class="input_bloc input_text" type="tel" name="numero" placeholder="Numéro de téléphone" maxlength="10" value="<?php echo (isset($numero)) ? $numero : ""; ?>" required>
            </div>
            <div class="grid_7">
                <input class="input_bloc input_text" type="password" name="motdepasse" placeholder="Mot de passe" maxlength="25" value="<?php echo (isset($mdp)) ? $mdp : ""; ?>" required>
            </div>
            <div class="grid_8">
                <input class="input_bloc input_text" type="password" name="motdepasse2" maxlength="25" placeholder="Confirmer mot de passe" required>
            </div>
            <div class="grid_9">
                <input class="input_bloc input_text" type="text" name="adresse" placeholder="Adresse" maxlength="30" value="<?php echo (isset($adresse)) ? $adresse : ""; ?>" required>
            </div>
            <div class="grid_10">
                <textarea class="textarea_bloc textarea_text" name="description" id="" placeholder="Description :" maxlength="255"><?php echo (isset($desc)) ? $desc : ""; ?></textarea>
            </div>
            <div class="grid_11">
                <input class="input_bloc input_text" type="text" name="ville" placeholder="Ville" maxlength="15" required value="<?php echo (isset($ville)) ? $ville : ""; ?>">
            </div>
            <div class="grid_12">
                <input class="input_bloc input_text" type="text" name="cp" placeholder="Code postal" maxlength="5" value="<?php echo (isset($cp)) ? $cp : ""; ?>" required>
            </div>
            <div class="grid_13">
                <?php echo (isset($erreur)) ? $erreur . "<br>" : null; ?>
                <button class="button_bloc button_text">Créer son compte</button>
            </div>
        </div>
    </form>
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