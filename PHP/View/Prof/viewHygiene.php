<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hygiène</title>
    <link rel="stylesheet" href="../../../View/Style/PageProf.css" >
    <script src="../../../Modele/Fonction/LesFonctionsJS.js"></script>


</head>

<body>
<?php
include("../../../View/BarreHTML/BarreScenario2.php");
include("../../../View/BarreHTML/EnteteV2.html");
?>
<h2>Hygiène</h2>
<form action="Alimentation.php" method="post">

    Date :
    <input type="datetime-local" name="date" id="date" required>
    <br><br>
    Le patient a t-il eu une toilette ?:
    <input type="radio" name="toilette" value="oui" required>oui
    <input type="radio" name="toilette" value="non" checked="checked" required>non
    <br><br>
    Le patient a t-il eu douche ?:
    <input type="radio" name="douche" value="oui" required >oui
    <input type="radio" name="douche" value="non" checked="checked" required>non
    <br><br>
    Le patient a t-il eu un bain :
    <input type="radio" name="bain" value="oui" required>oui
    <input type="radio" name="bain" value="non" checked="checked" required>non
    <br><br>
    Le patient a t-il eu une refection de lit :
    <input type="radio" name="refectionLit" value="oui" required>oui
    <input type="radio" name="refectionLit" value="non" checked="checked" required>non
    <br><br>
    Le patient a t-il eu une change:
    <input type="radio" name="change" value="oui" required>oui
    <input type="radio" name="change" value="non" checked="checked" required>non
    <br><br>
    Le patient a t-il eu un soin de bouche :
    <input type="radio" name="soinBouche" value="oui" required>oui
    <input type="radio" name="soinBouche" value="non"  checked="checked" required>non
    <br><br>
    Le patient a t-il eu une prévention d'escare :
    <input type="radio" name="escare" value="oui" required>oui
    <input type="radio" name="escare" value="non" checked="checked" required>non
    <br><br>
    Le patient a t-il changer de position :
    <input type="radio" name="position" value="oui" required>oui
    <input type="radio" name="position" value="non" checked="checked" required>non
    <br><br>
    Le patient a t-il eu un matelas à l'air :
    <input type="radio" name="matelas" value="oui" required>oui
    <input type="radio" name="matelas" value="non" checked="checked" required>non
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


