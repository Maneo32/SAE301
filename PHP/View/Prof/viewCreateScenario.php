<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Creation Scenario</title>
    <link rel="stylesheet" href="../../View/Style/PageProf.css">

</head>



<body>
<?php
include("../../View/BarreHTML/BarreScenario.php");
?>
<h2>Création de Scénario</h2>






<!--selection du patient avec ses options de navigation-->

<?php


/* fonction qui nous oblige à sélectionner un patient pour accéder à la page de suppression de scenario*/

afficher();

$p = patients();
$patients = $p[0];
$groupes = $p[1];
$etudiants = $p[2];
$patientsScenario = $p[3];
$groupesScenario = $p[4];

?>
<form method="post">
    <select name="patient">
        <option value="2">Sélectionnez un patient</option>
        <?php

        while ($patient = $patients->fetch()){
            $pat = $patient[1];
            $pat.=" ";
            $pat.=$patient[2];
            $pat.=" ";
            $pat.=$patient[4];
            ?>
            <option value=<?php echo $patient[0]?>><?php echo $pat?></option>
            <?php
        }             $_SESSION['patient']=$_POST['patient'];

        ?>
    </select>
    <button class="button-90" type="submit" name="Contrainte">Ajouter une contrainte</button>
    <button class="button-90" type="submit" name="Evenement">Ajouter un évènement</button>
    <button class="button-90" type="submit" name="affiche">Afficher le scénario</button>
    <button class="button-90" type="submit" name="Supprimer">Supprimer le patient</button>

</form>
<br>



<form method="post">
    <h4>Créer un groupe</h4>
    <input type="text" placeholder="Nom du groupe" name="grp">
    <button class="button-90" type="submit" name="Creer">Créer le groupe</button>
    <br>
    <h4>Ajouter étudiant au groupe</h4>
    <select name="grp2">
        <option value="!">Sélectionnez un Groupe</option>
        <?php
        while ($groupe = $groupes->fetch()){
            $grp =$groupe[1];
            $grp.=" ";
            ?>
            <option value=<?php echo $groupe[0]?>><?php echo $grp?></option>
            <?php

        }$_SESSION['grp']=$_POST['grp2'];

        ?>
    </select>
    <button class="button-90" type="submit" name="affgrp">Afficher le groupe</button>


    <select name="etud">
        <option value="!">Sélectionnez un étudiant</option>
        <?php
        while ($etudiant = $etudiants->fetch()){
            $etu =$etudiant[2];
            $etu.=" ";
            $etu.=$etudiant[3];
            ?>
            <option value=<?php echo $etudiant[0]?>><?php echo $etu?></option>
            <?php
        }



        ?>
    </select>
    <button class="button-90" type="submit" name="ajoutEtu">Ajouter</button>


    <h4>Envoie du scénario</h4>
    <select name="patientScena">
        <option value="!">Sélectionnez un scénario</option>
        <?php
        while ($patient = $patientsScenario->fetch()){
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
    <select name="GroupeScena">
        <option value="!">Sélectionnez un Groupe</option>
        <?php
        while ($groupe = $groupesScenario->fetch()){
            $grp =$groupe[1];
            $grp.=" ";
            ?>
            <option value=<?php echo $groupe[0]?>><?php echo $grp?></option>
            <?php
        }
        ?>
    </select>
    <button class="button-90" type="submit" name="envoie">Envoyer</button>



</form>
<br>
<!--Le bas de page avec le boutton si on a besoin d'aide et de création d'un nouveau patient-->
<div class="footer-CreateScenario">
    <form action="ContrainteScenario/Patient.php" method="post">
        <button class="button-28" type="submit">Créer un patient</button>
    </form>
    <br>
    <form action="../Accueil/BesoinAide.php" method="post">
        <button class="button-28" type="submit">Besoin d'aide</button>
    </form>
</div>
</body>

</html>