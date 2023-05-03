<?php
session_start();

// La langue francaise correspond au 0 et l'anglais au 1
if (@$_SESSION['langue']==1 ) {

    include("../../View/Accueil/AccueilAnglais.php");

}
else  {
    include("../../View/Accueil/Accueil.php");
}

?>



<?php
require("../../Modele/Accueil/email.php");
require("../../Modele/Accueil/MotDePasse.php");
require("../../Modele/BDD/ConnectionBDD.php");
require("../../Modele/Accueil/Connexion.php");
require("../../Modele/Accueil/username.php");

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
        header('Location:../../View/Etudiant/PageEtu.php');
        exit;}
    elseif(@$ClassConn->connexionProf($pdo,$_POST['id'],$_POST['mdp'])) {
        $username = new username();
        $_SESSION['email']=$_POST['id'];
        $_SESSION['Pseudo']=$_POST['id'];
        $_SESSION['username']=$username->username($_POST['id']);
        $_SESSION['fonction']= 'prof';
        header('Location:../../View/Prof/PageProf.php');
        exit;
    }
    else{
        echo '<script>alert("Identifiant ou mot de passe incorrect")</script>';
    }

}

include('../../View/Accueil/Langue.php');

?>



