<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Note</title>
    <link rel="stylesheet" href="../../View/Style/PageProf.css" >
    <script src="../../Modele/Fonction/LesFonctionsJS.js"></script>

</head>
<body>
<?php
include("../../View/HTML/BarreScenarioEtu.html");
?>
Voici les réponses que vous avez déjà envoyées

<?php

require("../../Modele/Fonction/ConnectionBDD.php");
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();

require("FonctionScenario.php");
$mail=$_SESSION['email'];

$rep=AvoirRepDunEtu($bdd,$mail);
echo "<br>";
echo "<br>";

foreach ($rep as $reponse){
    echo ('Nom du patient : ');
    echo $reponse[0];
    echo "<br>";
    echo ('Prenom du patient : ');
    echo $reponse[1];
    echo "<br>";
    echo ('Reponse : ');
    echo $reponse[2];
    echo "<br>";
    echo "<br>";



}



?>
</body>
</html>
