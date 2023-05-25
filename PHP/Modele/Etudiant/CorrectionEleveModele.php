<?php

require("../../Modele/BDD/ConnectionBDD.php");
function Repleve($bdd, $mail){
    $sql = $bdd->prepare("SELECT p.nom, p.prenom, p.idPatient
FROM ReponseEtu r
JOIN Patient p ON r.idPatient = p.idPatient
WHERE r.email = ?
GROUP BY p.idPatient, p.nom, p.prenom;");
    $sql->bindParam(1,$mail);
    $sql->execute();
    $rep = $sql->fetchAll();
    return $rep;
}


function AvoirRepDunEt ($bdd, $mail, $id){
    $sql = $bdd->prepare("Select  nom,prenom, texte, ordre from reponseetu join patient using(idpatient) where email=? and idpatient=? order by ordre");
    $sql->bindParam(1,$mail);
    $sql->bindParam(2, $id);
    $sql->execute();
    $rep =$sql->fetchAll();
    return $rep;

}


function repElve($id){
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();
    $x=Repleve($bdd, $id);
    return $x;
}

function avoirepdunetu($id1, $id2){

    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();
    return AvoirRepDunEt($bdd,$id1, $id2);
}

function afficher(){
$mail = $_SESSION['email'];
@$id = $_POST['patient'];
$rep = avoirepdunetu($mail, $id);
echo "<br>";
echo "<br>";

foreach ($rep as $reponse) {
    echo('Nom du patient : ');
    echo $reponse[0];
    echo "<br>";
    echo('Prenom du patient : ');
    echo $reponse[1];
    echo "<br>";
    echo('Ordre : ');
    echo $reponse[3];
    echo '<br>';
    echo('Reponse : ');
    echo $reponse[2];
    echo "<br>";
    echo "<br>";

}
}




