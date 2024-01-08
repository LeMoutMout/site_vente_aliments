<?php

require './GlobalVar.php';


require $pathModels.'/produitLecture.php';
require $pathModels.'/ProductorRead.php';

$recherchePath = "";

require $pathcontrolleurs . '/Header.php';


if (isset($_GET['recherche'])) {
    $recherche = $_GET['recherche'];
    $recherche = trim($recherche);

    if ($recherche == '') {
        $produits = getProduits();
    }else if (str_contains($_GET['recherche'],'bio')) {
        $rechercheSansBio = str_replace('bio', '', $recherche);
        $rechercheSansBio = trim($rechercheSansBio);
        $produits = getProduitsBigSearchBio($rechercheSansBio);
    }else {
        $produits = getProduitsBigSearch($recherche);
    }
}else {
    $produits = getProduits();
}



$parProduit = true;

if (isset($_GET['mode'])){
    if ($_GET['mode'] === 'producteur'){
        $parProduit = false;
        require $pathVues . '/rechercheProduitParProducteur.php';
    }
}

if ($parProduit) {
    require $pathVues . '/rechercheProduit.php';
}

$forms[] = "recherche";

?>

<script>
        // Fonction pour récupérer les paramètres de la requête GET actuelle
        function getQueryParams() {
            var params = window.location.search.substr(1).split("&");
            var queryParams = {};
            for (var i = 0; i < params.length; i++) {
                var param = params[i].split("=");
                queryParams[param[0]] = decodeURIComponent(param[1]);
            }
            return queryParams;
        }

        // Fonction pour mettre à jour l'action des deux formulaires avec les paramètres de la requête actuelle
        function updateFormActions() {
            var queryParams = getQueryParams();
            
            <?php foreach($forms as $form) {?>
                // Mettre à jour le formulaire de catégories
                var form = document.getElementById("<?php echo $form?>");
                form.action = "?" + Object.entries(queryParams).map(([key, value]) => `${key}=${value}`).join("&");
            <?php } ?>
        }

        function producteur() {
            var queryParams = getQueryParams();

            location.href = "rechercheProduitParProducteur.php?" + Object.entries(queryParams).map(([key, value]) => `${key}=${value}`).join("&");
        }

        // Appeler la fonction lors du chargement de la page
        window.onload = updateFormActions;
    </script>