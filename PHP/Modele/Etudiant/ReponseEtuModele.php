<?php

require('../../Modele/BDD/ConnectionBDD.php');
/**
 * @param $bdd
 * @return array
 * ajout de la reponse a la table en fonction de l'etudiant et du scenario
 */
function reponse()
{

    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();



    /*Recupération des données des patients afin de l'afficher*/
    $nomscena = $bdd->prepare("SELECT nom,prenom,ddn FROM patient where idpatient=?");
    $nomscena->bindParam(1, $_SESSION['patient']);
    $nomscena->execute();
    $res = $nomscena->fetch();

    /*Recupération le nombre d'evenement par scenario*/

    $nbEvenement = $bdd->prepare("SELECT * FROM scenario where idpatient=? order by ordre asc");
    $nbEvenement->bindParam(1, $_SESSION['patient']);
    $nbEvenement->execute();
    $res2 = $nbEvenement->fetchAll();

    $nbRep = $bdd->prepare("Select * from reponseetu where idpatient=? and email=?");
    $nbRep->bindParam(1, $_SESSION['patient']);
    $nbRep->bindParam(2, $_SESSION['email']);
    $nbRep->execute();
    $dejaRep = $nbRep->fetchAll();

    /* le if est else sont présent pouyr attendre le clique de l'étudiant avant de changer la page*/
    if (count($dejaRep) > 0) {
        echo '<script> if (window.confirm("Vous avez déja répondu pour ce patient ?")) {
    
    window.location.href = "ScenarioEtu.php";}
    else{
      window.location.href = "ScenarioEtu.php";  
    }
    </script>';


    }
    return array($res, $res2);
}