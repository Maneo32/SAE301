<?php
$pdo = ConnectionBDD::getInstance();
global $bdd;
$bdd= $pdo::getpdo();

/**
 * @param $bdd
 * @return void
 * fonction qui permet de supprimer un patient et tout ce qui le concerne avec des delete cascade
 */
function effacer($bdd){
    if (isset($_POST['OuiSupp'])) {
        $patient = $bdd->prepare("Delete FROM patient where idpatient=?");
        $patient->bindParam(1,$_SESSION['patient']);
        $patient->execute();
        header('Location: /SAE301/PHP/Controleur/Prof/CreateScenario.php ');

    }


}
/* permet de pouvoir appuyer sur le bouton 'ajouter contraintes' si et seulement si un patient est sélectionné*/
/**
 * @return void
 */
function contrainte()
{
    if (isset($_POST['patient']) && $_POST['patient'] != 2) {
        if (isset($_POST['Contrainte'])) {
            $_SESSION['patient'] = $_POST['patient'];
            header('Location: /SAE301/PHP/Controleur/Prof/ContrainteScenario/Radio.php');
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

/* permet d'appuyer sur le bouton afficher scénario si et seulement si un patient est séléctionné*/
/**
 * @return void
 */
function affichersce()
{
    if (isset($_POST['patient']) && $_POST['patient'] != 2) {
        if (isset($_POST['affiche'])) {
            $_SESSION['scenario'] = $_POST['patient'];
            header('Location: /SAE301/PHP/Controleur/ScenarioAffichage/AfficheScenario2.php');
        }
    }
}

/**
 * @param $bdd
 * @return void
 * fonction qui permet de creer un groupe d'eleve
 */
function creerGroupe($bdd){
    if (isset($_POST['Creer'])) {
        $creer = $bdd->prepare("INSERT INTO groupeclasse(nom) values (?)");
        $creer->execute(array($_POST['grp']));
        header('Location: /SAE301/PHP/Controleur/Prof/CreateScenario.php');



    }}



/**
 * @param $bdd
 * @return void
 * ajoute un étudiant dans un groupe s'il n'est dans deja dans ce groupe
 */
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



    }}

/**
 * @param $bdd
 * @return void
 * fonction qui permet d'associer un scenario a un groupe d'etudiant
 */
function Scenario($bdd){
    if (isset($_POST['envoie']) && $_POST['GroupeScena']!="!" && $_POST['patientScena']!="!") {
        $ajout = $bdd->prepare("INSERT INTO groupescenario(idgroupe,idpatient) values (?,?)  ");
        $ajout->execute(array($_POST['GroupeScena'],$_POST['patientScena']));
    }}

/**
 * @param $bdd
 * @return mixed
 * fonction qui permet d'avoir les nom des groupes d'etudiants afin de les mettre dans une liste deroulante
 */
function nomgrp()
{
    global $bdd;
    $nomgrp = $bdd->prepare("SELECT nom FROM groupeclasse where idgroupe=?");
    $nomgrp->bindParam(1, $_SESSION['grp']);
    $nomgrp->execute();
    $res = $nomgrp->fetch();
    return $res[0];
}

/**
 * @param $bdd
 * @return mixed
 * cette fonction renvoie les etudiants appartenants a un groupe afin de les mettre dans un tableau
 */
function etugrp()
{
    global $bdd;
    $grpetu=$_SESSION['grp'];
    /* permet de créer une liste déroulante avec tous les etudiants des groupes */
    $EtuGroupe = $bdd->prepare("SELECT email FROM groupeetudiant where idgroupe=?");
    $EtuGroupe->execute(array($grpetu));
    $array = $EtuGroupe;
    return $array;
}

/**
 * @param $bdd
 * @param $mail
 * @return mixed|string
 * Cette fonction renvoie les notes d'un etudiant en fonction du scenario
 */
function AvoirLaNoteDunEtu($bdd, $mail){
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

function AvoirRepDunEtu ($bdd, $mail, $id){
    $sql = $bdd->prepare("Select  nom,prenom, texte, ordre from reponseetu join patient using(idpatient) where email=? and idpatient=? order by ordre");
    $sql->bindParam(1,$mail);
    $sql->bindParam(2, $id);
    $sql->execute();
    $rep =$sql->fetchAll();
    return $rep;

}

function RepEleve($bdd, $mail){
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



?>