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
<form action="Diagnostic.php">
        <input type="button" name="Valider" value="Suivant">
</form>

<div class="footer-CreateScenario">
    <form action="../../Accueil/BesoinAide.php" method="post">
        <button class="button-28" type="submit" >Besoin d'aide</button>
    </form>
</div>

</body>
</html>

<?php
require('../../../Modele/BDD/ConnectionBDD.php');

$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();

function uploadimg($bdd)
{


    $uploaddirname= $_FILES['userfile']['name'];
    $uploaddir = "C:/Users/coren/PhpstormProjects/SAE301/PHP/imgRadio/";
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

    echo '<pre>';
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        $insertImg= $bdd->prepare('INSERT INTO radio(name, idpatient) VALUES(?,?)');
        $insertImg->execute(array($uploaddirname,$_SESSION['patient']));
        echo "File is valid, and was successfully uploaded.\n";
    } else {
        echo "Possible file upload attack!\n";
    }

    echo 'Here is some more debugging info:';
    print_r($_FILES);

    print "</pre>";
}
if(isset($_FILES['userfile'])){
    uploadimg($bdd);
}

?>