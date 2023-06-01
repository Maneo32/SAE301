<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Correction</title>
    <link rel="stylesheet" href="../../View/Style/PageProf.css" >
    <script src="../../Modele/Fonction/LesFonctionsJS.js"></script>

</head>
<body>
<?php
// On inclut les fichiers BarreHTML de la barre de navigation et de la connexion à la base de données
include("../../View/BarreHTML/BarreScenario.php");
?>
<h2>Correction Scénario</h2>
<?php
if (!isset($_POST['patient'])){
// On affiche un formulaire permettant de sélectionner un patient
?>
<form method="post" name="patient">
    <select name="patient" onchange="this.form.submit()">
        <option>Sélectionnez un patient</option>
        <?php
        $patients=getPatientCon();
        while ($patient = $patients->fetch()){
            $pat = $patient[1];
            $pat.=" ";
            $pat.=$patient[2];
            $pat.=" ";
            $pat.=$patient[4];
            // Si le patient est celui qui a été sélectionné, on l'affiche comme sélectionné dans la liste déroulante
            ?>
            <option name=<?php echo $patient[0]?> value="<?php echo $patient[0]?>" onclick="<?php echo $_POST["patient"]=$patient[0]?>"><?php echo $pat?></option>
        <?php }?>
    </select>

</form>

<?php
}elseif (!isset($_POST['eleve'])){
@$_SESSION['patient'] = $_POST['patient'];
?>
<form method="post">
    <select name="eleve" onchange="this.form.submit()">
        <option value="!">Selectionnez un élève</option>
        <?php
        $data=getDataCon();
        $sql2=getDataCon2($data);

        while ($data2 = $sql2->fetch()){
            ?>
            <option name="<?php echo $data[1]?>" value=<?php echo $data[1]?>><?php echo $data[1]?></option>
        <?php }
        ?>
    </select>
</form>

<?php }
appelerLesFonctions();
?>
<br>
<form method="post">
    <button class="button-90" role="button" type="submit" name="destroy">Changer d'élève</button>
</form>
<div class="footer-CreateScenario">
    <br>
    <form action="../Accueil/BesoinAide.php" method="post">
        <button class="button-28" type="submit">Besoin d'aide</button>
    </form>
</div>

</body>
</html>