<?php
session_start();
if (isset($_POST['Valider'])) {
    @$_SESSION['Date'] = date("Y-m-d H:m:s", strtotime($_POST["date"]));

    @$_SESSION['toilette'] = $_POST['toilette'];
    @$_SESSION['douche'] = $_POST['douche'];
    @$_SESSION['bain'] = $_POST['bain'];
    @$_SESSION['refectionLit'] = $_POST['refectionLit'];
    @$_SESSION['change'] = $_POST['change'];
    @$_SESSION['soinBouche'] = $_POST['soinBouche'];
    @$_SESSION['escare'] = $_POST['escare'];
    @$_SESSION['position'] = $_POST['position'];
    @$_SESSION['matelas'] = $_POST['matelas'];
    require('../../../Modele/BDD/ConnectionBDD.php');
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();
    require("../../../Modele/Fonction/FonctionPhp.php");
    @ajoutDeDonneeAvecLesBooleans($bdd, "Hygiene", 'toilette');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Hygiene", 'douche');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Hygiene", 'bain');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Hygiene", 'refectionLit');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Hygiene", 'soinBouche');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Hygiene", 'escare');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Hygiene", 'position');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Hygiene", 'matelas');
}
include ('../../../View/Prof/viewAlimentation.php');
?>


