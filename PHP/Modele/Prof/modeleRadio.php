<?php

function afficheImages($bdd){
    $sql = $bdd->prepare("SELECT name from radio where idpatient=?");
    $sql->execute(array($_SESSION['patient']));
    $num= 0;
    while($array = $sql->fetch()){
        $image= "../../imgRadio/" . $array[0];
        $num+=1;
        echo "Radio $num <br>";
        echo '<img src=" ' . $image . ' " alt=" ' . $num . ' " class="img-fluid" alt="Responsive Image"/> . <br>';
    }
}
?>