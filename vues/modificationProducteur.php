<link rel="stylesheet" href="../modificationProducteur.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<form class="bloc" action="" method="post" enctype="multipart/form-data">
    <div class="grid_parent">
        <div class="grid_1">
            <input class="input_bloc input_text" type="text" name="prenom" placeholder="Prénom" maxlength="25" value="<?php echo (isset($prenom)) ? $prenom : ""; ?>" required>
        </div>
        <div class="grid_2">
            <input class="input_bloc input_text" type="text" name="nom" placeholder="Nom" maxlength="25" value="<?php echo (isset($nom)) ? $nom : ""; ?>" required>
        </div>
        <div class="grid_3">
            <input class="input_bloc_image input_text" type="file" accept="image/*" name="image" placeholder="Photo de profil">
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
        <div class="grid_9">
            <input class="input_bloc input_text" type="text" name="adresse" placeholder="Adresse" maxlength="30" value="<?php echo (isset($adresse)) ? $adresse : ""; ?>" required>
        </div>
        <div class="grid_10">
            <textarea class="textarea_bloc textarea_text" name="description" id="" placeholder="Description :" maxlength="255"><?php echo (isset($desc)) ? $desc : ""; ?></textarea>
        </div>
        <div class="grid_13">
            <?php echo (isset($erreur)) ? $erreur . "<br>" : null; ?>
            <button class="button_bloc button_text">Créer son compte</button>
        </div>
    </div>
</form>