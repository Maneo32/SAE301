<?php
require("../../Modele/Fonction/email.php");
require("../../Modele/Fonction/MotDePasse.php");
require("../../Modele/Fonction/ConnectionBDD.php");
require("../../Modele/Fonction/Connexion.php");
require("../../Modele/Fonction/username.php");

$_SESSION['IdChat']=1;
$_SESSION['sujet'] = "Général";
/* La partie de la validation de connexion qui renvoie la page correspondante*/



/* La partie de la validation de connexion qui renvoie la page correspondante*/
$conn = ConnectionBDD::getInstance();
$pdo = $conn::getpdo();
@$ClassMail = new email();
$ClassConn= new Connexion();
if (@$ClassMail->email($_POST['id']) && isset($_POST['id'])){
if(@$ClassConn->connexionEtu($pdo,$_POST['id'],$_POST['mdp'])) {
$username = new username();
$_SESSION['email']=$_POST['id'];
$_SESSION['Pseudo']=$_POST['id'];
$_SESSION['username']=$username->username($_POST['id']);
$_SESSION['fonction']= 'etu';
header('Location:PageEtu.php');
exit;}
elseif(@$ClassConn->connexionProf($pdo,$_POST['id'],$_POST['mdp'])) {
$username = new username();
$_SESSION['email']=$_POST['id'];
$_SESSION['Pseudo']=$_POST['id'];
$_SESSION['username']=$username->username($_POST['id']);
$_SESSION['fonction']= 'prof';
header('Location:PageProf.php');
exit;
}
else{
echo '<script>alert("Identifiant ou mot de passe incorrect")</script>';
}

}