<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Soins</title>
    <link rel="stylesheet" href="../../../View/Style/PageProf.css" >
    <script src="../../../Modele/Fonction/LesFonctionsJS.js"></script>

</head>
<body>
<?php
include("../../../View/BarreHTML/BarreScenario2.php");
include("../../../View/BarreHTML/EnteteV2.html");
?>

<h2>Soins du patient</h2>
<form action="Neuro.php" method="post">
    Date :
    <input type="datetime-local" name="date" id="date" required>
    <br><br>
    Le patient a-t-il une surveillance perf ? :
    <input type="radio" name="surveillancePerf" value="oui" required>oui
    <input type="radio" name="surveillancePerf" value="non" checked="checked" required>non
    <br><br>
    Le patient a-t-il des pansements ? :
    <input type="radio" name="pansements" value="oui" required>oui
    <input type="radio" name="pansements" value="non" checked="checked" required>non
    <br><br>
    Surveillance Glycémique (en g/l) :
    <input type="text" name="glycemique" >
    <br>
    <br>
    Le patient a-t-il des bas de contentions ? :
    <input type="radio" name="contentions" value="oui" required>oui
    <input type="radio" name="contentions" value="non" checked="checked" required>non
    <br><br>
    Cathéter veineux périphérique ? :
    <input type="text" name="Catheter" >
    <br><br>
    Sondage urinaire ? :
    <input type="text" name="sondageurinaire" >
    <br><br>
    Autre ? :
    <input type="text" name="autre" >
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

<?php
?>
