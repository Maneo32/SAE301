<?php
session_start();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>NouveauMDP</title>
        <link rel="stylesheet" href="../../View/Style/SiteIFSI.css">
        <script src="../../Modele/Fonction/LesFonctionsJS.js"></script>
    </head>
    <body>
    <!--Le haut de la page avec l'image et le titre-->

    <header>
        <div class="traduction">
            <form action="NouveauMDP.php" method="post">
                <input type="submit" value="Francais">
            </form>
        </div>
        <a href="AccueilAnglais.php">
            <img src="../../View/image/logoIFSI.png" width=234 height=125 alt="" >
        </a>
        <h1>  Institute of Nursing Training</h1>
        <br><br>
    </header>


    <!--box de milieu-->

    <h3>
        Enter your new password, <br>
        Then go back to login.
    </h3>
    <br>

    <div class ="inscription">

        <form method="post">
            <br>
            <label>New Password :</label>
            <br><br>
            <input type="password" name='mdp' id="mdp" placeholder="Enter your new password" required ><button type="button" onclick="changer('mdp')">O</button>
            <br>
            <br>
            <label>Confirm your password  :</label>
            <br><br>
            <input type="password" name='mdp2' id="mdp2" placeholder="Confirm your password" required><button type="button" onclick="changer('mdp2')">O</button>
            <br>
            <p><input type="submit" value="Validate"></p>
        </form>

    </div>


    <!--Le bas de la page-->

    <footer>
        <form action="LoginAnglais.php" method="post">
            <input type="submit" value="Create an account">
        </form> <br>
        <form action="AccueilAnglais.php" method="post">
            <input type="submit" value="login">
        </form> <br>
        <form action="BesoinAide.php" method="post">
            <input type="submit" value="Need Help ?">
        </form>
    </footer>
    </body>

    </html>
<?php
require("../../Modele/Fonction/ConnectionBDD.php");
require("../../Modele/Fonction/Premier.php");
require("../../Modele/Fonction/email.php");
require("../../Modele/Fonction/MotDePasse.php");
require("../../Modele/Fonction/Connexion.php");

/**
 * @return void
 */
function changemail()
{
    $conn = ConnectionBDD::getInstance();
    $pdo = $conn::getpdo();
    $MDP = new MotDePasse();
    $co = new Connexion();

    if (isset($_POST['mdp']) or isset($_POST['mpd2'])) {
        if ($MDP->password($_POST['mdp'], $_POST['mdp2']))
        {
            $MDP->changement($pdo, $_POST['mdp'], $co);
        }

    }}
changemail();
?>