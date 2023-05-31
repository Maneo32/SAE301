
<!DOCTYPE html>
<html lang="en">

<head>
    <title>BesoinD'aide</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="grp">Gestion des groupes</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
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
    </div>

    <section id="messages"></section>
    <script>
        setInterval('load_messages()',500);
        function load_messages(){
            $('#messages').load('loadAide.php');
        }
    </script>

    <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
        Gérer les groupes
    </a>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
