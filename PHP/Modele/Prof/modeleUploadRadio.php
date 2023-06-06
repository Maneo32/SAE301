<?php

function uploadimg($bdd)
{


    $uploaddirname= $_FILES['userfile']['name'];
    $uploaddir = "C:/Users/coren/PhpstormProjects/SAE301/PHP/imgRadio/";
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

    echo '<pre>';
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        $insertImg= $bdd->prepare('INSERT INTO radio(name, idpatient) VALUES(?,?)');
        $insertImg->execute(array($uploaddirname,$_SESSION['patient']));
        echo "File is valid, and was successfully uploaded.\n";
    } else {
        echo "Possible file upload attack!\n";
    }

    echo 'Here is some more debugging info:';
    print_r($_FILES);

    print "</pre>";
}

?>