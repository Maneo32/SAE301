<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="../../View/Style/SiteIFSI.css">
    <script src="../../Modele/Fonction/LesFonctionsJS.js"></script>

</head>

<body>
<!--Le haut de la page avec l'image et le titre-->

<header>
    <div class="traduction">
        <form action="LoginAnglais.php" method="post">
            <input type="submit" value="English">
        </form>
    </div>
    <a href="Accueil.php">
        <img src="../../View/image/logoIFSI.png" width=234 height=125 alt="" >
    </a>
    <h1> Institut de Formation aux Soins Infirmiers (IFSI)</h1>
    <br><br>
</header>

<!--La fleche pour revenir sur la page accueil-->



<!--La box de l'inscription-->

<h2>INSCRIPTION IFSI</h2>

<div class="inscription">
        <form method="post">
            <label>NOM</label>
            <br>
            <input type="text" name="nom" id="nom" value="<?php echo @$_POST['nom']?>"  required>
            <br>
            <label>PRENOM </label>
            <br>
            <input type="text" name="prenom" id="prenom" value="<?php echo @$_POST['prenom']?>" required>
            <br>
            <label>EMAIL</label>
            <br>
            <input type="email" name="mail" id="mail"  value="<?php echo @$_POST['mail']?>" required>
            <br>
            <label>CODE</label>
            <br>
            <!--le code peut être commun-->
            <input type="text" name="code" id="code" value="<?php echo @$_POST['code']?>"  required>
            <br>
                <div>
                    <p><a href="#" class="MDP">MOT DE PASSE<span>&ensp;- min une majuscule &ensp;<br> &ensp;- min 8 caractères &ensp;<br>&ensp; - min un chiffre &ensp;</span></a>
                </div>
            <label>
                <input type="password" name="mdp" id="mdp" required>
            </label>
            <button type="button" id="pass1" onclick="changer('mdp')">O</button>
            <br>
            <div>
                <p><a href="#" class="MDP">CONFIRMATION<span>&ensp;- min une majuscule &ensp;<br> &ensp;- min 8 caractères &ensp;<br>&ensp; - min un chiffre &ensp;</span></a>
            </div>
            <label>
                <input type="password" name="mdp2" id="mdp2" required>
            </label>
            <button type="button" id="pass2" onclick="changer('mdp2')">O</button>
            <br>

            <input type="submit" value="Valider" >
        </form>
</div>

<br>
<form action="BesoinAide.php" method="post">
    <button class="button-28"  type="submit">Besoin d'aide</button>
</form>

</body>
</html>



<?php

require("../../Modele/Fonction/email.php");
require("../../Modele/Fonction/MotDePasse.php");
require("../../Modele/Fonction/ConnectionBDD.php");
require("../../Modele/Fonction/Connexion.php");
/* permet de créer le nouvel utilisateur(étudiant ou prof) si toutes les données sont valables*/
/**
 * @param $mail
 * @param $mdp
 * @param $mdp2
 * @return void
 */
function bdd($mail, $mdp, $mdp2){
    $sess = new Premier();
    $sess->premier('premier');
    $ClassMail = new email();
    $ClassMDP =new MotDePasse();
    $condition= false;
    @$nom = $_POST['nom'];
    @$prenom = $_POST['prenom'];
    @$code = $_POST['code'];

    if ($_SESSION['premier']==2) {
        {
            if ($ClassMail->email($mail) and $ClassMDP->password($mdp, $mdp2)) {
                try {
                    $conn = ConnectionBDD::getInstance();
                    $pdo = $conn::getpdo();

                } catch (PDOException $e) {
                    die ('Erreur : ' . $e->getMessage());
                }
                $aro = false;
                for ($i=0; $i<strlen($mail);$i++){
                    if ($mail[$i]=='@'){
                        $aro = true;
                    }
                    if (!$aro){
                        if (ord($mail[$i])>64 and ord($mail[$i])<91){
                            $mail[$i] = chr(ord($mail[$i])+32);
                        }
                    }
                }
                $hash = password_hash($mdp, PASSWORD_DEFAULT);
                if ($_POST['code'] == "P5165156516516@") {
                    $sql = "INSERT INTO prof (email,mdp,nom,prenom)
                    VALUES (:mail,:hash,:nom,:prenom)";
                    $condition = true;
                    $req=$pdo->prepare($sql);
                    $req->bindParam('mail',$mail, PDO::PARAM_STR);
                    $req->bindParam('hash',$hash, PDO::PARAM_STR);
                    $req->bindParam('nom',$nom, PDO::PARAM_STR);
                    $req->bindParam('prenom',$prenom, PDO::PARAM_STR);
                    $_SESSION['page'] = true;
                }
                elseif ($_POST['code'] == "E615615651561@") {
                    $sql = "INSERT INTO etudiant (email,mdp,code,nom,prenom)
                            VALUES (:mail,:hash,:code,:nom,:prenom)";
                    $condition = true;
                    $req=$pdo->prepare($sql);
                    $req->bindParam('mail',$mail, PDO::PARAM_STR);
                    $req->bindParam('hash',$hash, PDO::PARAM_STR);
                    $req->bindParam('nom',$nom, PDO::PARAM_STR);
                    $req->bindParam('prenom',$prenom, PDO::PARAM_STR);
                    $req->bindParam('code',$code, PDO::PARAM_STR);
                    $_SESSION['page'] = true;
                                }
                $etu = $pdo->prepare("SELECT * FROM etudiant WHERE email=?");
                $prof = $pdo->prepare("SELECT * FROM prof WHERE email=?");
                $etu->execute(Array($mail));
                $prof->execute(Array($mail));



                if ($etu->fetch() || $prof->fetch()){
                    echo '<script>alert("le compte a déjà été crée.")</script>';
                }

                else {
                    echo '<script>alert("Le code n\'est pas valide.")</script>';


                                }

                if ($condition) {
                    try {
                        $req->execute();
                        $req->setFetchMode(PDO::FETCH_ASSOC);

                        $add = $pdo->prepare("INSERT INTO email values (?)");
                        $add->execute(array($mail));
                    }
                    catch (PDOException $e) {
                                        die ($e->getMessage());
                    }
                }
                header('Location: Accueil.php');



            }

}}}
@bdd($_POST['mail'],$_POST['mdp'],$_POST['mdp2']);

?>