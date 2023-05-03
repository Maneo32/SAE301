
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Accueil</title>
  <link rel="stylesheet" href="../../View/Style/SiteIFSI.css" >
  <script src="../../Modele/Fonction/LesFonctionsJS.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>


</head>
<body>
<br><br>
<!--Le haut de la page avec l'image et le titre-->
<header>
  <div class="traduction">
          <input type="submit" value="English" name="langue" onclick="changerLangue()" >
      </form>
  </div>
  <a href="Accueil.php">
    <img src="../../View/image/logoIFSI.png" width=234 height=125 alt="" >
  </a>
  <h1> Institut de Formation aux Soins Infirmiers (IFSI)</h1>
  <br><br>
</header>
<!--Cette classe est le formulaire de connexion au centre de la page-->
<div class="Connexion">
  <h3>Entrez votre identifiant et votre mot de passe</h3> <br>
  <form method="post">
    <input type="email" name="id" id="id" placeholder="Identifiant" required><br><br>
    <input type="password" name="mdp" id="mdp" placeholder="Mot de passe"><button type="button" class="button-29" onclick="changer('mdp')">O</button><br><br>
    <input type="submit" value="Confirmer">
  </form>
</div>
<!--Lien en dessous de la box connexion-->

<div class="href">
  <br><br><br>
  <a class="button-28" href="../../Controleur/Accueil/Login.php">Créer un compte</a><br><br>
  <a class="button-28"href="../../Controleur/Accueil/MotDePasseOublie.php">Mot de passe oublié</a><br><br>
  <a class="button-28" href="BesoinAide.php">Besoin d'aide</a><br><br>
</div>
<!--Le bas de l'image avec le carré rouge-->
<div class="securite">
  Pour des raisons de sécurité, veuillez vous déconnecter et fermer votre navigateur lorsque vous avez fini d'accéder aux services authentifiés.
  <br>
  Vos identifiants sont strictement confidentiels et ne doivent en aucun cas être transmis à une tierce personne.
</div>
</body>
</html>