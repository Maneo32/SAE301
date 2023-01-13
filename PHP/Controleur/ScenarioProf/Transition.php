<?php

// les pages transitions sont des pages qui permettent l'ajout dans la base de donnée des pages précédente et elles permettent de passer à la page d'apres
session_start();
@$_SESSION['Date']=date("Y-m-d H:m:s", strtotime($_POST["date"]));
@$_SESSION['temperature'] = $_POST['temperature'];
@$_SESSION['glasgow'] = $_POST['glasgow'];
@$_SESSION['EVA'] = $_POST['EVA'];
@$_SESSION['AlgoPlus'] = $_POST['AlgoPlus'];

require("../../Modele/Fonction/ConnectionBDD.php");
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();
require("../Accueil/FonctionPhp.php");
@ajoutDeDonneeSansLesBooleans($bdd,"Neuro",'temperature',$_POST['temperature']);
@ajoutDeDonneeSansLesBooleans($bdd,"Neuro",'glasgow',$_POST['glasgow']);
@ajoutDeDonneeSansLesBooleans($bdd,"Neuro",'EVA',$_POST['EVA']);
@ajoutDeDonneeSansLesBooleans($bdd,"Neuro",'AlgoPlus',$_POST['AlgoPlus']);
header('Location:Respi.php');

?>


