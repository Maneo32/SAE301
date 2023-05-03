<?php
session_start();

// La langue francaise correspond au 0 et l'anglais au 1
if (@$_SESSION['langue']==1 ) {

        include ('../../View/Accueil/MDPoublieAnglais.html');

}
else  {
        include ('../../View/Accueil/MDPoublie.html');

}
?>

<?php



require("../../Modele/Accueil/MDPoublie.php");

include('../../View/Accueil/Langue.php');


@email();

        ?>
