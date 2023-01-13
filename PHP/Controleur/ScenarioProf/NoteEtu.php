<?php
session_start();
require("../../Modele/Fonction/ConnectionBDD.php");
$mail= $_SESSION['email'];
$conn = ConnectionBDD::getInstance();
$pdo = $conn::getpdo();
?>
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
include("../../View/HTML/BarreScenarioEtu.html");
?>

<br>
<?php
function fetchNote($bdd, $id)
{
    $mail= $_SESSION['email'];
    $sql = $bdd->prepare("SELECT nom,prenom,ddn,note from note JOIN patient p on p.idpatient = note.idpatient where email=?");
    $sql->execute(array($id));
    $array = $sql->fetchAll();
    return $array;
}

$arrayRslt= fetchNote($pdo,$mail);


?>

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
</body>
</html>