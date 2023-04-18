<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ReponseEtudiant </title>
    <link rel="stylesheet" href="../../View/Style/PageProf.css" >
    <script src="../../Modele/Fonction/LesFonctionsJS.js"></script>

</head>
<body>
<?php
include("../../View/HTML/BarreScenarioEtu.php");

require("../../Modele/Fonction/ConnectionBDD.php");
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();

/**
 * @param $bdd
 * @return void
 * ajout de la reponse a la table en fonction de l'etudiant et du scenario
 */
function reponse($bdd){
        if (isset($_POST['Valider'])) {
            $sql = $bdd->prepare("INSERT INTO reponseetu (email, idpatient, texte) values (?,?,?)");
            $sql->execute(array($_SESSION['email'],$_SESSION['patient'],$_POST['textereponse']));
            header('Location: ScenarioEtu.php');



    }}

/*Recupération des données des patients afin de l'afficher*/
    $nomscena = $bdd->prepare("SELECT nom,prenom,ddn FROM patient where idpatient=?");
    $nomscena->bindParam(1, $_SESSION['patient']);
    $nomscena->execute();
    $res = $nomscena->fetch();

/*Recupération le nombre d'evenement par scenario*/

    $nbEvenement = $bdd->prepare("SELECT count(idscenario) FROM scenario where idpatient=? ");
    $nbEvenement->bindParam(1,$_SESSION['patient']);
    $nbEvenement->execute();
    $res2 = $nbEvenement->fetch();

reponse($bdd);
?>
<br>
<form action="ScenarioEtu.php" method="post">
    <button class="button-90" >Retour</button>
</form>
<h4>Réponse au Scénario : <?php echo $res[0]," ",$res[1]," né le ",$res[2] ?>  </h4>
<?php echo($res2[0]);
 ?>

<form method="post">
    <div class="Diagnostic">
    <textarea name="textereponse" id="textereponse" rows="20" cols="80" required> </textarea></div> <br>
    <input type="submit" name="Valider" value="Envoyer">
</form>

</body>
</html>
<?php

function evenement($bdd){




}

?>

