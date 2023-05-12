<?php
session_start();
require("../../Modele/BDD/ConnectionBDD.php");
$conn= ConnectionBDD::getInstance();
$bdd=$conn::getpdo();


/* View Chat*/
include("../../View/Accueil/chat.php");

require("../../Modele/Accueil/ChatModele.php");

envoyerMess($bdd);

if (isset($_POST['button'])){
    $but = $_POST['button'];
    $t = false;
    $a="";
    $b="";
    for ($i=0; $i<strlen($but);$i++){
        if ($but[$i]=='+'){
            $t = true;
        }
        elseif (!$t){
            $a = $a.$but[$i];
        }
        elseif($t){
            $b = $b.$but[$i];
        }
    }
    $_SESSION['IdChat']=$a;
    $_SESSION['sujet']=$b;
    header('Location: chat.php');
}
inviter($bdd);
creergrp($bdd);
affichergrp($bdd);
afficheruser($bdd);
supprimer($bdd);
admin($bdd);
suppmess($bdd);

/*permet de rediriger sur la bonne page, si la personne qui clique est un étudiant ou un professeur*/
if(isset($_POST['verif'])) {
    if (isset($_SESSION['fonction'])) {
        if ($_SESSION['fonction'] == 'etu') {
            header('Location:PageEtu.php');
        } elseif ($_SESSION['fonction'] == 'prof') {
            header('Location:PageProf.php');
        }
    }
}

include("../../View/Accueil/BesoinAideButton.html");

?>


