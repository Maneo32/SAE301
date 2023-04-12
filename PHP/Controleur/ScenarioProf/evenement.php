<?php
session_start();
$id = $_SESSION['patient'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Evenement dynamique </title>
    <link rel="stylesheet" href="../../View/Style/PageProf.css" >
    <script src="../../Modele/Fonction/LesFonctionsJS.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
<?php
include("../../View/HTML/BarreScenario.php");

require("../../Modele/Fonction/ConnectionBDD.php");
require('FonctionScenario.php');
// affichage des événements existants
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();
$sql=$bdd->prepare("Select * from scenario where idpatient= ? order by ordre desc");
$sql->bindParam(1,$id);
$sql->execute();
$res=$sql->fetchAll();

// faire l'affichage des anciens événement

echo'
<div class="container">
	<h2>Ajouter des événements</h2>
	<form action="ajouter_elements.php" method="POST">
		<div class="form-group">
			<label for="texte">Texte :</label>
			<input type="text" class="form-control" id="texte" name="texte" required>
		</div>
		<div class="form-group">
			<label for="ordre">Ordre d\'apparition :</label>
			<input type="number" class="form-control" id="ordre" name="ordre" min="1" required>
		</div>
		<button type="submit" class="btn btn-primary">Ajouter</button>
	</form>
</div> ';



?>
