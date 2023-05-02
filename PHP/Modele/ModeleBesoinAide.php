<?php


function insererMessage($pseudo2,$message){
    $conn= ConnectionBDD::getInstance();
    $bdd=$conn::getpdo();
    $insertMsg = $bdd->prepare('INSERT INTO messageaide(userx,textmessage, idgroupe, email) VALUES(?, ?, ?, ?)');
    $insertMsg->execute(array($pseudo2, $message, $_SESSION['IdChat'], $_SESSION['Pseudo']));
    header('Location: BesoinAide.php');
}

function creerAide($sujet){
    $conn= ConnectionBDD::getInstance();
    $bdd=$conn::getpdo();
    $creer = $bdd->prepare("INSERT INTO besoindaide(sujet, email) values (?, ?)");
    $creer->execute(array($sujet, $_SESSION['Pseudo']));
    $newid = $bdd->query("SELECT idba from besoindaide order by idba desc ");
    $newgrp = $newid->fetch()[0];
    $_SESSION['IdChat']=$newgrp;
    header('Location: BesoinAide.php');
}

function affichergrp()
{
    $conn = ConnectionBDD::getInstance();
    $bdd = $conn::getpdo();
    $grps = $bdd->prepare("SELECT * from besoindaide");
    $grps->execute();
    return $grps;
}
?>