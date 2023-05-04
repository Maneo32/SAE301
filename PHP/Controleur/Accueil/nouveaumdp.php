<?php
session_start();

// La langue francaise correspond au 0 et l'anglais au 1
if (@$_SESSION['langue']==1 ) {
    /* View nouveau MDP*/

    include("../../View/Accueil/nouveauMDPAnglais.html");

}
else  {
    include("../../View/Accueil/nouveauMDP.html");

}

?>
<?php

include('../../View/Accueil/Langue.php');

require("../../Modele/Accueil/NouveauMDP.php");
changemail();
?>