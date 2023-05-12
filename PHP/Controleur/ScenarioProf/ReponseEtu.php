<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ReponseEtudiant </title>
    <link rel="stylesheet" href="../../View/Style/PageProf.css" >
    <script src="../../Modele/Fonction/LesFonctionsJS.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>
<body style="background-color: lightblue">
<?php
include("../../View/BarreHTML/BarreScenarioEtu.php");

require('../../Modele/BDD/ConnectionBDD.php');
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();

/**
 * @param $bdd
 * @return void
 * ajout de la reponse a la table en fonction de l'etudiant et du scenario
 */

/*Recupération des données des patients afin de l'afficher*/
    $nomscena = $bdd->prepare("SELECT nom,prenom,ddn FROM patient where idpatient=?");
    $nomscena->bindParam(1, $_SESSION['patient']);
    $nomscena->execute();
    $res = $nomscena->fetch();

/*Recupération le nombre d'evenement par scenario*/

    $nbEvenement = $bdd->prepare("SELECT * FROM scenario where idpatient=? order by ordre asc");
    $nbEvenement->bindParam(1,$_SESSION['patient']);
    $nbEvenement->execute();
    $res2 = $nbEvenement->fetchAll();

    $nbRep = $bdd->prepare("Select * from reponseetu where idpatient=? and email=?");
    $nbRep->bindParam(1,$_SESSION['patient']);
    $nbRep->bindParam(2,$_SESSION['email']);
    $nbRep->execute();
    $dejaRep=$nbRep->fetchAll();

    /* le if est else sont présent pouyr attendre le clique de l'étudiant avant de changer la page*/
    if(count($dejaRep)>0){
        echo '<script> if (window.confirm("Vous avez déja répondu pour ce patient ?")) {
    
    window.location.href = "ScenarioEtu.php";}
    else{
      window.location.href = "ScenarioEtu.php";  
    }
    </script>';



    }


?>
<br>
<form action="ScenarioEtu.php" method="post">
    <button class="button-90" >Retour</button>
</form>
<h4>Réponse au Scénario : <?php echo $res[0]," ",$res[1]," né le ",$res[2] ?>  </h4>


<div class="mx-auto" style="width: 750px;" >
<textarea name="textereponse0" id="textereponse0" ordre="0" rows="20" cols="80" required> </textarea> <br>
</div>

<input id="rep0" type="submit" name="Valider" onclick="ajoutNouvelEvenement(0)" value="Envoyer">

<?php
for ($i=1;$i<count($res2)+1;$i++){
    echo '
    <div class="d-none" id="div'.$i.'" > 
        <div class="mx-auto" style="width: 750px;" >
            <h4> Evenement : '.$res2[$i-1]["texte"].'</h4>
            <textarea name="textereponse'.$i.'" id="textereponse'.$i.'" ordre="'.$res2[$i-1]["ordre"].'" rows="20" cols="80" required> </textarea> <br>
        </div>

        <input id="rep'.$i.'" type="submit" name="Valider" onclick="ajoutNouvelEvenement('.$i.')" value="Envoyer">
        

    </div>
';

}

?>

</body>
</html>



<script>
function ajoutNouvelEvenement(i){
    $("#rep"+i).prop("disabled", true);
    $("#div"+(i+1)).removeClass("d-none");
    var reponse = document.getElementById("textereponse"+i).value;
    var ordre = document.getElementById("textereponse"+i).getAttribute('ordre');

    $.ajax({
        url: '../../Modele/addReponseEtu.php',
        data: 'reponse=' +reponse+
            '&ordre='+ordre,


    })
}

</script>

