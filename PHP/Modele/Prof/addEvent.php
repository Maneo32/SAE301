<?php
require("../BDD/ConnectionBDD.php");
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();
session_start();





    $sql = "INSERT into scenario(idpatient, texte, ordre) values (?,?,?)";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->bindParam(2, $texte);
    $stmt->bindParam(3, $number);
    $stmt->execute();
    header('Location: ../../Controleur/Prof/evenement.php');


