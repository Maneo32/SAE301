<?php
session_start();
if (isset($_POST['Valider'])) {

    @$_SESSION['Date'] = date("Y-m-d H:m:s", strtotime($_POST["date"]));
    @$_SESSION['massage'] = $_POST['massage'];
    @$_SESSION['entretien'] = $_POST['entretien'];
    @$_SESSION['accueil'] = $_POST['accueil'];
    require('../../../Modele/BDD/ConnectionBDD.php');
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();
    require("../../../Modele/Fonction/FonctionPhp.php");
    @ajoutDeDonneeAvecLesBooleans($bdd, "Soins relationnel", 'massage');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Soins relationnel", 'entretien');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Soins relationnel", 'accueil');
}
include ('../../../View/Prof/viewElimination.php');
?>
