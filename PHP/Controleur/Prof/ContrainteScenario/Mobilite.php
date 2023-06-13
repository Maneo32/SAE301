<?php
session_start();
if (isset($_POST['Valider'])) {

    @$_SESSION['Date'] = date("Y-m-d H:m:s", strtotime($_POST["date"]));
    @$_SESSION['ECG'] = $_POST['ECG'];
    @$_SESSION['pls'] = $_POST['pls'];
    @$_SESSION['TA'] = $_POST['TA'];
    require('../../../Modele/BDD/ConnectionBDD.php');
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();
    require("../../../Modele/Fonction/FonctionPhp.php");
    @ajoutDeDonneeSansLesBooleans($bdd, "Cardio", 'ECG', $_POST['ECG']);
    @ajoutDeDonneeSansLesBooleans($bdd, "Cardio", 'pls', $_POST['pls']);
    @ajoutDeDonneeSansLesBooleans($bdd, "Cardio", 'TA', $_POST['TA']);
}

include('../../../View/Prof/viewMobilite.php');
?>

