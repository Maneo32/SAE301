<?php
session_start();


include ('../../../View/Prof/viewPrescription.php');
require('../../../Modele/BDD/ConnectionBDD.php');
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();
require ('../../../Modele/Prof/modelePrescription.php');
if (isset($_POST['creermedic'])){
    insert($bdd);
}

function insert($bdd){

    $prise=$_POST['prisemedic'];
    $cp=$_POST['cp'];
    $nomMedic=$_POST['nommedic'];
    $nom=$_POST['nom'];

    insertMedic($bdd,$prise,$cp,$nomMedic,$nom);

}


?>



<script>
    /* permet d'afficher ou non la création de médicaments*/
    e=true;
function afficher(){
    if (e) {
        document.getElementById('form').setAttribute('style', 'visibility:visible')
        e=false;
    }else {
        document.getElementById('form').setAttribute('style', 'visibility:hidden')
        e=true;
    }
    }</script>



