<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Diagnostic</title>
    <link rel="stylesheet" href="../../View/Style/PageProf.css" >
    <script src="../../Modele/Fonction/LesFonctionsJS.js"></script>

</head>
<body>
<?php
include("../../View/BarreHTML/BarreScenario.php");
include("../../View/BarreHTML/EnteteV2.html");
include('../../Modele/BDD/ConnectionBDD.php');

?>
    <h2>Date du Diagnostic</h2>

<Form action="Diagnostic.php" method="post">
    Date :
    <input type="datetime-local" name="date" id="date" required>
    <h2>Intervenant</h2>
    Nom :<input type="text" name="nom" id="nom"  placeholder="Nom de l'intervenant " required><br>
    Prénom :<input type="text" name="prenom" id="prenom" placeholder="Prenom de l'intervenant" required><br><br>
   <h2>Diagnostic:</h2>
    <div class="Diagnostic">
    <textarea name="diagnostic" id="diagnostic" rows="20" cols="80" required> </textarea></div> <br>
    <div class="button_Suivant">
        <input type="submit" name="Valider" onclick="<?php
        $bdd = ConnectionBDD::getInstance()::getpdo(); insertDiag($bdd)?>">
    </div>
</Form>
<br>
<form action="Prescription.php" method="post">
    <input type="submit" name="suivant" value="Suivant">
</form>

<div class="footer-CreateScenario">
    <form action="../Accueil/BesoinAide.php" method="post">
        <button class="button-28" type="submit">Besoin d'aide</button>
    </form>
</div>
</body>
</html>

<?php
/**
 * @param $bdd
 * @return void
 */
function insertDiag($bdd){
    if (isset($_POST['Valider'])){
        $sql = $bdd->prepare("INSERT INTO diagnostic(date,nom,prenom,compterendu, idpatient ) values (?, ?, ?, ?, ?)");
        $sql ->bindParam(1, $_POST['date']);
        $sql ->bindParam(2, $_POST['nom']);
        $sql ->bindParam(3, $_POST['prenom']);
        $sql ->bindParam(4, $_POST['diagnostic']);
        $sql ->bindParam(5, $_SESSION['patient']);

        $sql ->execute();
    }
}
/* permet de créer un nouveau diagnostic et le mettre dans la base de données*/

?>


