<?php
session_start();


require('../../Modele/BDD/ConnectionBDD.php');


$id = $_SESSION['scenario'];
$pdo = ConnectionBDD::getInstance();
global $bdd;
$bdd= $pdo::getpdo();


if (@$_COOKIE['reload']==1){
    @$_COOKIE['reload']=0;
    header('Refresh:0');
}

require('../../Modele/Fonction/FonctionPhp.php');
require('../../Modele/Prof/modeleAfficheScenario2.php');
function getGroupe($id){
    global $bdd;
    return affpatient($bdd,$id);
}

function getDatePresc($id){
    global $bdd;
    return PourAvoirToutesLesDatesDeLaPresc($bdd,$id);

}

function getPresc($id){
    global $bdd;
    return affpresc($bdd,$id);
}

function getDateDiag(){
    return PourAvoirToutesLesDatesDeLaDiag($_SESSION['scenario']);
}

function getDiag(){
    global $bdd;
    return affDiag($bdd,$_SESSION['scenario']);
}
?>


<?php
/// les trois variables suivantes permettent la modification du DPI
@$_SESSION['coo'] = $_COOKIE['valid'];
@$_SESSION['date']= $_COOKIE['date'];
@$_SESSION['do'] = $_COOKIE['do'];



function getDonnee(){
    return AvoirLesDonneeDunPatient();
}

function getNombreColonneType($categorie,$nomType){
    return AvoirLeNombreDeColoneDunType($categorie,$nomType);
}

include ('../../View/Prof/viewAfficheScenario2.php');

if ($_SESSION['fonction']=='prof') {
    @modifdonnees($bdd, $id);
}

?>
<br><br>
</body>
</html>