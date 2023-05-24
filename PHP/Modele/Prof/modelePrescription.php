<?php


function insertMedic($bdd,$prise,$cp,$nomMedic,$nom){

        $sql = $bdd->prepare("INSERT INTO prescription(prise, dose, medicament, idpatient, medecin ) values (?, ?, ?, ?, ?)");
        $sql ->bindParam(1, $prise);
        $sql ->bindParam(2, $cp);
        $sql ->bindParam(3, $nomMedic);
        $sql ->bindParam(4, $_SESSION['patient']);
        $sql ->bindParam(5, $nom);

        $sql ->execute();

}
/* permet de créer un nouveau médicament et le mettre dans la base de données*/

?>