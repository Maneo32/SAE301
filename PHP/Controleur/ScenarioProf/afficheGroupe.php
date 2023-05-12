<?php
session_start();
require('../../Modele/BDD/ConnectionBDD.php');
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();
require('../../Modele/FonctionScenario.php');

function getNomGrp(){
    $nomgrp=nomgrp();
    return $nomgrp;
}

function getGroupe(){
    $grp= etugrp()->fetchAll();
    return $grp;

}
include ('../../View/Prof/viewAfficheGroupe.php');
?>
