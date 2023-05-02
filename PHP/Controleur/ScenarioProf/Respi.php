<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Respiration</title>
    <link rel="stylesheet" href="../../View/Style/PageProf.css" >
    <script src="../../Modele/Fonction/LesFonctionsJS.js"></script>

</head>
<body>
<?php
include("../../View/BarreHTML/BarreScenario.php");
include("../../View/BarreHTML/EnteteV2.html");
?>
    <h2>Respiration</h2>
<form method="post" action="Transition2.php">

    Date :
    <input type="datetime-local" name="date" id="date" required>
    <br><br>
    SaO2 : <input type="text" name="Sa02" >
    <br><br>
    FR : <input type="text" name="FR">
    <br><br>
    O2 : <input type="text" name="O2">
    <br><br>

    <input type="submit" value="Valider" name="Valider" >



</form>
<div class="footer-CreateScenario">
    <form action="../Accueil/BesoinAide.php" method="post">
        <button class="button-28" type="submit">Besoin d'aide</button>
    </form>
</div>
</body>
</html>
