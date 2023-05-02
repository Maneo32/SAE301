<?php
session_start();

include("../../View/Accueil/nouveauMDPAnglais.html");

?>

<?php
require("../../Modele/Accueil/NouveauMDP.php");

changemail();
?>