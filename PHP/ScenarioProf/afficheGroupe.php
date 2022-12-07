<?php
session_start();
include ('../ConnectionBDD.php');
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();
require('FonctionScenario.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="../PageProf.css">
    <script type="text/javascript" src="../LesFonctionsJS.js"></script>

</head>



<body>
<?php
include("BarreScenario.html");
?>
<h2>Groupe : <?php echo nomgrp($bdd) ?></h2>

<table>


    <tr>
        <th> Étudiants </th>
        <br></tr>

<?php
$grp = etugrp($bdd)->fetchAll();
for($i=0; $i<sizeof($grp); $i++){
    ?><tr><?php

    ?> <td><?php echo $grp[$i][0]?></td>
    <br>
<?php }?>
    </tr>
</table>

<br><br>
<a href="CreateScenario.php">
    <button>Retour</button>
</a>
</body>
</html>

