<?php

if (@$_COOKIE['reload']==1){
    @$_COOKIE['reload']=0;
    header('Refresh:0');
}
require('../../Modele/BDD/ConnectionBDD.php');
function sce()
{
    $id = $_SESSION['patient'];
// affichage des événements existants
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();
    $sql = $bdd->prepare("Select * from scenario where idpatient= ? order by ordre asc , idscenario asc");
    $sql->bindParam(1, $id);
    $sql->execute();
    return $sql;
}
@$_SESSION['coo'] = $_COOKIE['valid'];


function modifdonnee(){
    $id = $_SESSION['patient'];
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();
    $data = $_SESSION['coo'];
    if ($data != "") {
        $mots = [$mot, $num, $ind] = explode('!', $data);
        if ($mots[2]%2==0){
            $sql = $bdd->prepare("update scenario set texte=:texte where idpatient=:idp and idscenario=:ordre");
            $sql->bindParam(':texte', $mots[1], PDO::PARAM_STR);
            $sql->bindParam(':idp', $id);
            $sql->bindParam(':ordre', $mots[3]);
            $sql->execute();
        }
        elseif ($mots[2]%2==1){
            $sql = $bdd->prepare("update scenario set ordre=:texte where idpatient=:idp and idscenario=:ordre");
            $sql->bindParam(':texte', $mots[1], PDO::PARAM_STR);
            $sql->bindParam(':idp', $id);
            $sql->bindParam(':ordre', $mots[3]);
            $sql->execute();
        }
    }
}