<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Scenario</title>

    <link rel="stylesheet" href="../../View/Style/PageProf.css">
    <script src="../../Modele/Fonction/LesFonctionsJS.js"></script>

</head>


<body>  <!--Le haut de la page avec l'image et le titre-->
<div class="font">
    <div class="header">
        <a href="../../Controleur/Accueil/Accueil.php">
            <img src="../../View/image/logoIFSI.png" width=120 height=80 alt="leLogo" >
        </a>
        <h1>Institut de Formation aux Soins Infirmiers (IFSI)</h1>
        <div class="deconnexion">
            <a href="../../Controleur/Accueil/Disconnect.php">
                <img src="../../View/image/Deconnexion.png" class="icone" width="50" height="50" alt="Déconnexion">
            </a>
        </div>
    </div>
</div>



<h2>Le Scénario</h2>
<button class="button-90" onclick="window.history.back()">Retour</button>
<br><br>
<form action="../../Controleur/ScenarioAffichage/AfficheRadio.php">
    <button type="submit" class="button-90" >Radio</button>
</form>
<br><br>
<p id="idp"></p>

<table>
    <thead>
    <tr>
        <?php $patient = array("Nom", "Prénom", "Age", "Date de naissance", "Poids", "Taille", "IEP", "IPP", "Sexe", "Adresse", "Ville", "Code Postale");
        for ($i=0; $i<sizeof($patient); $i++){?>
            <th><?php echo $patient[$i]?></th>
        <?php }?>

    </tr>
    </thead>
    <tbody>
    <tr>
        <?php for ( $i=0; $i<12; $i++){?>
            <td onclick="change(<?php echo $i ?>, 0, 0)"><?php echo getGroupe($_SESSION['scenario'])[$i+1] ?></td>
        <?php }

        ?>

    </tr>
    </tbody>
</table>

<table>
    <br><br>
    <thead>


    <tr>
        <th> Date </th>

        <?php
        $laListeDesDates=getDatePresc($_SESSION['scenario']);

        for ($i=0; $i<count( $laListeDesDates); $i++){
            ?>
            <th> <?php echo  $laListeDesDates[$i][0]?></th>
            <?php
        }
        ?>
    </tr>
    <th><div class="title">Prescription </div></th>

    <tr>
        <th> Medicament </th>
        <?php
        @$Presc=getPresc($_SESSION['scenario']);
        for ($i=0; $i<count($laListeDesDates); $i++){
            ?>
            <td onclick="change(<?php echo $i+12?>, 0, 0)"> <?php echo $Presc[$i][3]?> </td>
            <?php
        }
        ?>


    </tr>
    <tr>
        <th> Médecin </th>
        <?php
        @$Presc=getPresc($_SESSION['scenario']);
        for ($i=0; $i<count($laListeDesDates); $i++){
            ?>
            <td onclick="change(<?php echo $i+12+sizeof(getDatePresc($_SESSION['scenario'])) ?>, 0, 0)"> <?php echo $Presc[$i][5]?> </td>
            <?php
        }
        ?>
    </tr>
    <tr>
        <th> Dose (en mg) </th>
        <?php
        @$Presc=getPresc($_SESSION['scenario']);
        for ($i=0; $i<count($laListeDesDates); $i++){
            ?>
            <td onclick="change(<?php echo $i+12+(2*sizeof(getDatePresc($_SESSION['scenario']))) ?>, 0, 0)"> <?php echo $Presc[$i][2]?> </td>
            <?php
        }
        ?>


    </tr>
    </thead>
