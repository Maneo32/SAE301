<?php
session_start();
@$_SESSION['Date']=date("Y-m-d H:m:s", strtotime($_POST["date"]));
@$_SESSION['urine']=$_POST['urine'];
@$_SESSION['gaz']=$_POST['gaz'];
@$_SESSION['selles']=$_POST['selles'];
require ("../ConnectionBDD.php");
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();
require ("../FonctionPhp.php");
@ajoutDeDonneeAvecLesBooleans($bdd,"Elimation",'urine');
@ajoutDeDonneeAvecLesBooleans($bdd,"Elimation",'gaz');
@ajoutDeDonneeAvecLesBooleans($bdd,"Elimation",'selles');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ConnexionProfesseur</title>
    <link rel="stylesheet" href="../PageProf.css" >
    <script src="../LesFonctionsJS.js"></script>

</head>
<body>


    <?php
    include("BarreScenario.html");
    include("EnteteV2.html");
    ?>
    <h2>Cardio</h2>
<form method="post" action="Mobilite.php">
    <!-- Ce champ caché sert a ne pas faire attendre l'utilisateur même si il upload un fichier trop gros pour php -->
    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
    Image (Facultatif) ?: <input name="userfile" type="file" />
    <input type="submit" value="Ajouter" />
    <br><br>
    Date :
    <input type="datetime-local" name="date" id="date" required><br><Br>
    TA : <input type="text" name="TA" id="TA" > <br><br>
    PLS :<input type ="text" name="pls" id=pls> <br><br>
    ECG :<input type="text" name="ECG" id="ECG">
    <br><br>
    <div class="button_Suivant">
        <input type="submit" value="Valider">
    </div>
</form>
<footer>
    <form action="../Accueil.php" method="post">
        <input type="submit" value="Besoin d'aide ?">
    </form>
</footer>
</body>
</html>

<?php
?>
