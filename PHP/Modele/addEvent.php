<?php
require("Fonction/ConnectionBDD.php");
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();
session_start();
$id = $_SESSION['patient'];
$texte = $_POST['texte'];
$number = $_POST['ordre'];
$sql="INSERT into scenario(idpatient, texte, ordre) values (?,?,?)";
$stmt=$bdd->prepare($sql);
$stmt->bindParam(1,$id);
$stmt->bindParam(2,$texte);
$stmt->bindParam(3,$number);
$stmt->execute();
header('Location: ../Controleur/ScenarioProf/evenement.php');


