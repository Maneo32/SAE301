<?php
require('../../../Modele/BDD/ConnectionBDD.php');
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();

/* on récupère les noms des catégories*/
function getCatModele()
{
    global $bdd;
    $categorie = $bdd->prepare("Select nom from categorie");
    $categorie->execute();
    return $categorie;
}
