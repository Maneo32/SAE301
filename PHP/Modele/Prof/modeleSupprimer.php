<?php session_start() ;
require('../../Modele/BDD/ConnectionBDD.php');
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();
require('../../Modele/FonctionScenario.php');

/* le non permet d'annuler la suppression du patient et de retourner sur la page précédente à l'inverse du oui qui valide la suppression */
if (isset($_POST['Non'])) {
    header('Location: CreateScenario.php');


}
effacer($bdd);
?>