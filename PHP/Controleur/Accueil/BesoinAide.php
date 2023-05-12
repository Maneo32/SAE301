<?php
session_start();
require("../../Modele/BDD/ConnectionBDD.php");
$conn= ConnectionBDD::getInstance();
$bdd=$conn::getpdo();
/* fonction qui permet de récupérer les id de la table BesoinDaide*/
$tous = $bdd->query("SELECT idba FROM BesoinDaide");
/*on récupère l'id de la personne qui est connecté */
@$pseudo = $_SESSION['username'];
@$pseudo2 = $pseudo[0];
$pseudo2 .= " ";
@$pseudo2 .= $pseudo[1];
$_SESSION['PseudoChat']=$pseudo2;
/* ce if permet d'envoyer des messages*/
require('../../Modele/Accueil/ModeleBesoinAide.php');
if (isset($_POST['message'])) {
    $message = nl2br(htmlspecialchars($_POST['message']));
    insererMessage($pseudo2,$message);
}

function getGrps(){
    $grps=affichergrp();
    return $grps;
}
include ("../../View/Accueil/viewBesoinAide.php");



function creergrp()
{
    if (isset($_POST['sujet'])){
        $sujet=$_POST['sujet'];
        creerAide($sujet);
    }}






/*nous permet d'afficher les différents utilisateurs présents dans le groupe, et de les modifiers/supprimer si nous avons le droit*/



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
    header('Location: BesoinAide.php');
}

creergrp();


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

?>
</body>
</html>


