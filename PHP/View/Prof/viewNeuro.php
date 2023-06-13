<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Neurologie</title>
    <link rel="stylesheet" href="../../../View/Style/PageProf.css" >
    <script src="../../../Modele/Fonction/LesFonctionsJS.js"></script>

</head>
<body>
<?php
include("../../../View/BarreHTML/BarreScenario2.php");
include("../../../View/BarreHTML/EnteteV2.html");
?>
<h2>Neurologie</h2>
<form method="post" action="Transition.php" >

    Date :
    <input type="datetime-local" name="date" id="date" required>
    <br><br>
    Temperature : <input type="text" name="temperature">
    <br><br>
    Glasgow : <input type="text" name="glasgow">
    <br><br>
    EVA : <input type="text" name="EVA">
    <br><br>
    AlgoPlus : <input type="text" name="AlgoPlus">
    <br><br>
    <div class="button_Suivant">
        <input type="submit" value="Valider" name="Valider">
    </div>


</form>
<div class="footer-CreateScenario">
    <form action="../../Accueil/BesoinAide.php" method="post">
        <button class="button-28" type="submit">Besoin d'aide</button>
    </form>
</div>

</div>
</body>
</html>