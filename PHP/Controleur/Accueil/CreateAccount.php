<?php
session_start();

// La langue francaise correspond au 0 et l'anglais au 1
if (@$_SESSION['langue']==1 ) {
    /* View Login*/

    include("../../View/Accueil/CreateAccountViewAnglais.php");

}
else  {
    include("../../View/Accueil/CreateAccountView.php");

}

?>


<?php


require("../../Modele/Accueil/CreateAccountModele.php");

@bdd($_POST['mail'],$_POST['mdp'],$_POST['mdp2']);

include('../../View/Accueil/Langue.php');

?>