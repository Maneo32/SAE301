<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Radio</title>
    <link rel="stylesheet" href="../../../View/Style/PageProf.css" >
    <script src="../../../Modele/Fonction/LesFonctionsJS.js"></script>

</head>
<body>
<?php
include("../../../View/BarreHTML/BarreScenario2.php");
include("../../../View/BarreHTML/EnteteV2.html");
?>

<h2>Radio</h2>
<form method="POST" enctype="multipart/form-data">
    <label for="image">Choisir une radio :</label>
    <input type="file" name="userfile">
    <input type="submit" name="submit" value="Send File">
</form>
<br>
<form action="Diagnostic.php" method="post">
    <input type="submit" name="suivant" value="Suivant">
</form>

<div class="footer-CreateScenario">
    <form action="../../Accueil/BesoinAide.php" method="post">
        <button class="button-28" type="submit" >Besoin d'aide</button>
    </form>
</div>

</body>
</html>