<?php 
session_start();

var_dump($_SESSION);

session_unset();

var_dump($_SESSION);

?>
<script> 
    location.href = './index.php';
    alert ('deconnecter');
</script>