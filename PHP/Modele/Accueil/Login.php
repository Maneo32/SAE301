<?php

require("../../Modele/Accueil/email.php");
require("../../Modele/Accueil/MotDePasse.php");
require("../../Modele/BDD/ConnectionBDD.php");
require("../../Modele/Accueil/Connexion.php");
require("../../Modele/Accueil/Premier.php");
/* permet de créer le nouvel utilisateur(étudiant ou prof) si toutes les données sont valables*/
/**
* @param $mail
* @param $mdp
* @param $mdp2
* @return void
*/
function bdd($mail, $mdp, $mdp2){
$sess = new Premier();
$sess->premier('premier');
$ClassMail = new email();
$ClassMDP =new MotDePasse();
$condition= false;
@$nom = $_POST['nom'];
@$prenom = $_POST['prenom'];
@$code = $_POST['code'];

if ($_SESSION['premier']==2) {
{
    if ($ClassMail->email($mail) and $ClassMDP->password($mdp, $mdp2)) {
        try {
            $conn = ConnectionBDD::getInstance();
            $pdo = $conn::getpdo();

        }
        catch (PDOException $e) {
            die ('Erreur : ' . $e->getMessage());
            }
        $aro = false;
        for ($i=0; $i<strlen($mail);$i++){
            if ($mail[$i]=='@'){
                $aro = true;
            }
            if (!$aro){
                if (ord($mail[$i])>64 and ord($mail[$i])<91){
                    $mail[$i] = chr(ord($mail[$i])+32);
                    }
                }
        }
        $hash = password_hash($mdp, PASSWORD_DEFAULT);
        if ($_POST['code'] == "P5165156516516@") {
            $sql = "INSERT INTO prof (email,mdp,nom,prenom) VALUES (:mail,:hash,:nom,:prenom)";
            $condition = true;
            $req=$pdo->prepare($sql);
            $req->bindParam('mail',$mail, PDO::PARAM_STR);
            $req->bindParam('hash',$hash, PDO::PARAM_STR);
            $req->bindParam('nom',$nom, PDO::PARAM_STR);
            $req->bindParam('prenom',$prenom, PDO::PARAM_STR);
            $_SESSION['page'] = true;
            }
        elseif ($_POST['code'] == "E615615651561@") {
            $sql = "INSERT INTO etudiant (email,mdp,code,nom,prenom) VALUES (:mail,:hash,:code,:nom,:prenom)";
            $condition = true;
            $req=$pdo->prepare($sql);
            $req->bindParam('mail',$mail, PDO::PARAM_STR);
            $req->bindParam('hash',$hash, PDO::PARAM_STR);
            $req->bindParam('nom',$nom, PDO::PARAM_STR);
            $req->bindParam('prenom',$prenom, PDO::PARAM_STR);
            $req->bindParam('code',$code, PDO::PARAM_STR);
            $_SESSION['page'] = true;
            }
        $etu = $pdo->prepare("SELECT * FROM etudiant WHERE email=?");
        $prof = $pdo->prepare("SELECT * FROM prof WHERE email=?");
        $etu->execute(Array($mail));
        $prof->execute(Array($mail));


        if ($etu->fetch() || $prof->fetch()){
             echo '<script>alert("le compte a déjà été crée.")</script>';
}

        else {
             echo '<script>alert("Le code n\'est pas valide.")</script>';


}

if ($condition) {
    try {
        $req->execute();
        $req->setFetchMode(PDO::FETCH_ASSOC);

        $add = $pdo->prepare("INSERT INTO email values (?)");
        $add->execute(array($mail));
}
        catch (PDOException $e) {
        die ($e->getMessage());
}
}
header('Location: Accueil.php');



}

}}}
?>