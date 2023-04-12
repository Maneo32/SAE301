<?php
session_start();
$id = $_SESSION['scenario'];

// Connexion à la base de données
include('../../Modele/Fonction/ConnectionBDD.php');
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();


// Fonction pour afficher les images radio
function afficherImagesRadio($bdd, $idpatient)
{
    // Préparation de la requête
    $requete = $bdd->prepare("SELECT * FROM radio WHERE idpatient = ?");
    $requete->execute(array($idpatient));

    // Vérification si des images ont été trouvées
    if ($requete->rowCount() == 0) {
        echo "Aucune image trouvée";
        return;
    }

    // Affichage des images
    while ($resultat = $requete->fetch(PDO::FETCH_ASSOC)) {
        echo "Image Radio<br>";
        $imgData = base64_encode($resultat['content']);
        $src = 'data:'.$resultat['type'].';base64,'.$imgData;
        echo "<img src='$src'>";
    }
}

// Utilisation de la fonction afficherImagesRadio
afficherImagesRadio($bdd, 63);
?>

