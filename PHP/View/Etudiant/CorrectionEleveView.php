<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Note</title>
    <link rel="stylesheet" href="../../View/Style/PageProf.css" >

</head>
<body>
<?php
include("../../View/BarreHTML/BarreScenarioEtu.php");
?>
<h2>Scénario envoyé</h2>
<form method="post" name="patient">
    <select name="patient" onchange="this.form.submit()">
        <option>Selectionnez un patient</option>
        <?php
        $res = repElve($_SESSION['email']);

        foreach ($res as $rep){
            ?>
            <option name="<?php echo $rep[0]?>" value="<?php echo $rep[2]?>"><?php echo $rep[0]." ".$rep[1]?></option>
            <?php
        }

        ?>
    </select>
</form>
<?php
afficher();
?>
</body>

<div class="footer-CreateScenario">
    <br>
    <form action="../Accueil/BesoinAide.php" method="post">
        <button class="button-28" type="submit">Besoin d'aide</button>
    </form>
</div>
</html>