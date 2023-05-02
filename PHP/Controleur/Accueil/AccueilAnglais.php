
<?php
session_start();


include ("../../View/Accueil/AccueilAnglais.php");
?>


<?php
require("../../Modele/Accueil/email.php");
require("../../Modele/Accueil/MotDePasse.php");
require("../../Modele/BDD/ConnectionBDD.php");
require("../../Modele/Accueil/Connexion.php");
require("../../Modele/Accueil/username.php");
$_SESSION['IdChat']=1;
/* La partie de la validation de connexion qui renvoie la page correspondante*/
if (isset($_SESSION['page'])){
    echo '<script>alert("Le compte est crée")</script>';
}
/* La partie de la validation de connexion qui renvoie la page correspondante*/

$conn = ConnectionBDD::getInstance();
$pdo = $conn::getpdo();
@$ClassMail = new email();
$ClassConn= new Connexion();
if (@$ClassMail->email($_POST['id']) && isset($_POST['id'])){
    if(@$ClassConn->connexionEtu($pdo,$_POST['id'],$_POST['mdp'])) {
        $username = new username();
        $_SESSION['Pseudo']=$_POST['id'];
        $_SESSION['username']=$username->username($_POST['id']);
        $_SESSION['fonction']= 'etu';
        header('Location:PageEtu.php');
        exit;}
    elseif(@$ClassConn->connexionProf($pdo,$_POST['id'],$_POST['mdp'])) {
        $username = new username();
        $_SESSION['username']=$username->username($_POST['id']);
        $_SESSION['fonction']= 'prof';
        header('Location:PageProf.php');
        exit;
    }
    else{
        echo '<script>alert("Identifiant ou mot de passe incorrect")</script>';
    }

}

?>



