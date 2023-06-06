<?php
session_start();
require('../../Modele/BDD/ConnectionBDD.php');
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();
$sql=$bdd->prepare("Insert into categorie (nom) values (?)");
$sql->bindParam(1,$_POST['cat']);
$sql->execute();

header('Location: ../../Controleur/Prof/ContrainteScenario/autre.php');

