<?php
require('../../Modele/BDD/ConnectionBDD.php');
// On récupère l'instance de la connexion à la base de données
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();
global $bdd;

function getPatient()
{
    global $bdd;
    $patients = $bdd->prepare("SELECT * FROM patient where emailprof=?");
    $patients->bindParam(1, $_SESSION['email']);
    $patients->execute();
    return $patients;
}

function getData(){
    global $bdd;
    $sql = $bdd->prepare("select * from reponseetu where idpatient=?");
    $sql->execute(array($_POST['patient']));
    $data = $sql->fetch();
    return $data;
}

function idk($data){
    global $bdd;
    $sql2 = $bdd->prepare("select * from etudiant where email=?");
    $sql2->execute(array($data[1]));
    return $sql2;
}


//cette fonction sert à afficher les réponses des patients par l'élève sélectionné par le professeur
function affichage(){
    global $bdd;
    if (isset($_POST['eleve'])) {
        $_SESSION['eleve'] = $_POST['eleve'];
        // On récupère les informations de l'élève ayant répondu
        $sql = $bdd->prepare("select * from reponseetu where idpatient=? ORDER BY ordre");
        $sql->execute(array($_SESSION['patient']));
        $data = $sql->fetch();
        $sql2 = $bdd->prepare("select * from etudiant where email=?");
        $sql2->execute(array($data[1]));
        $data2 = $sql2->fetch();
        $sql4 = $bdd->prepare("select * from patient where idpatient=?");
        $sql4->execute(array($data[2]));
        $data4 = $sql4->fetch();
        echo $data2[2] . " " . $data2[3];
        echo '<br>';
        echo "Scenario : ".$data4[1]." ".$data4[2]." ".$data4[4];
        echo '<br><br>';
        $a = true;
        $sql = $bdd->prepare("select * from reponseetu where idpatient=? ORDER BY ordre");
        $sql->execute(array($_SESSION['patient']));
        while ($data = $sql->fetch()) {
            if ($a && $data[4]==0){
                echo $data[3];
                echo '<br><br>';
                $a=false;
            }
            else{
                $sql2 = $bdd->prepare("select * from scenario where idpatient=?");
                $sql2->execute(array($data[2]));
                while ($data2 = $sql2->fetch()){
                    if ($data2[1]==$data[4]){
                        echo "-Evenement : ".$data2[2];
                        echo '<br>';
                        echo "Reponse : ".$data[3];
                        echo '<br><br>';
                    }
                }


            }


            // On affiche le nom, le prénom et la réponse de l'élève

            $sql3 = $bdd->prepare("select * from note where idreponse=?");
            $sql3->execute(array($data[0]));
            $data3 = $sql3->fetch();



        }
        ?>
        <form method="post">
            <input type="number" max="20" name="note" step="0.1" value="<?php echo $data3[2]?>" placeholder="Entrez la note">
            <input type="submit" class="button-90" value="Valider">
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

function noter(){
    global $bdd;
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
