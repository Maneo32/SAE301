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
    <input type="file" name="image">
    <input type="submit" name="submit" value="Ajouter">
</form>
<br>
<form action="Diagnostic.php">
    <div class="button_Suivant">
        <input type="submit" name="Valider" value="Suivant">
    </div>
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

// Vérifie si l'utilisateur a sélectionné un fichier
    if(!empty($_FILES['image'])) {

// le contenu du fichier
        $image_name = $_FILES['image'];

// Connexion à la base de données
        $pdo = ConnectionBDD::getInstance();
        $bdd = $pdo::getpdo();

// Prépare et exécute la requête SQL pour insérer l'image dans la base de données
        $stmt = $bdd->prepare('INSERT INTO Radio (image, idpatient) VALUES (?, ?)');
        @$stmt->bindParam(1, $image_name);
        $stmt ->bindParam(2, $_SESSION['patient']);
        $stmt->execute();

        echo 'alert("image a été ajoutée à la base de données.")';
    } else {
        echo "Veuillez sélectionner une image à ajouter.";
    }
}


?>


