<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Note</title>

    <link rel="stylesheet" href="../../View/Style/PageProf.css" >
    <script src="../../Modele/Fonction/LesFonctionsJS.js"></script>

</head>
<body>
<?php
include("../../View/BarreHTML/BarreScenario.php");

$res = etu();
?>
<br>
<button class="button-90" onclick="window.history.back()">Retour</button>
<br>
<br>
<table>
    <thead>
    <tr>
        <th><div class="title">Étudiant </div></th>

        <?php
        {
            echo "<th>NOTE</th>";
        }
        ?>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($res as $etu){
        $note=AvoirLaNoteDunEtu($etu[2]);

        ?>
        <tr>
            <th> <?php echo $etu[0]," ",$etu[1]?></th>
            <td> <?php echo $note?></td>

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
