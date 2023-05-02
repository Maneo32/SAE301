<?php
require("../../Modele/BDD/ConnectionBDD.php");
require("../../Modele/Accueil/Premier.php");
require("../../Modele/Accueil/email.php");
require("../../Modele/Accueil/MotDePasse.php");
require("../../Modele/Accueil/Connexion.php");


/**
 * @return void
 */
function changemail()
{
    $conn = ConnectionBDD::getInstance();
    $pdo = $conn::getpdo();
    $MDP = new MotDePasse();
    $co = new Connexion();

    if (isset($_POST['mdp']) or isset($_POST['mpd2'])) {
        if ($MDP->password($_POST['mdp'], $_POST['mdp2']))
        {
            $MDP->changement($pdo, $_POST['mdp'], $co);
        }

    }}
?>