<?php
function affpatient($bdd, $id)
{
    $sql = $bdd->prepare("SELECT * from patient where idpatient=?");
    $sql->execute(array($id));
    $array = $sql->fetch();
    return $array;

}


/**
 * Cette fonction permet toutes les modifications des données de la matrice
 * @param $bdd
 * @param $id
 * @return void
 */
function modifdonnees($bdd, $id){
    $datespres = PourAvoirToutesLesDatesDeLaPresc($bdd,$id);
    $datesdiag = PourAvoirToutesLesDatesDeLaDiag($id);
    $data = $_SESSION['coo'];
    if ($data != "") {
        $tout = $bdd->prepare("update donnee set donnee = :donnees where idpatient=:idp and nom=:nom and date=:date");
        $nom = $bdd->prepare("update patient set nom = :donnees where idpatient=:idp");
        $prenom = $bdd->prepare("update patient set prenom = :donnees where idpatient=:idp");
        $age = $bdd->prepare("update patient set age = :donnees where idpatient=:idp");
        $ddn = $bdd->prepare("update patient set ddn = :donnees where idpatient=:idp");
        $poids = $bdd->prepare("update patient set poids = :donnees where idpatient=:idp");
        $taille = $bdd->prepare("update patient set taille = :donnees where idpatient=:idp");
        $iep = $bdd->prepare("update patient set iep = :donnees where idpatient=:idp");
        $ipp = $bdd->prepare("update patient set ipp = :donnees where idpatient=:idp");
        $sexe = $bdd->prepare("update patient set sexe = :donnees where idpatient=:idp");
        $adresse = $bdd->prepare("update patient set adresse = :donnees where idpatient=:idp");
        $ville = $bdd->prepare("update patient set ville = :donnees where idpatient=:idp");
        $cp = $bdd->prepare("update patient set codepostal = :donnees where idpatient=:idp");
        $medic = $bdd->prepare("update prescription set medicament = :donnees where idpatient=:idp and prise = :prise");
        $medecin = $bdd->prepare("update prescription set medecin = :donnees where idpatient=:idp and prise = :prise");
        $nomme = $bdd->prepare("update diagnostic set nom = :donnees where idpatient=:idp and date = :prise");
        $prenomme = $bdd->prepare("update diagnostic set prenom = :donnees where idpatient=:idp and date = :prise");
        $cpt = $bdd->prepare("update diagnostic set compterendu = :donnees where idpatient=:idp and date = :prise");
        $dose = $bdd->prepare("update prescription set dose=:donnees where idpatient=:idp and prise=:prise");
        $presc = array($medic, $medecin, $dose);
        $diag = array($nomme, $prenomme, $cpt);
        $sql = array($nom, $prenom, $age, $ddn, $poids, $taille, $iep, $ipp, $sexe, $adresse, $ville, $cp);
        $mots = [$mot, $num] = explode('!', $data);
        if ($mots[1] != null) {
            if ($mots[2] < 12) {
                $actio = $sql[$mots[2]];
                $actio->bindParam(':donnees', $mots[1]);
                $actio->bindParam(':idp', $id);
                $actio->execute();
                $_SESSION['coo'] = "";
            } elseif ($mots[2] < 12 + sizeof($datespres)) {
                $action = $presc[0];
                $date = $datespres[$mots[2] - 12];
            } elseif ($mots[2] < 12 + 2 * sizeof($datespres)) {
                $action = $presc[1];
                $date = $datespres[$mots[2] - 12 - sizeof($datespres)];
            } elseif ($mots[2] < 12 + 3 * sizeof($datespres)) {
                $action = $presc[2];
                $date = $datespres[$mots[2] - 12 - 2 * sizeof($datespres)];
            } elseif ($mots[2] < 12 + 3 * sizeof($datespres) + sizeof($datesdiag)) {
                $action = $diag[0];
                $date = $datesdiag[$mots[2] - 12 - 3 * sizeof($datespres)];
            } elseif ($mots[2] < 12 + (3 * sizeof($datespres)) + (2 * sizeof($datesdiag))) {
                $action = $diag[1];
                $date = $datesdiag[$mots[2] - 12 - 3 * sizeof($datespres) - sizeof($datesdiag)];
            } elseif ($mots[2] < 12 + (3 * sizeof($datespres)) + (3 * sizeof($datesdiag))) {
                $action = $diag[2];
                $date = $datesdiag[$mots[2] - 12 - 3 * sizeof($datespres) - (2 * sizeof($datesdiag))];
            } elseif (isset($mots[2])) {
                $sql = $tout;
                $sql->bindParam(':donnees', $mots[1]);
                $sql->bindParam(':idp', $id);
                $sql->bindParam(':nom', $_SESSION['do']);
                $sql->bindParam(':date', $_SESSION['date']);
                $sql->execute();
                $_SESSION['do'] = "";
                $_SESSION['date'] = "";
            }
            if (isset($action)) {
                $action->bindParam(':donnees', $mots[1]);
                $action->bindParam(':idp', $id);
                $action->bindParam(':prise', $date[0]);
                $action->execute();
                $_SESSION['coo'] = "";
            }
        }
    }
}


