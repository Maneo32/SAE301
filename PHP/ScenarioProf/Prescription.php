<?php
session_start();
@$_SESSION['SaO2']=$_POST['SaO2'];
@$_SESSION['FR']=$_POST['FR'];
@$_SESSION['O2']=$_POST['O2'];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>ConnexionProfesseur</title>
        <link rel="stylesheet" href="../PageProf.css" >
        <script src="../LesFonctionsJS.js"></script>

    </head>
    <body>
<?php
include ('BarreScenario.html');
include ('EnteteV2.html');
?>

<div class="Titre">
    <h1>Prescription</h1>
</div>
<form action="" method="post">

    Medicament : <input type="text" name="medicament" required>
    <button type="button" onclick="afficher()">ajouter medicament</button>

    <br><br>
    Dose : <input type="number" name="dose" required>
    <br><br>
    Prise : <input type="date" name="prise" required>
    <br><br>
    Nom Médecin : <input type="text" name="nom" required>
    <br><br>
    <div class="button_Suivant">
        <input type="submit" name="Valider">
    </div>


</form>
<form method="post" style="visibility: hidden" id="form">
    Nom médicament : <input type="text" name="nommedic" required>
    <br><br>
    cp : <input type="number" name="cp" required>
    <br><br>
    prise : <input type="number" name="prisemedic" required>
    <br><br>
    <input type="submit" name="creermedic">

</form>

<footer>
    <form action="../Accueil.php" method="post">
        <input type="submit" value="Besoin d'aide ?">
    </form>
</footer>
    </body>


<?php
require ('../ConnectionBDD.php');
$bdd = ConnectionBDD::getInstance()::getpdo();
function insert($bdd){
    if (isset($_POST['Valider'])){
        $sql = $bdd->prepare("INSERT INTO prescription(prise, medicament, idpatient, medecin, dose) values (?, ?, ?, ?, ?)");
        $sql->execute(array($_POST['prise'], $_POST['medicament'], $_SESSION['patient'], $_POST['nom'], $_POST['dose']));
        echo 'Prescription ajoutée';

    }
}

function creermedic($bdd)
{
    if (isset($_POST['creermedic'])) {
        $sql = $bdd->prepare("INSERT INTO medicament(nom, cp, prise) values (?, ?, ?)");
        $sql->execute($_POST['nommedic'], $_POST['cp'], $_POST['prisemedic']);
        echo 'medicament crée';
}
}
insert($bdd);
creermedic($bdd);

?>
<script>
function afficher(){
    document.getElementById('form').setAttribute('style', 'visibility:visible')
}</script>
</html>


