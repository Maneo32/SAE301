<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../../View/Style/SiteIFSI2.css?v=<?php echo time();?>">
    <script src="../../Modele/Fonction/LesFonctionsJS.js"></script>
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
    <div class="item">
        <h1>Inscription</h1>
        <div class="inscription">
            <form method="post">
                <label for="nom">
                    <input type="text" name="nom" id="nom" placeholder="Nom" value="<?php echo @$_POST['nom']?>" required>
                </label>
                <label for="prenom">
                    <input type="text" name="prenom" id="prenom" placeholder="Prénom" value="<?php echo @$_POST['prenom']?>" required>
                </label>
                <label for="mail">
                    <input type="email" name="mail" id="mail" placeholder="Adresse mail" value="<?php echo @$_POST['mail']?>" required>
                </label>
                <label for="code">
                    <input type="text" name="code" id="code" placeholder="Code" value="<?php echo @$_POST['code']?>" required>
                </label>
                <div>
                    <p><a href="#" class="MDP">MOT DE PASSE<span>&ensp;- min une majuscule &ensp;<br> &ensp;- min 8 caractères &ensp;<br>&ensp; - min un chiffre &ensp;</span></a>
                </div>
                <label>
                    <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" required>
                    <button class="boutton autre" type="button" id="pass1" onclick="changer('mdp')">O</button>
                </label>
                <div>
                    <p><a href="#" class="MDP">CONFIRMATION<span>&ensp;- min une majuscule &ensp;<br> &ensp;- min 8 caractères &ensp;<br>&ensp; - min un chiffre &ensp;</span></a>
                </div>
                <label>
                    <input type="password" name="mdp2" id="mdp2" placeholder="Confirmation" required>
                    <button class="boutton autre" type="button" id="pass2" onclick="changer('mdp2')">O</button>
                </label>
                <input class="boutton submit" type="submit" value="Valider">
            </form>
        </div>
    </div>
    <div class="item liens">
        <a class="lien" href="../../Controleur/Accueil/Accueil.php">Se connecter</a>
        <a class="lien" href="../../Controleur/Accueil/MotDePasseOublie.php">Mot de passe oublié</a>
        <a class="lien" href="../../Controleur/Accueil/BesoinAide.php">Besoin d'aide</a>
    </div>
</div>
</body>
</html>