/**
 * @param $bdd
 * @param $id
 * @return mixed
 *  * Cette fonction permet de récupérer les dates des prescriptions afin de les afficher dans le tableau

 */
function PourAvoirToutesLesDatesDeLaPresc($bdd, $id){
    $sql = $bdd->prepare("SELECT prise FROM prescription where idpatient=? order by prise");
    $sql->execute(array($id));
    $array = $sql->fetchAll();
    return $array;
}


/**
 * @param $bdd
 * @param $id
 * @return mixed
 *  * Cette fonction permet l'affichage des données de la table prescription, ce qui va nous permettre de les afficher dans un tableau

 */
function affpresc($bdd, $id)
{
    $sql = $bdd->prepare("SELECT * from prescription where idpatient=? order by prise");
    $sql->execute(array($id));
    $array = $sql->fetchAll();
    return $array;

}

/**
 * @param $bdd
 * @param $id
 * @return mixed
 * Cette fonction permet de récupérer les dates des diagnostics afin de les afficher dans le tableau
 */
function PourAvoirToutesLesDatesDeLaDiag($id){
    global $bdd;
    $sql = $bdd->prepare("SELECT date FROM diagnostic where idpatient=? order by date");
    $sql->execute(array($id));
    $array = $sql->fetchAll();
    return $array;
}

/**
 * @param $bdd
 * @return mixed
 */
function AvoirLesDonneeDunPatient (){
    global $bdd;
    $sql=$bdd->prepare("Select c.nom, donnee.nom as type, donnee.donnee, date from donnee join categoriedonnee c on donnee.iddonnee = c.iddonnee join patient p on donnee.idpatient = p.idpatient join categorie c2 on c.nom = c2.nom 
        where p.idpatient=? order by (c.nom,donnee.nom,date)");
    $sql->bindParam(1,$_SESSION['scenario']);
    $sql->execute();
    $array = $sql->fetchAll();
    return $array;


}

/**
 * @param $bdd
 * @param $nomCategorie
 * @return int
 */
function AvoirLeNombreDunType ($bdd, $nomCategorie){
    $sql=$bdd->prepare("Select c.nom from donnee join categoriedonnee c on donnee.iddonnee = c.iddonnee join patient p on donnee.idpatient = p.idpatient join categorie c2 on c.nom = c2.nom 
        where p.idpatient=? and c.nom=? ");
    $sql->bindParam(1,$_SESSION['scenario']);
    $sql->bindParam(2,$nomCategorie);
    $sql->execute();
    $array = $sql->fetchAll();
    return count($array);


}

/**
 * @param $bdd
 * @param $nomCategorie
 * @param $nomtype
 * @return int
 */
function AvoirLeNombreDeColoneDunType ($nomCategorie, $nomtype){
    global $bdd;
    $sql=$bdd->prepare("Select donnee.nom from donnee join categoriedonnee c on donnee.iddonnee = c.iddonnee join patient p on donnee.idpatient = p.idpatient join categorie c2 on c.nom = c2.nom 
        where p.idpatient=? and c.nom=? and donnee.nom=?");
    $sql->bindParam(1,$_SESSION['scenario']);
    $sql->bindParam(2,$nomCategorie);
    $sql->bindParam(3,$nomtype);
    $sql->execute();
    $array = $sql->fetchAll();
    return count($array);


}

/**
 * @param $bdd
 * @param $id
 * @return mixed
 * Cette fonction permet l'affichage des données de la table diagnostic, ce qui va nous permettre de les afficher dans un tableau
 */
function affDiag($bdd, $id)
{
    $sql = $bdd->prepare("SELECT * FROM diagnostic where idpatient=? order by date");
    $sql->execute(array($id));
    $array = $sql->fetchAll();
    return $array;
}



