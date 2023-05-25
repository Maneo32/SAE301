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

<br>
<?php
$arrayRslt= ftnote();
?>
<h2>Vos Notes</h2>
<table>
    <thead>
    <tr>
        <th><div class="title">Patient </div></th>
        <th> Note </th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($arrayRslt as $etu){

        ?>
        <tr>
            <th> <?php echo $etu[0]," ",$etu[1]," ",$etu[2]?></th>
            <td> <?php echo $etu[3]?></td>

        </tr>
        <?php

    }
    ?>
    </tbody>
</table>

<div class="footer-CreateScenario">
    <br>
    <form action="../Accueil/BesoinAide.php" method="post">
        <button class="button-28" type="submit">Besoin d'aide</button>
    </form>
</div>
</body>
</html>