<?php
session_start();
require('../../Modele/BDD/ConnectionBDD.php');
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();
require('FonctionScenario.php');

global $nomgrp;
$nomgrp=nomgrp($bdd);
global $grp;
$grp= etugrp($bdd)->fetchAll();
include ('../../View/Prof/viewAfficheGroupe.php');
?>
