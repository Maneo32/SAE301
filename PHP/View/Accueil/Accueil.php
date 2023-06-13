<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="../../View/Style/SiteIFSI2.css?v=<?php echo time(); ?>">
    <script src="../../Modele/Fonction/LesFonctionsJS.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>

<body>
<!--Boutton traduction et logo-->
<header>
    <form>
        <input class="boutton trad" type="submit" value="English" name="langue" onclick="changerLangue()">
    </form>
    <a href="Accueil.php">
        <img src="../../View/image/logoIFSI.png" width=468 height=250 alt="">
    </a>
    <h1>Institut de Formation aux Soins Infirmiers (IFSI)</h1>
</header>

<div class="contenu">
    <!--Formulaire de connexion-->
    <div class="item">
        <h2>Connexion</h2>
        <h3>Entrez votre identifiant et votre mot de passe</h3>
        <form method="post">
            <label for="id">
                <input type="email" name="id" id="id" placeholder="Identifiant" required>
            </label>
            <label for="id">
                <input type="password" name="mdp" id="mdp" placeholder="Mot de passe">
                <button class="boutton autre" type="button" onclick="changer('mdp')">O</button>
            </label>
            <input class="boutton submit" type="submit" value="Confirmer">
        </form>
    </div>

    <!--Liens vers d'autres pages-->
    <div class="item liens">
        <a class="lien" href="../../Controleur/Accueil/CreateAccount.php">Créer un compte</a>
        <a class="lien" href="../../Controleur/Accueil/MotDePasseOublie.php">Mot de passe oublié</a>
        <a class="lien" href="../../Controleur/Accueil/BesoinAide.php">Besoin d'aide</a>
    </div>
</div>

<!--Message sécurité-->
<footer>
    <p>
        Pour des raisons de sécurité, veuillez vous déconnecter et fermer votre navigateur lorsque vous avez fini d'accéder aux services authentifiés.
        Vos identifiants sont strictement confidentiels et ne doivent en aucun cas être transmis à une tierce personne.
    </p>
</footer>
</body>
</html>