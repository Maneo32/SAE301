<?php
session_start();
$_SESSION['langue'] = $_POST['nouvelle_valeur'];
echo 'nouvelleValuer'.$_POST['nouvelle_valeur'];
?>
