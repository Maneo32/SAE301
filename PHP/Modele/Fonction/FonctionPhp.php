<?php

// Obtient une instance de la connexion à la base de données
$pdo = ConnectionBDD::getInstance();

// Obtient l'objet PDO utilisé pour interagir avec la base de données
$bdd = $pdo::getpdo();

/**
 * Retourne l'ID de la dernière ligne insérée dans la table 'donnee'
 * @param PDO $bdd L'objet PDO utilisé pour interagir avec la base de données
 * @return mixed L'ID de la dernière ligne insérée
 */
function PourConnaitreLeIdDeLaDonnee($bdd){
    // Prépare une instruction SELECT pour obtenir la valeur maximale de la colonne 'iddonnee' dans la table 'donnee'
    $sql=$bdd->prepare("Select max(iddonnee) from donnee ");
    $sql->execute();
    // Récupère le résultat sous forme de tableau
    $array = $sql->fetch();
    return $array[0];
}

/**
 * @param PDO $bdd L'objet PDO utilisé pour interagir avec la base de données
 * @param string $categorie Le nom de la catégorie à insérer
 * @param string $column Le nom de la colonne à insérer
 * @return void
 */
function ajoutDeDonneeAvecLesBooleans($bdd, $categorie, $column){
    // Définit des variables pour représenter des valeurs booléennes
    $varOui = "x";
    $varNon= " ";

    // Prépare une instruction INSERT pour insérer une ligne dans la table 'donnee'
    $sql=$bdd->prepare("Insert into donnee (date, nom, donnee,idpatient) VALUES (?,?,?,?)");

    // Lie les valeurs aux paramètres de l'instruction INSERT
    $sql->bindParam(1,$_SESSION['Date']);
    $sql->bindParam(2, $column);
    if ($_POST[$column]=="oui") {
        $sql->bindParam(3,$varOui );
    } else {
        $sql->bindParam(3,$varNon );
    }
    $sql->bindParam(4,$_SESSION['patient']);
    $sql->execute();
    $id=PourConnaitreLeIdDeLaDonnee($bdd);
    $sql=$bdd->prepare("Insert into categoriedonnee (nom, iddonnee) VALUES (?,?)");
    $sql->bindParam(1,$categorie);
    $sql->bindParam(2,$id);
    $sql->execute();
}

/**
 * @param $bdd
 * @param $categorie
 * @param $column
 * @param $donnee
 * @return void
 */
function ajoutDeDonneeSansLesBooleans($bdd, $categorie, $column, $donnee){


    $sql=$bdd->prepare("Insert into donnee (date, nom, donnee,idpatient) VALUES (?,?,?,?)");
    $sql->bindParam(1,$_SESSION['Date']);
    $sql->bindParam(2, $column);
    $sql->bindParam(3,$donnee);
    $sql->bindParam(4,$_SESSION['patient']);
    $sql->execute();
    $id=PourConnaitreLeIdDeLaDonnee($bdd);
    $sql=$bdd->prepare("Insert into categoriedonnee (nom, iddonnee) VALUES (?,?)");
    $sql->bindParam(1,$categorie);
    $sql->bindParam(2,$id);
    $sql->execute();
}






