<?php
session_start();
require("../../Modele/BDD/ConnectionBDD.php");
$conn= ConnectionBDD::getInstance();
$bdd=$conn::getpdo();
?>
<?php
/* View Chat*/
include("../../View/Accueil/chat.php");

require("../../Modele/Accueil/ChatModele.php");

envoyerMess($bdd);

if (isset($_POST['button'])){
    $but = $_POST['button'];
    $t = false;
    $a="";
    $b="";
    for ($i=0; $i<strlen($but);$i++){
        if ($but[$i]=='+'){
            $t = true;
        }
        elseif (!$t){
            $a = $a.$but[$i];
        }
        elseif($t){
            $b = $b.$but[$i];
        }
    }
    $_SESSION['IdChat']=$a;
    $_SESSION['sujet']=$b;
    header('Location: chat.php');
}

/*permet de rediriger sur la bonne page, si la personne qui clique est un étudiant ou un professeur*/
if(isset($_POST['verif'])) {
    if (isset($_SESSION['fonction'])) {
        if ($_SESSION['fonction'] == 'etu') {
            header('Location:../../View/Etudiant/PageEtu.php');
        } elseif ($_SESSION['fonction'] == 'prof') {
            header('Location:../../View/Prof/PageProf.php');
        }
    }
}

inviter($bdd);
creergrp($bdd);
loadChat();
?>
<a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
    Gérer les groupes
</a>
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="grp">Gestion des groupes</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <?php
        affichergrp($bdd);
        afficheruser($bdd);
        supprimer($bdd);
        admin($bdd);
        suppmess($bdd);
        ?>
    </div>
</div>
<?php


include("../../View/Accueil/BesoinAideButton.html");

?>



