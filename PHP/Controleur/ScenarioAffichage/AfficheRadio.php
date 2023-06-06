<?php
session_start();
$id = $_SESSION['scenario'];

// Connexion à la base de données
require('../../Modele/BDD/ConnectionBDD.php');
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();

include("../../View/Prof/viewRadio.php");

require ("../../Modele/Prof/modeleRadio.php");

afficheImages($bdd);

?>
