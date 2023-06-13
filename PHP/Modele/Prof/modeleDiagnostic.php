<?php
/**
 * @param $bdd
 * @return void
 */
function insertDiag()
{
    $bdd = ConnectionBDD::getInstance()::getpdo();

    if (isset($_POST['Valider'])) {
        $sql = $bdd->prepare("INSERT INTO diagnostic(date,nom,prenom,compterendu, idpatient ) values (?, ?, ?, ?, ?)");
        $sql->bindParam(1, $_POST['date']);
        $sql->bindParam(2, $_POST['nom']);
        $sql->bindParam(3, $_POST['prenom']);
        $sql->bindParam(4, $_POST['diagnostic']);
        $sql->bindParam(5, $_SESSION['patient']);

        $sql->execute();
    }
}
/* permet de créer un nouveau diagnostic et le mettre dans la base de données*/


