<?php session_start() ;
require("../../Modele/Fonction/ConnectionBDD.php");
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();
require('FonctionScenario.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Supprimer</title>
    <link rel="stylesheet" href="../../View/Style/PageProf.css" >
    <script src="../../Modele/Fonction/LesFonctionsJS.js"></script>

</head>

<?php
include("../../View/HTML/BarreScenario.php");

/* le non permet d'annuler la suppression du patient et de retourner sur la page précédente à l'inverse du oui qui valide la suppression */
if (isset($_POST['Non'])) {
    header('Location: CreateScenario.php');


}
?>

<body>
<br><br><br><br>
<form method="post" >
    <div class="supprimer">
        Êtes-vous sur de supprimer ce patient ?
        <input type="submit" name="OuiSupp" value="Oui">
        <input type="submit" name="Non" value="Non">
    </div>
</form>

</body>
</html>

<?php effacer($bdd);