</table>
<br>
<table>
    <br><br>
    <thead>


    <tr>
        <th> Date </th>

        <?php
        $laListeDesDates=getDateDiag();

        for ($i=0; $i<count( $laListeDesDates); $i++){
            ?>
            <th> <?php echo  $laListeDesDates[$i][0]?></th>
            <?php
        }
        ?>
    </tr>
    <th><div class="title">Intervenant </div></th>
    <tr>
        <th> Nom </th>
        <?php
        @$Diag=getDiag();
        for ($i=0; $i<count($laListeDesDates); $i++){
            ?>
            <td onclick="change(<?php echo $i+12+(3*sizeof(getDatePresc($_SESSION['scenario']))) ?>, 0, 0)"> <?php echo $Diag[$i][2]?> </td>
            <?php
        }
        ?>


    </tr>
    <tr>
        <th> Prenom </th>
        <?php
        @$Diag=getDiag();
        for ($i=0; $i<count($laListeDesDates); $i++){
            ?>
            <td onclick="change(<?php echo $i+12+(3*sizeof(getDatePresc($_SESSION['scenario'])))+sizeof(getDateDiag())?>, 0, 0)"> <?php echo $Diag[$i][3]?> </td>
            <?php
        }
        ?>
    </tr>
    <th><div class="title">Diagnostic </div></th>

    <tr>
        <th> Compte Rendu </th>
        <?php
        @$Diag=getDiag();
        for ($i=0; $i<count($laListeDesDates); $i++){

            ?>
            <td onclick="change(<?php echo $i+12+(3*sizeof(getDatePresc($_SESSION['scenario'])))+2*sizeof(getDateDiag())?>, 0, 0)"> <?php echo $Diag[$i][4]?> </td>
            <?php
        }
        ?>


    </tr>
    </thead>
</table>

<?php



$donnee = getDonnee();


@$categorie = $donnee[0]['nom'];
$max = count($donnee);
$i = 0;
$var=0;

// tant qu'on a pas tout affiché on continue
while ($i<$max){
    ?>
    <br>
    <?php
    if ($categorie==$donnee[$i]['nom'] || $var==0){
        $var=1;
        ?>
        <table>
        <th><div class="title"><?php echo $donnee[$i]['nom']?> </div></th>


        <tr>
            <?php $nomType=$donnee[$i]['type'];
            $nbType=getNombreColonneType($categorie,$nomType);


            ?>
        </tr>
        <tr>
            <th> <?php echo $donnee[$i]['type']?> </th>

            <?php
            for ($j=$i; $j<$i+$nbType; $j++){

                ?>
                <td> <?php echo $donnee[$j]['date']?> </td>

                <?php
            }
            ?>
        </tr>
        <tr>
            <th> <?php echo 'donnée'?> </th>
            <?php
            for ($j=$i; $j<$i+$nbType; $j++){   ?>
                <td onclick= "change(<?php echo ($i+12+(3*sizeof(getDatePresc($_SESSION['scenario'])))+3*(sizeof(getDateDiag()))+$j+$nbType)?>, '<?php echo $donnee[$i]['date']?>', '<?php echo $donnee[$i]['type']?>')" > <?php echo $donnee[$j]['donnee']?> </td>
                <?php

            }
            ?> </tr> <?php
        $i = $i+$nbType-1;
        if ($i>=$max)
            break;
    }

    else
    {
        ?>
        </table>
        <?php
    }




    ?>
    <?php
    if ($var==1){
        $i=$i+1;
        if ($i>=$max)
            break;
        $categorie=$donnee[$i]['nom'];


        ?>
        </table>
        <?php
    }



}
?>


</body>
</html>

<script>



    document.cookie = 'valid = '+""
    function recupererCookie(nom) {

        nom = nom + "=";
        var liste = document.cookie.split(';');
        console.log(liste);
        for (var i = 0; i < liste.length; i++) {
            var c = liste[i];
            // ignorer les espaces en début de chaîne
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nom) == 0) return c.substring(nom.length, c.length);
        }
        return null;
    }

    document.cookie = 'reload = '+0;
    function controle() {
        const test = document.form.input.value;
        document.cookie = "case = " + test;
        return test;
    }

    function change($i, $date, $do) {
        // demander à l'utilisateur quelle donnée il souhaite mettre
        var variableRecuperee = <?php echo json_encode($_SESSION['fonction']); ?>;
        if (variableRecuperee==='prof') {
            var $a = prompt("Quelle donnée voulez vous mettre?")
            var l = "";
            document.getElementsByTagName("td")[$i].innerHTML = $a;
            l = l + "!";
            l = l + $a;
            l = l + "!";
            l = l + $i;
            console.log(l);
            document.cookie = "valid = " + l;
            document.cookie = "date = " + $date;
            document.cookie = "do = " + $do;
            document.cookie = 'reload = ' + 1;
            location.reload();
            return l;
        }
    }

</script>
