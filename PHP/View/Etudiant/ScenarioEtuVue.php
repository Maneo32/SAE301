<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../View/Style/PageProf.css" >

</head>
<body>
<?php
include("../../View/BarreHTML/BarreScenarioEtu.php");


$scena = scenari();
affichersc();
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
<br>
<div class="footer-CreateScenario">
    <form action="../Accueil/BesoinAide.php" method="post">
        <button class="button-28" type="submit">Besoin d'aide</button>
    </form>
</div>
</body>

</body>
</html>
