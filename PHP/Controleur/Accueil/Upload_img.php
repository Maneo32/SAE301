<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Upload Image</title>
</head>
<body>
<form enctype="multipart/form-data" method="POST">
    <!-- Ce champ caché sert a ne pas faire attendre l'utilisateur même si il upload un fichier trop gros pour php -->
    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
    Send this file: <input name="userfile" type="file" />
    <input type="submit" value="Send File" />
</form>
</body>

</html>

<?php
require("../../Modele/Fonction/ConnectionBDD.php");
$conn=ConnectionBDD::getInstance();
$bdd= $conn::getpdo();

function uploadimg($bdd)
{

    $uploaddirname= $_FILES['userfile']['name'];
    $uploaddir = "C:/Apache24/htdocs/";
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

    echo '<pre>';
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        $insertImg= $bdd->prepare('INSERT INTO radio(image, idpatient) VALUES(?,?)');
        $insertImg->execute(array($uploaddirname,1));
        echo "File is valid, and was successfully uploaded.\n";
    } else {
        echo "Possible file upload attack!\n";
    }

    echo 'Here is some more debugging info:';
    print_r($_FILES);

    print "</pre>";
}
if(isset($_FILES['userfile'])){
    uploadimg($bdd);
}

?>

