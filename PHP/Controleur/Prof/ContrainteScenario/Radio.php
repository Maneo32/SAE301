<?php
session_start();
if (isset($_POST['Ajouter'])) {

    @$_SESSION['nom'] = $_POST['nom'];
    @$_SESSION['prenom'] = $_POST['prenom'];
    @$_SESSION['DDN'] = $_POST['DDN'];
    @$_SESSION['poids'] = $_POST['poids'];
    @$_SESSION['taille'] = $_POST['taille'];
    @$_SESSION['IEP'] = $_POST['IEP'];
    @$_SESSION['IPP'] = $_POST['IPP'];
    @$_SESSION['sexe'] = $_POST['sexe'];
    if (empty($_POST['adresse'])) {
        @$_SESSION['adresse'] = $_POST['adresse'];
    }
    if (empty($_POST['CP'])) {
        @$_SESSION['CP'] = $_POST['CP'];
    }

}

include("../../../View/Prof/viewUploadRadio.php");

require("../../../Modele/Prof/modeleUploadRadio.php");

require('../../../Modele/BDD/ConnectionBDD.php');

$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();


if(isset($_FILES['userfile'])){
    uploadimg($bdd);
}

?>