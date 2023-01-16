<?php
session_start();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../View/Style/PageProf.css" >
        <script src="../../Modele/Fonction/LesFonctionsJS.js"></script>

    </head>
    <body>
<?php
include("../../View/HTML/BarreScenarioEtu.php");

require("../../Modele/Fonction/ConnectionBDD.php");
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();

require('FonctionScenario.php');

$scena = $bdd->prepare("SELECT DISTINCT  nom,prenom,DDN, p.idpatient from groupescenario join groupeetudiant g on groupescenario.idgroupe = g.idgroupe join patient p on groupescenario.idpatient = p.idpatient  where email=?" );
$scena->bindParam(1,$_SESSION['email']);
$scena->execute();

affichersce();

if (isset($_POST['patient']) && $_POST['patient'] != 2) {
    if(isset($_POST["reponse"])){
    header('Location:ReponseEtu.php ');

}}

?>

<h2>Scénario</h2>

<form method="post">
    <select name="patient">
        <option value="2">Sélectionnez un scénario</option>
        <?php

        while ($scenario = $scena->fetch()){
            $sc = $scenario[0];
            $sc.=" ";
            $sc.=$scenario[1];
            $sc.=" ";
            $sc.=$scenario[2]
            ?>
            <option value=<?php echo $scenario[3]?>><?php echo $sc?></option>
            <?php
        }

        ?>
    </select>
    <button class="button-90" type="submit" name="affiche">Afficher le scénario</button>
    <button class="button-90" type="submit" name="reponse">Répondre au scénario</button>




</form>
<div class="footer-CreateScenario">
    <form action="../Accueil/BesoinAide.php" method="post">
        <button class="button-28" type="submit">Besoin d'aide</button>
    </form>
</div>
    </body>

</body>
</html>

<?php
if(isset($_POST['patient'])) {
    $_SESSION['patient'] = $_POST['patient'];
}
?>
