<?php
// On démarre la session
session_start();

require ('../../Modele/Prof/modeleCorrection.php');

function getPatientCon(){
    return getPatient();
}

function getDataCon(){
    return getData();

}

function getDataCon2($data){
    return idk($data);
}
function appelerLesFonctions(){
    @affichage();
    @noter();
}
include ('../../View/Prof/viewCorrection.php')


?>
<br>
<?php

if (isset($_POST['destroy'])){
    unset($_SESSION['eleve']);
    unset($_SESSION['patient']);
    $_COOKIE['rl']=1;
}

if (@$_COOKIE['rl']==1){
    @$_COOKIE['rl']=0;
    header('Refresh:0');
}
?>
