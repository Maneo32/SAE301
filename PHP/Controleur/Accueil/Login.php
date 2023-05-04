<?php
session_start();

// La langue francaise correspond au 0 et l'anglais au 1
if (@$_SESSION['langue']==1 ) {
    /* View Login*/

    include ("../../View/Accueil/CreationCompteAnglais.html");

}
else  {
    include ("../../View/Accueil/CreationCompte.html");

}

?>


<?php


require("../../Modele/Accueil/Login.php");

@bdd($_POST['mail'],$_POST['mdp'],$_POST['mdp2']);

include('../../View/Accueil/Langue.php');

?>