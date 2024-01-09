<link rel="stylesheet" href="../modificationUtilisateur.css">
<form class="bloc" action="" method="post" enctype="multipart/form-data">
	<div class="grid_parent">
		<div class="grid_1">
			<input class="input_bloc input_text" type="text" name="prenom" placeholder="Prénom" value="<?php echo (isset($prenom)) ? $prenom : ""; ?>" required>
		</div>
		<div class="grid_2">
			<input class="input_bloc input_text" type="text" name="nom" placeholder="Nom" value="<?php echo (isset($nom)) ? $nom : ""; ?>" required>
		</div>
		<div class="grid_3">
			<input class="input_bloc_image input_text" type="file" accept="image/*" name="image" id="image" value="<?php echo (isset($image)) ? $image : ""; ?>" placeholder="Photo de profil" required>
		</div>
		<div class="grid_4">
			<input class="input_bloc input_text" type="email" name="email" placeholder="Adresse électronique" value="<?php echo (isset($email)) ? $email : ""; ?>" required>
		</div>
		<div class="grid_5">
			<input class="input_bloc input_text" type="tel" name="numero" placeholder="Numéro de téléphone" value="<?php echo (isset($numero)) ? $numero : ""; ?>">
		</div>
		<div class="grid_8">
			<input class="input_bloc input_text" type="text" name="adresse" placeholder="Adresse" required value="<?php echo (isset($adresse)) ? $adresse : ""; ?>">
		</div>
		<div class="grid_11">
			<?php echo (isset($erreur)) ? $erreur . "<br>" : null; ?>
			<button class="button_bloc button_text">Modifier son compte</button>
		</div>
	</div>
</form>