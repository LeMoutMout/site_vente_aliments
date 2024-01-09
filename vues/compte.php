<link rel="stylesheet" href="../compte.css">
<main>
    <div class="menu">
        <div class="btn_left_bar" onclick="location.href = 'compte.php'">
            mon compte
        </div>
        <div class="btn_left_bar" onclick="location.href = 'GestionPanier.php'">
            mes paniers
        </div>

        <div class="btn_left_bar" onclick="location.href = 'resetSession.php';">
            déconnexion
        </div>
        <?php if (isProducteur($_SESSION['id_util'])) { ?>
            <div class="btn_left_bar" onclick="location.href = 'GestionProducteur.php';">
                gestion production
            </div>
        <?php } ?>
        <?php if (isAdmin($_SESSION['id_util'])) { ?>
            <div class="btn_left_bar" onclick="location.href = 'admin.php';">
                gestion compte
            </div>
        <?php } ?>
    </div>
    <div class="centre_elem warp">
        <div class="boutton" onclick="location.href = 'modificationCompte.php'">
            modifier le compte
        </div>
        <div class="boutton" onclick="location.href = 'resetSession.php'">
            déconnexion
        </div>
        <div class="boutton" onclick="location.href = 'supressionCompte.php'">
            supprimer le compte
        </div>
    </div>
</main>