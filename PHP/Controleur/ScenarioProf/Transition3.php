<?php
// les pages transitions sont des pages qui permettent l'ajout dans la base de donnée des pages précédente et elles permettent de passer à la page d'apres

session_start();
require("../../Modele/Fonction/ConnectionBDD.php");
require("../Accueil/FonctionPhp.php");
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();
$_SESSION['Date']=date("Y-m-d H:m:s", strtotime($_POST["date"]));

@ajoutDeDonneeSansLesBooleans($bdd,$_POST['categorie'],$_POST['type'],$_POST['donnee']);
header('Location:afficherScenario2.php');
