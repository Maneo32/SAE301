<?php

/**
 *
 */
class Connexion
{
    /* permet de vérifier les données lors de la connection d'un étudiant*/
    /**
     * @param $bdd
     * @param $mail
     * @param $mdp
     * @return bool
     */
    function connexionEtu ($bdd, $mail, $mdp ){


        $sql=$bdd->prepare("Select * From etudiant WHERE email = ? ");
        $sql->BindParam(1,$mail);
        $sql->execute();

        $row = $sql->fetch(PDO::FETCH_ASSOC);
        if(password_verify($mdp, $row['mdp']) and $row['email']==$mail){

            return true;}
        else
            return false;

    }
    /* permet de vérifier les données lors de la connection d'un professeur*/
    /**
     * @param $bdd
     * @param $mail
     * @param $mdp
     * @return bool
     */
    function connexionProf ($bdd, $mail, $mdp ){


        $sql=$bdd->prepare("Select * From prof WHERE email = ? ");
        $sql->BindParam(1,$mail);
        $sql->execute();


        $row = $sql->fetch(PDO::FETCH_ASSOC);
        if(password_verify($mdp, $row['mdp']) and $row['email']==$mail){

            return true;}
        else
            return false;

    }
    /* permet de savoir si la personne est un prof*/
    /**
     * @param $bdd
     * @param $mail
     * @return bool
     */
    function TrouveProf ($bdd, $mail ){


        $sql=$bdd->prepare("Select * From prof WHERE email = ? ");
        $sql->BindParam(1,$mail);
        $sql->execute();

        if($sql->rowCount()>0){

            return true;}
        else
            return false;

    }
    /*permet de savoir si la personne est un etudiant*/
    /**
     * @param $bdd
     * @param $mail
     * @return bool
     */
    function TrouveETu ($bdd, $mail ){

        $sql=$bdd->prepare("Select * From etudiant WHERE email = ? ");
        $sql->BindParam(1,$mail);
        $sql->execute();

        if($sql->rowCount()>0){

            return true;}
        else
            return false;

    }


}

?>