<?php

$_SESSION['patient']=$_POST['patient'];
include('../../Modele/BDD/ConnectionBDD.php');
function etu()
{
    $leScenario=$_POST['patient'];
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();

    /*on récupère les nom,prenom et email des étudiants afin de les afficher dans une liste déroulante*/
    $etudiants = $bdd->prepare("select DISTINCT nom,prenom,E.email from GroupeEtudiant join GroupeScenario using(idGroupe) join Etudiant E on GroupeEtudiant.email = E.email where idPatient = ?");
    $etudiants->bindParam(1, $leScenario);
    $etudiants->execute();
    $res = $etudiants->fetchAll();
    return $res;
}
function AvoirLaNoteDunEtu($mail){
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();
    $sql = $bdd->prepare("Select note from note where idpatient=? and email=?");
    $sql->bindParam(1,$_SESSION['patient']);
    $sql->bindParam(2,$mail);
    $sql->execute();
    $note =$sql->fetch();
    $note=@$note[0];
    if ($note==null)
        $note= '~';
    return $note;

}