<?php
session_start();
if (isset($_POST['Ajouter'])) {

    @$_SESSION['nom'] = $_POST['nom'];
    @$_SESSION['prenom'] = $_POST['prenom'];
    @$_SESSION['DDN'] = $_POST['DDN'];
    @$_SESSION['poids'] = $_POST['poids'];
    @$_SESSION['taille'] = $_POST['taille'];
    @$_SESSION['IEP'] = $_POST['IEP'];
    @$_SESSION['IPP'] = $_POST['IPP'];
    @$_SESSION['sexe'] = $_POST['sexe'];
    if (empty($_POST['adresse'])) {
        @$_SESSION['adresse'] = $_POST['adresse'];
    }
    if (empty($_POST['CP'])) {
        @$_SESSION['CP'] = $_POST['CP'];
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Radio</title>
    <link rel="stylesheet" href="../../View/Style/PageProf.css" >
    <script src="../../Modele/Fonction/LesFonctionsJS.js"></script>

</head>
<body>
<?php
include("../../View/HTML/BarreScenario.php");
include("../../View/HTML/EnteteV2.html");
?>

    <h2>Radio</h2>
<form method="POST" enctype="multipart/form-data">
    <label for="image">Choisir une radio :</label>
    <input type="file" name="image" id="image">
    <input type="submit" name="submit" value="Ajouter">
</form>
<br>
<form action="Diagnostic.php">
        <input type="button" name="Valider" value="Suivant">
</form>

<div class="footer-CreateScenario">
    <form action="../Accueil/BesoinAide.php" method="post">
        <button class="button-28" type="submit" >Besoin d'aide</button>
    </form>
</div>

</body>
</html>

<?php
require("../../Modele/Fonction/ConnectionBDD.php");

$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();


if(isset($_POST['submit'])) {
    // Récupérer les informations du fichier envoyé
    $file = $_FILES['image'];
    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileContent = file_get_contents($file['tmp_name']);


// Connexion à la base de données
        $pdo = ConnectionBDD::getInstance();
        $bdd = $pdo::getpdo();

// Prépare et exécute la requête SQL pour insérer l'image dans la base de données
        $stmt = $bdd->prepare('INSERT INTO Radio (name,type,content, idpatient) VALUES (?, ?,?,?)');
        $stmt->bindParam(1, $fileName);
        $stmt->bindParam(2, $fileType);
        $stmt->bindParam(3, $fileContent, PDO::PARAM_LOB);
        $stmt->bindParam(4, $_SESSION['patient']);
        $stmt->execute();

        echo "<script>alert('Cette image a été ajoutée à la base de données.');</script>";


}


?>


