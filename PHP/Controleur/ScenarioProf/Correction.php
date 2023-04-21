<?php
// On démarre la session
session_start();
?>
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
// On inclut les fichiers HTML de la barre de navigation et de la connexion à la base de données
include("../../View/HTML/BarreScenario.php");

require("../../Modele/Fonction/ConnectionBDD.php");
// On récupère l'instance de la connexion à la base de données
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();
?>
<h4>Correction Scénario</h4>

<?php
if (!isset($_POST['patient'])){
    // On affiche un formulaire permettant de sélectionner un patient
    ?>
    <form method="post" name="patient">
        <select name="patient" onchange="this.form.submit()">
            <option>Sélectionnez un patient</option>
            <?php
            $patients = $bdd->prepare("SELECT * FROM patient where emailprof=?");
            $patients->bindParam(1,$_SESSION['email']);
            $patients->execute();
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
<?php }elseif (!isset($_POST['eleve'])){
    @$_SESSION['patient'] = $_POST['patient'];
    ?>
    <form method="post">
        <select name="eleve" onchange="this.form.submit()">
            <option value="!">Selectionnez un élève</option>
            <?php
            $sql = $bdd->prepare("select * from reponseetu where idpatient=?");
            $sql->execute(array($_POST['patient']));
            $data = $sql->fetch();
            $sql2 = $bdd->prepare("select * from etudiant where email=?");
            $sql2->execute(array($data[1]));
            while ($data2 = $sql2->fetch()){
                ?>
                <option name="<?php echo $data[1]?>" value=<?php echo $data[1]?>><?php echo $data[1]?></option>
            <?php }
            ?>
        </select>
    </form>
    <?php

}


//cette fonction sert à afficher les réponses des patients par l'élève sélectionné par le professeur
function affichage($bdd){
    if (isset($_POST['eleve'])) {
        $_SESSION['eleve'] = $_POST['eleve'];
        // On récupère les informations de l'élève ayant répondu
        $sql = $bdd->prepare("select * from reponseetu where idpatient=? ORDER BY ordre");
        $sql->execute(array($_SESSION['patient']));
        while ($data = $sql->fetch()) {
            $sql2 = $bdd->prepare("select * from etudiant where email=?");
            $sql2->execute(array($data[1]));
            $data2 = $sql2->fetch();
            $sql3 = $bdd->prepare("select * from note where idreponse=?");
            $sql3->execute(array($data[0]));
            $data3 = $sql3->fetch();
            // On affiche le nom, le prénom et la réponse de l'élève
            echo $data2[2] . " " . $data2[3] . " : " . $data[3];
            echo '<br>';}
            ?>
        <form method="post">
            <input type="number" max="20" name="note" value="<?php echo $data3[2]?>" placeholder="Entrez la note">
            <input type="submit" value="Valider">
                <input style="display: none" type="text" value="<?php
                $sql = $bdd->prepare("select * from reponseetu where idpatient=?");
                $sql->execute(array($_SESSION['patient']));
                $datatest = $sql->fetch();
                echo $datatest[0] ?>" name="id">
            </form>
            <br>
            <?php

    }
}
function noter($bdd){
    if (isset($_POST['note']) && isset($_POST['id'])) {
        $sql2 = $bdd->prepare("select * from note where idreponse=?");
        $sql2->execute(array($_POST['id']));
        $data = $sql2->fetch();
        if ($data) {
            $sql = $bdd->prepare("update note set note=? where idreponse=?");
            $sql->execute(array($_POST['note'], $_POST['id']));
        } else {
            $sql = $bdd->prepare("insert into note values (?, ?, ?, ?)");
            $sql->execute(array($_SESSION['eleve'], $_SESSION['patient'], $_POST['note'], $_POST['id']));
        }
    }
}

?>
<br>
<?php
@affichage($bdd);
@noter($bdd);
if (isset($_POST['destroy'])){
    unset($_SESSION['eleve']);
    unset($_SESSION['patient']);
    $_COOKIE['rl']=1;
}

if (@$_COOKIE['rl']==1){
    @$_COOKIE['rl']=0;
    header('Refresh:0');
}
?>
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