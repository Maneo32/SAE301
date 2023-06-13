<?php
session_start();
if (isset($_POST['Valider'])) {

    @$_SESSION['Date'] = date("Y-m-d H:m:s", strtotime($_POST["date"]));
    @$_SESSION['AideMarche'] = $_POST['AideMarche'];
    @$_SESSION['AideLever'] = $_POST['AideLever'];
    @$_SESSION['AideCoucher'] = $_POST['AideCoucher'];
    @$_SESSION['AideFauteil'] = $_POST['AideFauteil'];
    require('../../../Modele/BDD/ConnectionBDD.php');
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();
    require("../../../Modele/Fonction/FonctionPhp.php");
    @ajoutDeDonneeAvecLesBooleans($bdd, "Mobilite", 'AideMarche');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Mobilite", 'AideLever');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Mobilite", 'AideCoucher');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Mobilite", 'AideFauteil');
}
include('../../../View/Prof/viewHygiene.php');


?>
