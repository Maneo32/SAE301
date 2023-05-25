<?php
session_start();

require ('../../Modele/Prof/modeleAvantLesNotes.php');
function getPatientCon(){
    return getPatient();
}

include ('../../View/Prof/viewAvantLesNotes.php');
?>
