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
include("../../View/BarreHTML/BarreScenarioEtu.php");
?>
<h2>Scénario envoyé</h2>

<?php

require('../../Modele/BDD/ConnectionBDD.php');
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();

require("FonctionScenario.php");
$mail=$_SESSION['email'];

$res = RepEleve($bdd, $mail);
?>

<form method="post" name="patient">
    <select name="patient" onchange="this.form.submit()">
        <option>Selectionnez un patient</option>
        <?php


        foreach ($res as $rep){
            ?>
            <option name="<?php echo $rep[0]?>" value="<?php echo $rep[2]?>"><?php echo $rep[0]." ".$rep[1]?></option>
            <?php
        }

        ?>
    </select>
</form>




<?php
@$id = $_POST['patient'];
$rep=AvoirRepDunEtu($bdd,$mail, $id);
echo "<br>";
echo "<br>";

foreach ($rep as $reponse){
    echo ('Nom du patient : ');
    echo $reponse[0];
    echo "<br>";
    echo ('Prenom du patient : ');
    echo $reponse[1];
    echo "<br>";
    echo ('Ordre : ');
    echo $reponse[3];
    echo '<br>';
    echo ('Reponse : ');
    echo $reponse[2];
    echo "<br>";
    echo "<br>";



}



?>
</body>

<div class="footer-CreateScenario">
    <br>
    <form action="../Accueil/BesoinAide.php" method="post">
        <button class="button-28" type="submit">Besoin d'aide</button>
    </form>
</div>
</html>
