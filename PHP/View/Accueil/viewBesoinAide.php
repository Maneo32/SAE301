
<!DOCTYPE html>
<html lang="en">

<head>
    <title>BesoinD'aide</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../View/Style/chat.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

<div class="font">
    <div class="header">
        <a href="../../Controleur/Accueil/Accueil.php">
            <img src="../../View/image/logoIFSI.png" width=120 height=80 alt="leLogo" >
        </a>
        <h1>Institut de Formation aux Soins Infirmiers (IFSI)</h1>
        <div class="deconnexion">
            <a href="../../Controleur/Accueil/Disconnect.php">
                <img src="../../View/image/Deconnexion.png" class="icone" width="50" height="50" alt="Déconnexion">
            </a>
        </div>
    </div>

    <div class="information">
        <h2>Besoin d'aide</h2>
        <br>
        <h3>Le sujet est : <?php echo $_SESSION['sujet'] ?></h3>
    </div>
    <br>
    <div class="message">
        <form method="POST" >
            <textarea name="message" rows="10" cols="80"></textarea>
            <br>
            <input type="submit" name="valider">

            <button type="submit" name="suppmess">Supprimer</button>
        </form>
    </div>
    <br>

    <form method="post">
    </form>


    <script>
        e=true;
        f=true;

        /*permet d'afficher/faire disparaitre les champs de textes d'inviter et de création de groupe*/
        function afficher(){

            if(e){
                document.getElementById('form').setAttribute('style', 'visibility: visible')
                e=false;
            }
            else {
                document.getElementById('form').setAttribute('style', 'visibility: hidden')
                e=true;
            }

        }

        function afficher2(){
            if(f){
                document.getElementById('nom').setAttribute('style', 'visibility: visible')
                f=false;
            }
            else {
                document.getElementById('nom').setAttribute('style', 'visibility: hidden')
                f=true;
            }

        }
    </script>

    <div class="Btn_Groupe">
        <button type="submit" name="creer" id="creer" onclick="afficher()">Créer groupe</button>
        <form style="visibility: hidden" id="form" method="post">
            <input type="text" placeholder="Sujet du groupe" id="nomgrp" name="sujet">
            <input name="valider" id="valider" type="submit">
        </form>

        <h3>Sujet :</h3>
        <form method="post">
            <?php
            $grps=getGrps();
            while ($grp = $grps->fetch()){
            ?>
            <button type="submit" name="button" value="<?php echo $grp[0]."+".$grp[1]?>"><?php echo $grp[1]?></button>
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
            $('#messages').load('loadAide.php');
        }
    </script>
</div>