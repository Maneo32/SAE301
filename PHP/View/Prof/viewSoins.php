<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Soins Relationnel</title>
    <link rel="stylesheet" href="../../../View/Style/PageProf.css" >
    <script src="../../../Modele/Fonction/LesFonctionsJS.js"></script>

</head>
<body>
<?php
include("../../../View/BarreHTML/BarreScenario2.php");
include("../../../View/BarreHTML/EnteteV2.html");
?>

<h2>Soins Relationnel du patient</h2>
<form action="Elimination.php" method="post">

    Date :
    <input type="datetime-local" name="date" id="date" required>
    <br><br>
    Le patient est-il passé par l'accueil:
    <input type="radio" name="accueil" value="oui" required>oui
    <input type="radio" name="accueil" value="non" checked="checked" >non
    <br><br>
    Le patient a-t-il eu un entretien avec un infirmier?:
    <input type="radio" name="entretien" value="oui" >oui
    <input type="radio" name="entretien" value="non" checked="checked" required>non
    <br><br>
    Le patient a-t-il eu un toucher ou un massage :
    <input type="radio" name="massage" value="oui" >oui
    <input type="radio" name="massage" value="non" checked="checked" required>non
    <br>
    <br>
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
