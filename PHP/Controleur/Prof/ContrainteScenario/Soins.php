<?php

session_start();

if (isset($_POST['Valider'])){
@$_SESSION['Date']=date("Y-m-d H:m:s", strtotime($_POST["date"]));
@$_SESSION['prescrite']=$_POST['prescrite'];
@$_SESSION['confort']=$_POST['confort'];
@$_SESSION['surveillance']=$_POST['surveillance'];

require('../../../Modele/BDD/ConnectionBDD.php');
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();
require("../../../Modele/Fonction/FonctionPhp.php");
@ajoutDeDonneeAvecLesBooleans($bdd,"Securite",'prescrite');
@ajoutDeDonneeAvecLesBooleans($bdd,"Securite",'confort');
@ajoutDeDonneeAvecLesBooleans($bdd,"Securite",'surveillance');

}

include ('../../../View/Prof/viewSoins.php');

?>
