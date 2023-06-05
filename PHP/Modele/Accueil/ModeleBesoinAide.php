<?php

/*cette fonction permet d'ajouter une personne dans le groupe ou nous sommes*/
function insererMessage($pseudo2,$message){
    $conn= ConnectionBDD::getInstance();
    $bdd=$conn::getpdo();
    $insertMsg = $bdd->prepare('INSERT INTO messageaide(userx,textmessage, idgroupe, email) VALUES(?, ?, ?, ?)');
    $insertMsg->execute(array($pseudo2, $message, $_SESSION['IdChat'], $_SESSION['Pseudo']));
    header('Location: BesoinAide.php');
}


/*cette fonction permet de créer dans la base de donnée un nouveau groupe et de mettre le créateur admin*/

function creerAide($sujet){
    $conn= ConnectionBDD::getInstance();
    $bdd=$conn::getpdo();
    $creer = $bdd->prepare("INSERT INTO besoindaide(sujet, email, admin) values (?, ?, ?)");
    $creer->execute(array($sujet, $_SESSION['Pseudo'], true));
    $newid = $bdd->query("SELECT idba from besoindaide order by idba desc ");
    $newgrp = $newid->fetch()[0];
    $_SESSION['IdChat']=$newgrp;
    header('Location: BesoinAide.php');
}


/* cette fonction permet d'afficher les différents groupes sous forme de boutons, ce qui nous permet de changer de groupes*/
/**
 * @param $bdd
 * @return void
 */

function affichergrp()
{
    $conn = ConnectionBDD::getInstance();
    $bdd = $conn::getpdo();
    $grps = $bdd->prepare("SELECT * from besoindaide");
    $grps->execute();
    return $grps;
}

function supprimer(){
    $conn= ConnectionBDD::getInstance();
    $bdd=$conn::getpdo();
    if (isset($_POST['suppmess'])) {
        $admin = $bdd->prepare("SELECT admin FROM besoindaide where email=?");
        $admin = $admin->execute(array($_SESSION['Pseudo']));
        if ($admin== 1) {
            ?><script>console.log(<?php print $_SESSION['IdChat']?>)</script><?php
            $supp = $bdd->prepare("DELETE FROM messageaide where email=? and idgroupe=?");
            $supp->execute(array($_SESSION['Pseudo'], $_SESSION['IdChat']));
        }
    }
}
supprimer();
?>