<?php
session_start();

if (isset($_POST['Valider'])) {
    @$_SESSION['Date'] = date("Y-m-d H:m:s", strtotime($_POST["date"]));
    @$_SESSION['surveillancePerf'] = $_POST['surveillancePerf'];
    @$_SESSION['pansements'] = $_POST['pansements'];
    @$_SESSION['glycemique'] = $_POST['glycemique'];
    @$_SESSION['contentions'] = $_POST['contentions'];
    @$_SESSION['Catheter'] = $_POST['Catheter'];
    @$_SESSION['sondageurinaire'] = $_POST['sondageurinaire'];
    @$_SESSION['autre'] = $_POST['autre'];

    require('../../../Modele/BDD/ConnectionBDD.php');
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();
    require("../../../Modele/Fonction/FonctionPhp.php");
    ajoutDeDonneeAvecLesBooleans($bdd, "Soins", 'surveillancePerf');
    ajoutDeDonneeAvecLesBooleans($bdd, "Soins", 'pansements');
    ajoutDeDonneeSansLesBooleans($bdd, "Soins", 'glycemique', $_POST['glycemique']);
    ajoutDeDonneeAvecLesBooleans($bdd, "Soins", 'contentions');
    ajoutDeDonneeSansLesBooleans($bdd, "Soins", 'Catheter', $_POST['Catheter']);
    ajoutDeDonneeSansLesBooleans($bdd, "Soins", 'sondageurinaire', $_POST['sondageurinaire']);
    ajoutDeDonneeSansLesBooleans($bdd, "Soins", 'autre', $_POST['autre']);

}

include('../../../View/Prof/viewNeuro.php');
?>



