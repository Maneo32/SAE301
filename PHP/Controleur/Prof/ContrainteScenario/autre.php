<?php
session_start();
require('../../../Modele/Prof/modeleAutre.php');
function getCatControl(){
return getCatModele();
}
include ('../../../View/Prof/viewAutre.php');
?>


















