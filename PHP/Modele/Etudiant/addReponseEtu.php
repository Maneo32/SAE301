<?php
require("../BDD/ConnectionBDD.php");
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();
session_start();
$reponse = $_GET['reponse'];
$ordre = $_GET['ordre'];
$sql = $bdd->prepare("INSERT INTO reponseetu (email, idpatient, texte,ordre) values (?,?,?,?)");
$sql->execute(array($_SESSION['email'],$_SESSION['patient'],$reponse,$ordre));

