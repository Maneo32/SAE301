<?php

session_start();

if (isset($_POST['Valider'])){
@$_SESSION['Date']=date("Y-m-d H:m:s", strtotime($_POST["date"]));
@$_SESSION['prescrite']=$_POST['prescrite'];
@$_SESSION['confort']=$_POST['confort'];
@$_SESSION['surveillance']=$_POST['surveillance'];

require("../../Modele/Fonction/ConnectionBDD.php");
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();
require("../Accueil/FonctionPhp.php");
@ajoutDeDonneeAvecLesBooleans($bdd,"Securite",'prescrite');
@ajoutDeDonneeAvecLesBooleans($bdd,"Securite",'confort');
@ajoutDeDonneeAvecLesBooleans($bdd,"Securite",'surveillance');

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Soins Relationnel</title>
    <link rel="stylesheet" href="../../View/Style/PageProf.css" >
    <script src="../../Modele/Fonction/LesFonctionsJS.js"></script>

</head>
<body>
<?php
include("../../View/HTML/BarreScenario.html");
include("../../View/HTML/EnteteV2.html");
?>

    <h2>Soins Relationnel du patient</h2>
<form action="Elimination.php" method="post">

    Date :
    <input type="datetime-local" name="date" id="date" required>
    <br><br>
    Le patient est-il passé par l'accueil:
    <input type="radio" name="accueil" value="oui" required>oui
    <input type="radio" name="accueil" value="non" checked="checked" required>non
    <br><br>
    Le patient a-t-il eu un entretien avec un infirmier?:
    <input type="radio" name="entretien" value="oui" required>oui
    <input type="radio" name="entretien" value="non" checked="checked" required>non
    <br><br>
    Le patient a-t-il eu un toucher ou un massage :
    <input type="radio" name="massage" value="oui" required>oui
    <input type="radio" name="massage" value="non" checked="checked" required>non
    <br>
    <br>
    <div class="button_Suivant">
        <input type="submit" value="Valider" name="Valider">
    </div>
</form>
<div class="footer-CreateScenario">
    <form action="../Accueil/BesoinAide.php" method="post">
        <button class="button-28" type="submit">Besoin d'aide</button>
    </form>
</div>
</body>
</html>

<?php

?>
