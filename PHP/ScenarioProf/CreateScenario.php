<?php
session_start()
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
<div class="Titre">
    <h1>Création de Scénario</h1>
</div>


    <!--Le bas de page avec le boutton si on a besoin d'aide-->
    <footer>
        <form action="Patient.php" method="post">
            <input type="submit" value="Créer un patient" name="Créer">
        </form>
        <br>
        <form action="../Accueil.php" method="post">
            <input type="submit" value="Besoin d'aide ?">
        </form>
    </footer>




    <?php
    include ('../ConnectionBDD.php');
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();
        $patients = $bdd->query("SELECT * FROM patient");

        ?>
    <form method="post">
    <select name="patient">
        <option value="2">Selectionnez un patient</option>
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
            }
            ?>
                </select>
        <input type="submit" value="Ajouter une contrainte" name="Contrainte">
        <input type="submit" value="Afficher le scénario" name="affiche">
    </form>
<br>
<div class="contrainte">

</div>
</body>

</html>

<?php
function contrainte(){
    if (isset($_POST['patient']) && $_POST['patient']!=2){
        if (isset($_POST['Contrainte'])) {
            $_SESSION['patient']=$_POST['patient'];
            header('Location: Radio.php');
            }
        }
}

function affichersce(){
    echo '0';
    if (isset($_POST['patient']) && $_POST['patient']!=2){
        echo '1';
        if (isset($_POST['affiche'])){
            $_SESSION['scenario']=$_POST['patient'];
            header('Location: afficheScenario.php');
        }
    }
}
affichersce();
contrainte();

    ?>



