<?php
session_start();

if (isset($_POST['Valider'])) {
    ?>
    <script> console.log('BAPTISTE TA MERE');</script>
    <?php
    @$_SESSION['Date'] = date("Y-m-d H:m:s", strtotime($_POST["date"]));
    @$_SESSION['alimentaire'] = $_POST['alimentaire'];
    @$_SESSION['hydratation'] = $_POST['hydratation'];
    @$_SESSION['regime'] = $_POST['regime'];
    @$_SESSION['jeun'] = $_POST['jeun'];
    @$_SESSION['aideRepas'] = $_POST['aideRepas'];
    require('../../../Modele/BDD/ConnectionBDD.php');
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();
    require("../../../Modele/Fonction/FonctionPhp.php");
    @ajoutDeDonneeAvecLesBooleans($bdd, "Alimentation", 'alimentaire');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Alimentation", 'hydratation');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Alimentation", 'regime');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Alimentation", 'jeun');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Alimentation", 'aideRepas');


}
include('../../../View/Prof/viewSoinsClassique.php');
?>
