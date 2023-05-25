<?php
require('../../Modele/BDD/ConnectionBDD.php');


require('../../Modele/FonctionScenario.php');


/* permet de créer une liste déroulante avec tous les patients*/

function getPatient()
{
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();
    $patients = $bdd->prepare("SELECT * FROM patient where emailprof=?");
    $patients->bindParam(1, $_SESSION['email']);
    $patients->execute();
    return $patients;
}
?>