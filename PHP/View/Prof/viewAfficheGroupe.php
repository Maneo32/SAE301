<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>GroupeScenario</title>
    <link rel="stylesheet" href="../../View/Style/PageProf.css">
    <script src="../../Modele/Fonction/LesFonctionsJS.js"></script>

</head>



<body>
<?php
include("../../View/BarreHTML/BarreScenario.php");
$nomgrp=getNomGrp();
$grp=getGroupe();
?>

<h2>Groupe : <?php echo $nomgrp; ?></h2>

<table>


    <tr>
        <th> Étudiants </th>
        <br></tr>

    <?php
    /* boucle qui permet d'afficher tous les étudiants d'un groupe dans un tableau*/

    for($i=0; $i<sizeof($grp); $i++){
    ?><tr><?php

        ?> <td><?php echo $grp[$i][0]?></td>
        <br>
        <?php }?>
    </tr>
</table>

<br><br>
<a href="CreateScenario.php">
    <button class="button-90">Retour</button>
</a>
</body>
</html>