<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cardio</title>
    <link rel="stylesheet" href="../../../View/Style/PageProf.css" >
    <script src="../../../Modele/Fonction/LesFonctionsJS.js"></script>

</head>
<body>


<?php
include("../../../View/BarreHTML/BarreScenario2.php");
include("../../../View/BarreHTML/EnteteV2.html");
?>
<h2>Cardio</h2>
<form method="post" action="Mobilite.php">

    Date :
    <input type="datetime-local" name="date" id="date" required><br><Br>
    TA : <input type="text" name="TA" id="TA" > <br><br>
    PLS :<input type ="text" name="pls" id=pls> <br><br>
    ECG :<input type="text" name="ECG" id="ECG">
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
</body>
</html>
