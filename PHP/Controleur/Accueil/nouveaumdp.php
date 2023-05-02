<?php
session_start();

include("../../View/Accueil/nouveauMDP.html");

?>
<?php

require("../../Modele/Accueil/NouveauMDP.php");
changemail();
?>