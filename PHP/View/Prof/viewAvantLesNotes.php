<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ScenarioEtudiant </title>
    <link rel="stylesheet" href="../../View/Style/PageProf.css" >
    <script src="../../Modele/Fonction/LesFonctionsJS.js"></script>

</head>
<body>
<?php
include("../../View/BarreHTML/BarreScenario.php");

?>
<h2>Notes des Scénarios</h2>
<form method="post" action="Note.php">
    <select name="patient">
        <option value="2">Sélectionnez un patient</option>
        <?php
        $patients=getPatientCon();
        /* liste deroulante qui nous permet de sélectionner un patient*/
        while ($patient = $patients->fetch()){
            $pat = $patient[1];
            $pat.=" ";
            $pat.=$patient[2];
            $pat.=" ";
            $pat.=$patient[4];
            ?>
            <option value=<?php echo $patient[0]?>><?php echo $pat?></option>
            <?php
        }

        ?>
    </select>
    <button class="button-90" type="submit" name="note">Voir les notes </button>

</form>
<div class="footer-CreateScenario">

    <br>
    <form action="../Accueil/BesoinAide.php" method="post">
        <button class="button-28" type="submit">Besoin d'aide</button>
    </form>
</div>
</body>
</html>
