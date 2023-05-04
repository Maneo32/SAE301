
<?php

function envoyerMess($bdd)
{
    $pseudo = $_SESSION['username'];
    $pseudo2 = $pseudo[0];
    $pseudo2 .= " ";
    $pseudo2 .= $pseudo[1];
    $_SESSION['PseudoChat'] = $pseudo2;
    /* ce if sert a permettre d'envoyer des messages*/
    if (isset($_POST['message'])) {
        $message = nl2br(htmlspecialchars($_POST['message']));
        $pseudo = $_SESSION['Pseudo'];
        $insertMsg = $bdd->prepare('INSERT INTO message(userx,textmessage, idgroupe, email) VALUES(?, ?, ?, ?)');
        $insertMsg->execute(array($pseudo2, $message, $_SESSION['IdChat'], $pseudo));
        header('Location: chat.php');
    }
}
/*cette fonction permet de créer dans la base de donnée un nouveau groupe et de mettre le créateur admin*/
/**
 * @param $bdd
 * @return void
 */
function creergrp($bdd)
{
    if (isset($_POST['nomgrp']) && $_POST['nomgrp']){
        $creer = $bdd->prepare("INSERT INTO groupe(nomgroupe, email, admin, sujet) values (?, ?, ?, ?)");
        $creer->execute(array($_POST['nomgrp'], $_SESSION['Pseudo'], true, $_POST['sujet']));
        $newid = $bdd->query("SELECT idgroupe from groupe order by idgroupe desc ");
        $newgrp = $newid->fetch()[0];
        $_SESSION['IdChat']=$newgrp;
        header('Location: chat.php');
    }}
/*cette fonction permet d'ajouter une personne dans le groupe ou nous sommes*/
/**
 * @param $bdd
 * @return void
 */
function inviter($bdd){
    if (isset($_POST['nom'])&&$_POST['nom']){
        $getnom = $bdd->prepare("SELECT nomgroupe from groupe where idgroupe=?");
        $getnom->execute(array($_SESSION['IdChat']));
        $ajouter = $bdd->prepare("INSERT INTO groupe(idgroupe,nomgroupe, email, admin) values (?, ?, ?, ?)");
        $noms = $getnom->fetch()[0];
        $ajouter->execute(array($_SESSION['IdChat'], $noms, $_POST['nom'], 'false'));
        echo "l'utilisateur a été ajouté";
    }
}

/* cette fonction permet d'afficher les différents groupes sous forme de boutons, ce qui nous permet de changer de groupes*/
/**
 * @param $bdd
 * @return void
 */
function affichergrp($bdd){
    $grps = $bdd->prepare("SELECT * from groupe where email=?");
    $grps->execute(array($_SESSION['Pseudo']));
    ?>
    <!--Zone groupe-->

    <div class="Btn_Groupe">
        <button class="button-90" type="submit" name="creer" id="creer" onclick="afficher()">Créer groupe</button>
        <form style="visibility: hidden" id="form" method="post">

            <input type="text" placeholder="Nom du groupe" id="nomgrp" name="nomgrp">
            <input type="text" placeholder="Sujet du groupe" id="nomgrp" name="sujet">
            <input name="valider" id="valider" type="submit">
        </form>
        <br>
        <button class="button-90" role="button" type="submit" name="inviter" id="inviter" onclick="afficher2()">Inviter</button>
        <form style="visibility: hidden" id="invit" method="post">
            <input type="text" placeholder="email" id="nom" name="nom">
        </form>
        <h3>Groupe :</h3>
        <form method="post">
            <?php
            while ($grp = $grps->fetch()){
                ?>
                <button type="submit" name="button" value="<?php echo $grp[0]."+".$grp[4]?>"><?php echo $grp[1]?></button>
                <?php
                echo '<br>';
                echo '<br>';
            }?>
        </form>
    </div>

    <section id="messages"></section>
    <script>
        setInterval('load_messages()',500);
        function load_messages(){
            $('#messages').load('loadChat.php');
        }
    </script>
    <?php
}
/*nous permet d'afficher les différents utilisateurs présents dans le groupe, et de les modifiers/supprimer si nous avons le droit*/
/**
 * @param $bdd
 * @return void
 */
function afficheruser($bdd){
$users = $bdd->prepare("SELECT * FROM groupe where idgroupe=? and email!=?");
$users->execute(array($_SESSION['IdChat'], $_SESSION['Pseudo']));
$admin = $bdd->prepare("SELECT admin FROM groupe where email=?");
$admin = $admin->execute(array($_SESSION['Pseudo']));
while ($user = $users->fetch()){?>
<form method="post">
    <?php echo $user[2] ;
    if ($admin==1)?>
    <button type="submit" name="supprimer" value="<?php echo $user[2]?>">X</button>
    <?php if($user[3]==0){?>
        <button type="submit" name="admin" value="<?php echo $user[2]?>">admin</button>
    <?php  }  ?>
</form>

    <?php

}
}




/*permet de supprimer l'utilisateur du groupe lorsqu'on appuie sur le bouton*/

/**
 * @param $bdd
 * @return void
 */
function supprimer($bdd){
    if (isset($_POST['supprimer'])) {
        $admin = $bdd->prepare("SELECT admin FROM groupe where email=?");
        $admin = $admin->execute(array($_SESSION['Pseudo']));
        if ($admin== 1) {
            $supp = $bdd->prepare("DELETE FROM groupe where email=? and idgroupe=?");
            $supp->execute(array($_POST['supprimer'], $_SESSION['IdChat']));
        }
    }
}

/*permet de passer admin l'utilisateur lorsqu'on appuie sur le bouton*/
/**
 * @param $bdd
 * @return void
 */
function admin($bdd){
    if (isset($_POST['admin'])){
        $admin = $bdd->prepare("SELECT admin FROM groupe where email=?");
        $admin = $admin->execute(array($_SESSION['Pseudo']));
        if ($admin == 1) {
            $admin = $bdd->prepare("UPDATE groupe SET admin ='true' where email=? and idgroupe=?");
            $admin->execute(array($_POST['admin'], $_SESSION['IdChat']));
        }
    }
}

/*permet de supprimer toute la conversation*/

/**
 * @param $bdd
 * @return void
 */
function suppmess($bdd){
    if (isset($_POST['suppmess'])){
        $admin = $bdd->prepare("SELECT admin FROM groupe where email=?");
        $admin = $admin->execute(array($_SESSION['Pseudo']));
        if ($admin == 1) {
            $supp =$bdd->prepare("DELETE FROM message where idgroupe=?");
            $supp->execute(array($_SESSION['IdChat']));
        }
    }
}
?>



