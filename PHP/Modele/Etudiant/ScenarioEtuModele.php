<?php
require('../../Modele/BDD/ConnectionBDD.php');
function scenari()
{
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();

    require('../../Modele/FonctionScenario.php');

    $scena = $bdd->prepare("SELECT DISTINCT  nom,prenom,DDN, p.idpatient from groupescenario join groupeetudiant g on groupescenario.idgroupe = g.idgroupe join patient p on groupescenario.idpatient = p.idpatient  where email=?");
    $scena->bindParam(1, $_SESSION['email']);
    $scena->execute();
    return $scena;
}

function affichersc()
{
    if (isset($_POST['patient']) && $_POST['patient'] != 2) {
        if (isset($_POST['affiche'])) {
            $_SESSION['scenario'] = $_POST['patient'];
            header('Location: /SAE301/PHP/Controleur/ScenarioAffichage/AfficheScenario2.php');
        }
    }
}

if (isset($_POST['patient']) && $_POST['patient'] != 2) {
    if(isset($_POST["reponse"])){
        header('Location:ReponseEtu.php ');

    }}


if(isset($_POST['patient'])) {
    $_SESSION['patient'] = $_POST['patient'];
}