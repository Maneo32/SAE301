<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AccueilAnglais</title>
    <link rel="stylesheet" href="../../View/Style/SiteIFSI2.css?v=<?php echo time(); ?>" >
    <script src="../../Modele/Fonction/LesFonctionsJS.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>

<body>
<!--Boutton traduction et logo-->
<header>
    <form>
        <input class="boutton trad" type="submit" value="Français" name="langue" onclick="changerLangue()">
    </form>
    <a href="Accueil.php">
        <img src="../../View/image/logoIFSI.png" width=468 height=250 alt="">
    </a>
    <h1>Institute of Nursing Training</h1>
</header>

<div class="contenu">
    <!--Formulaire de connexion-->
    <div class="item">
        <h2>Connexion</h2>
        <h3>Enter your login and password</h3>
        <form method="post">
            <label for="id">
                <input type="email" name="id" id="id" placeholder="Login" required>
            </label>
            <label for="id">
                <input type="password" name="mdp" id="mdp" placeholder="Password">
                <button class="boutton autre" type="button" onclick="changer('mdp')">O</button>
            </label>
            <input class="boutton submit" type="submit" value="Confirmer">
        </form>
    </div>

    <!--Liens vers d'autres pages-->
    <div class="item liens">
        <a class="lien" href="../../Controleur/Accueil/CreateAccount.php">Create an account</a>
        <a class="lien" href="../../Controleur/Accueil/MotDePasseOublie.php">Forgot password</a>
        <a class="lien" href="../../Controleur/Accueil/BesoinAide.php">Need help</a>
    </div>
</div>

<!--Le bas de l'image avec le carré rouge-->
<footer>
    <div class="securite">
        For security reasons, please log out and close your browser when you are finished accessing authenticated services. Your identifiers are strictly confidential and must under no circumstances be transmitted to a third party.
    </div>
</footer>
</body>
</html>