
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Elimination</title>
    <link rel="stylesheet" href="../../../View/Style/PageProf.css" >
    <script src="../../../Modele/Fonction/LesFonctionsJS.js"></script>

</head>

<body>
<?php
include("../../../View/BarreHTML/BarreScenario2.php");
include("../../../View/BarreHTML/EnteteV2.html");
?>

    <h2>Elimination du patient</h2>

<form action="Cardio.php" method="post">

    Date :
    <input type="datetime-local" name="date" id="date" required>
    <br><br>
    Le patient a t-il eu des selles ?:
    <input type="radio" name="selles" value="oui" required>oui
    <input type="radio" name="selles" value="non" checked="checked" required>non
    <br><br>
    Le patient a t-il eu des gaz ?:
    <input type="radio" name="gaz" value="oui" required>oui
    <input type="radio" name="gaz" value="non" checked="checked" required>non
    <br><br>
    Le patient a t-il uriner :
    <input type="radio" name="urine" value="oui" required>oui
    <input type="radio" name="urine" value="non" checked="checked" required>non
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

