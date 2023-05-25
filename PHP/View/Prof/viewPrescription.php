<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Prescription</title>  <link rel="stylesheet" href="../../../View/Style/PageProf.css" >
    <script src="../../../Modele/Fonction/LesFonctionsJS.js"></script>

</head>
<?php
include("../../../View/BarreHTML/BarreScenario2.php");
include("../../../View/BarreHTML/EnteteV2.html");
?>
<body>

<h2>Prescription</h2>
<form action="Securite.php" method="post">

    Medicament :
    <button type="button" onclick="afficher()">ajouter médicament</button>
    <br><br>
    <div class="button_Suivant">
        <input type="submit" name="Valider" value="Suivant">
    </div>


</form>
<br><br>
<form method="post" style="visibility: hidden" id="form">
    Nom médicament : <input type="text" name="nommedic" required>
    <br><br>
    Nom Médecin : <input type="text" name="nom" required>
    <br><br>
    Dose (en mg) : <input type="number" name="cp" required>
    <br><br>
    Prise : <input type="datetime-local" name="prisemedic" required>
    <br><br>
    <input type="submit" name="creermedic" value="Enregistrer le medicament" onclick="insert()">

</form>

<div class="footer-CreateScenario">
    <form action="../../Accueil/BesoinAide.php" method="post">
        <button class="button-28" type="submit">Besoin d'aide</button>
    </form>
</div>
</body>
</html>

