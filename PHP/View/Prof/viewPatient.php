<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Patient</title>
    <link rel="stylesheet" href="../../../View/Style/PageProf.css" >
    <script src="../../../Modele/Fonction/LesFonctionsJS.js"></script>

</head>

<body>
<!--Le haut de la page avec l'image et le titre-->
<?php
include("../../../View/BarreHTML/BarreScenario2.php");
include("../../../View/BarreHTML/Entete.html");
require('../../../Modele/BDD/ConnectionBDD.php');
?>
<h2> Information sur la patient </h2>
<form method="post" action="../CreateScenario.php">
    Nom :<input type="text" name="nom" id="nom" placeholder="Entrez le Nom du patient " required><br>
    Prénom :<input type="text" name="prenom" id="prenom" placeholder="Entrez le Prenom du patient" required><br><br>
    Age :<input type="number" name="age" id="age" placeholder="Entrez l' âge du patient" required><br>
    Date de naissance :<input type="date" name="DDN" id="DDN" required><br><br>
    Poids (en kg) :<input type="number" name="poids" id="poids" placeholder="Entrez le poids du patient" required><br>
    Taille (en cm)<input type="number" name="taille" id="Taille" placeholder="Entrez la taille du patient" required><br><br>
    <br>
    IEP :<input type="number" name="IEP" id="IEP" placeholder="Entrez le IEP du patient" required><br>
    IPP :<input type="number" name="IPP" id="IPP" placeholder="Entrez le IPP du patient" required><br><br>
    Sexe :<select name="sexe" id="sexe" required>
        <option value="">--Veuillez choisir le sexe--</option>
        <option value="Homme">Homme</option>
        <option value="Femme">Femme</option>
    </select><br><br>
    <br>
    Adresse:<input type="text" name="adresse" id="adresse" placeholder="Entrez l'adresse du patient" ><br>
    Ville :<input type="text" name="ville" id="ville" placeholder="Entrez la ville du patient" ><br>
    Code postal :<input type="number" name="CP" id="CP" placeholder="Entrez le code postal" ><br>
    <br>

    <input type="submit"class="button-90" id="submit" value="Valider" name="ValidPatient">

</form>



<!--Le bas de page avec le boutton si on a besoin d'aide-->

<div class="footer-CreateScenario">
    <form action="../../Accueil/BesoinAide.php" method="post">
        <button class="button-28" type="submit">Besoin d'aide</button>
    </form>
</div>
</body>
</html>


