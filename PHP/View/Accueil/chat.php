
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Messagerie</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../View/Style/chat.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
    <!--Retour-->

    <div class="btn-nav">

        <div class="btn-group">
            <form method="post" class="btn-group">
                <button type="button" class="btn btn-light btn-lg" type="submit" onclick="history.back()" name="verif" ><span class="text">Retour</span></button>

            </form>

        </div>
        <br>            <br>

    </div>
    <!--Zone d'envoie et suppression de message-->
    <br>

    <div class="information">
        <h2><?php echo $_SESSION['PseudoChat']?></h2>
        <br>
        <h3>Communication avec groupe <?php echo $_SESSION['IdChat'] ?></h3>
        <h3>Le sujet est : <?php echo $_SESSION['sujet'] ?></h3>
    </div>
    <br>
    <div class="message">
        <form method="POST" >
            <textarea name="message" rows="10" cols="80"></textarea>
            <br>
            <button class="button-90" type="submit" name="valider">Envoyer</button>
            <button class="button-90" type="submit" name="suppmess">Supprimer</button>

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

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>