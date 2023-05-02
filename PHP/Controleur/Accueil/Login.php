<?php
session_start();

include ("../../View/Accueil/CreationCompte.html");
?>


<?php


require("../../Modele/Accueil/Login.php");

@bdd($_POST['mail'],$_POST['mdp'],$_POST['mdp2']);

?>