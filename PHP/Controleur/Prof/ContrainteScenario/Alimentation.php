<?php
session_start();
if (isset($_POST['Valider'])) {
    @$_SESSION['Date'] = date("Y-m-d H:m:s", strtotime($_POST["date"]));

    @$_SESSION['toilette'] = $_POST['toilette'];
    @$_SESSION['douche'] = $_POST['douche'];
    @$_SESSION['bain'] = $_POST['bain'];
    @$_SESSION['refectionLit'] = $_POST['refectionLit'];
    @$_SESSION['change'] = $_POST['change'];
    @$_SESSION['soinBouche'] = $_POST['soinBouche'];
    @$_SESSION['escare'] = $_POST['escare'];
    @$_SESSION['position'] = $_POST['position'];
    @$_SESSION['matelas'] = $_POST['matelas'];
    require('../../../Modele/BDD/ConnectionBDD.php');
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();
    require("../../../Modele/Fonction/FonctionPhp.php");
    @ajoutDeDonneeAvecLesBooleans($bdd, "Hygiene", 'toilette');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Hygiene", 'douche');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Hygiene", 'bain');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Hygiene", 'refectionLit');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Hygiene", 'soinBouche');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Hygiene", 'escare');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Hygiene", 'position');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Hygiene", 'matelas');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ConnexionProfesseur</title>
    <link rel="stylesheet" href="../../../View/Style/PageProf.css" >
    <script src="../../../Modele/Fonction/LesFonctionsJS.js"></script>

</head>



<body>
<?php
include("../../../View/BarreHTML/BarreScenario2.php");
include("../../../View/BarreHTML/EnteteV2.html");
?>
<h2>Alimentation du patient</h2>
<form method="post" action="SoinsClassique.php">

    Date :
    <input type="datetime-local" name="date" id="date" required>
    <br><br>
    Le patient est-il a jeun ?:
    <input type="radio" name="jeun" value="oui" required>oui
    <input type="radio" name="jeun" value="non" checked="checked" required>non
    <br><br>
    Le patient est-il sous surveillance hydratation ?:
    <input type="radio" name="hydratation" value="oui" required >oui
    <input type="radio" name="hydratation" value="non" checked="checked" required>non
    <br><br>
    Le patient est-il sous surveillance alimentaire :
    <input type="radio" name="alimentaire" value="oui" required>oui
    <input type="radio" name="alimentaire" value="non" checked="checked" required>non
    <br><br>
    Le patient suit-il un régime? :
    <input type="radio" name="regime" value="oui" required>oui
    <input type="radio" name="regime" value="non" checked="checked" required>non
    <br><br>
    Le patient a t-il eu une aide au repas:
    <input type="radio" name="aideRepas" value="oui" required>oui
    <input type="radio" name="aideRepas" value="non" checked="checked" required>non
    <br><br>
    <div class="button_Suivant">
        <input type="submit" value="Valider">
    </div>
</form>
<div class="footer-CreateScenario">
    <form action="../../Accueil/BesoinAide.php" method="post">
        <button class="button-28" type="submit">Besoin d'aide</button>
    </form>
</div>
</body>
</html>

<?php
?>
