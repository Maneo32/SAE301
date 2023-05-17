<?php
session_start();
if (isset($_POST['Valider'])) {

    @$_SESSION['Date'] = date("Y-m-d H:m:s", strtotime($_POST["date"]));
    @$_SESSION['urine'] = $_POST['urine'];
    @$_SESSION['gaz'] = $_POST['gaz'];
    @$_SESSION['selles'] = $_POST['selles'];
    require('../../../Modele/BDD/ConnectionBDD.php');
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();
    require("../../../Modele/Fonction/FonctionPhp.php");
    @ajoutDeDonneeAvecLesBooleans($bdd, "Elimation", 'urine');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Elimation", 'gaz');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Elimation", 'selles');
}

include ('../../../View/Prof/viewCardio.php');
?>
