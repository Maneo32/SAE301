<?php

/* permet de créer un nouveau patient*/

/**
 * @param $nom
 * @param $prenom
 * @param $age
 * @param $ddn
 * @param $poids
 * @param $taille
 * @param $iep
 * @param $ipp
 * @param $sexe
 * @param $adresse
 * @param $ville
 * @param $cp
 * @param $email
 * @return void
 */
function creerPatient($nom, $prenom, $age, $ddn, $poids, $taille, $iep, $ipp, $sexe, $adresse, $ville, $cp, $email,$bdd)
{

        $sql = $bdd->prepare("INSERT INTO patient(nom, prenom, age, ddn, poids, taille, iep, ipp, sexe, adresse, ville, codepostal, emailprof) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->execute(array($nom,$prenom,$age,$ddn,$poids,$taille,$iep,$ipp,$sexe,$adresse,$ville,$cp,$email));



}


