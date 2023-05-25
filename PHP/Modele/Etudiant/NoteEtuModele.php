<?php
require('../../Modele/BDD/ConnectionBDD.php');


function fetchNote($bdd, $id)
{
    $sql = $bdd->prepare("SELECT nom,prenom,ddn,note from note JOIN patient p on p.idpatient = note.idpatient where email=?");
    $sql->execute(array($id));
    $array = $sql->fetchAll();
    return $array;
}

function ftnote(){
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();
    $id = $_SESSION['email'];
    return fetchNote($bdd, $id);
}