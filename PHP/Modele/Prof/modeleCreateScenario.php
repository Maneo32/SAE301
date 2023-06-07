<?php

require ('../../Modele/Prof/modeleCreerPatient.php');
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();

function affichersce()
{
    if (isset($_POST['patient']) && $_POST['patient'] != 2) {
        if (isset($_POST['affiche'])) {
            $_SESSION['scenario'] = $_POST['patient'];
            header('Location: /SAE301/PHP/Controleur/ScenarioAffichage/AfficheScenario2.php');
        }
    }
}
function evenement ()
{
    if (isset($_POST['patient']) && $_POST['patient'] != 2) {
        if (isset($_POST['Evenement'])) {
            $_SESSION['patient'] = $_POST['patient'];
            header('Location: /SAE301/PHP/Controleur/Prof/evenement.php');
        }
    }
}

function contrainte()
{
    if (isset($_POST['patient']) && $_POST['patient'] != 2) {
        if (isset($_POST['Contrainte'])) {
            $_SESSION['patient'] = $_POST['patient'];
            header('Location: /SAE301/PHP/Controleur/Prof/ContrainteScenario/Radio.php');
        }
    }
}
function effacer($bdd){
    if (isset($_POST['OuiSupp'])) {
        $patient = $bdd->prepare("Delete FROM patient where idpatient=?");
        $patient->bindParam(1,$_SESSION['patient']);
        $patient->execute();
        header('Location: /SAE301/PHP/Controleur/Prof/CreateScenario.php ');

    }


}

function creerGroupe($bdd){
    if (isset($_POST['Creer'])) {
        $creer = $bdd->prepare("INSERT INTO groupeclasse(nom) values (?)");
        $creer->execute(array($_POST['grp']));
        header('Location: /SAE301/PHP/Controleur/Prof/CreateScenario.php');



    }}
function EstDeJaDansLeGroupe($bdd, $groupe, $mail){
    $sql = $bdd->prepare("SELECT email FROM groupeetudiant where idgroupe=? ");
    $sql->bindParam(1,$groupe);
    $sql->execute();
    $rep=$sql->fetchAll();
    foreach ($rep as $i) {
        if($i['email'] == $mail){
            return true;
        }

    }
    return false;
}

/**
 * @param $bdd
 * @param $groupe
 * @param $mail
 * @return bool
 * fonction qui permet de savoir si un étudiant et deja dans un groupe
 */
function EstDeJaDansLeGroupe($bdd, $groupe, $mail){
    $sql = $bdd->prepare("SELECT email FROM groupeetudiant where idgroupe=? ");
    $sql->bindParam(1,$groupe);
    $sql->execute();
    $rep=$sql->fetchAll();
    foreach ($rep as $i) {
        if($i['email'] == $mail){
            return true;
        }

    }
    return false;
}

function ajoutEtu($bdd){
    if (isset($_POST['ajoutEtu']) && $_POST['grp2']!='!'&&$_POST['etud']!='!'){
        $groupe=@$_POST['grp2'];
        $mail=@$_POST['etud'];

        if (EstDeJaDansLeGroupe($bdd,$groupe,$mail)){
            echo '<script>alert("Cet étudiant est déjà dans ce groupe")</script>';

        }

        else {
            $ajout = $bdd->prepare("INSERT INTO groupeetudiant(idgroupe, email) values (?,?)");
            $ajout->execute(array($groupe,$mail));
        }



    }}function Scenario($bdd){
    if (isset($_POST['envoie']) && $_POST['GroupeScena']!="!" && $_POST['patientScena']!="!") {
        $ajout = $bdd->prepare("INSERT INTO groupescenario(idgroupe,idpatient) values (?,?)  ");
        $ajout->execute(array($_POST['GroupeScena'],$_POST['patientScena']));
    }}
function creerPatientControlleur($bdd)
{
    $nom = @$_POST['nom'];
    $prenom = @$_POST['prenom'];
    $age = @$_POST['age'];
    $ddn = @$_POST['DDN'];
    $poids = @$_POST['poids'];
    $taille = @$_POST['taille'];
    $iep = @$_POST['IEP'];
    $ipp = @$_POST['IPP'];
    $sexe = @$_POST['sexe'];
    $adresse = @$_POST['adresse'];
    $ville = @$_POST['ville'];
    $cp = @$_POST['CP'];
    $email = @$_SESSION['email'];

    creerPatient($nom, $prenom, $age, $ddn, $poids, $taille, $iep, $ipp, $sexe, $adresse, $ville, $cp, $email, $bdd);
}



if (isset($_POST['ValidPatient'])){
    creerPatientControlleur($bdd);
}




/* fonction qui nous oblige a selectionner un groupe pour accèder a la page d'affichage de groupe*/
if (isset($_POST['affgrp']) && $_POST['grp2']!='!') {
    $_SESSION['grp']=$_POST['grp2'];
    header('Location: afficheGroupe.php');


}
if (isset($_POST['patient']) && $_POST['patient']!='2') {
    header('Location: Supprimer.php');
}

function patients()
{
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();

    /* permet de créer une liste déroulante avec tous les patients*/
    $patients = $bdd->prepare("SELECT * FROM patient where emailprof=?");
    $patients->bindParam(1, $_SESSION['email']);
    $patients->execute();

    /* permet de créer une liste déroulante avec tous les patientsScenario*/
    $patientsScenario = $bdd->prepare("SELECT * FROM patient where emailprof=?");
    $patientsScenario->bindParam(1, $_SESSION['email']);
    $patientsScenario->execute();

    /* permet de créer une liste déroulante avec tous les etudiants*/
    $etudiants = $bdd->prepare("SELECT * FROM etudiant");
    $etudiants->execute();

    /* permet de créer une liste déroulante avec tous les groupes*/
    $groupes = $bdd->prepare("SELECT * FROM groupeclasse");
    $groupes->execute();

    /* permet de créer une liste déroulante avec tous les groupesScenario*/
    $groupesScenario = $bdd->prepare("SELECT * FROM groupeclasse");
    $groupesScenario->execute();

    return array($patients, $groupes, $etudiants, $patientsScenario, $groupesScenario);

}

function afficher(){
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();
    // ces fonctions sont pour les formulaires d'apres
    affichersce();
    evenement();
    contrainte();
    creerGroupe($bdd);
    ajoutEtu($bdd);
    Scenario($bdd);
}