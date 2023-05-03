
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>AccueilAnglais</title>
  <link rel="stylesheet" href="../../View/Style/SiteIFSI.css" >
  <script src="../../Modele/Fonction/LesFonctionsJS.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>


</head>
<body>
<br><br>
<!--Le haut de la page avec l'image et le titre-->
<header>
  <div class="traduction">
      <input type="submit" value="Francais" name="langue" onclick="changerLangue()">
  </div>
  <a href="AccueilAnglais.php">
    <img src="../../View/image/logoIFSI.png" width=234 height=125 alt="" >
  </a>
  <h1> Institute of Nursing Training </h1>
  <br><br>
</header>
<!--Cette classe est le formulaire de connexion au centre de la page-->
<div class="Connexion">
  <h3>Enter your login and password</h3> <br>
  <form method="post">
    <input  type="email" name="id" id="id" placeholder="login" required><br><br>
    <input type="password" name="mdp" id="mdp" placeholder="password"><button type="button" onclick="changer('mdp')">O</button><br><br>
    <input type="submit" value="submit">
  </form>
</div>
<!--Lien en dessous de la box connexion-->

<div class="href">
  <br><br><br>
  <a class="button-28" href="../../Controleur/Accueil/LoginAnglais.php">create an account</a><br><br>
  <a class="button-28" href="../../Controleur/Accueil/MotDePasseOublieAnglais.php">forgot password</a><br><br>
  <a class="button-28" href="../../Controleur/Accueil/BesoinAide.php">need help</a>
</div>
<!--Le bas de l'image avec le carré rouge-->
<footer>
  <div class="securite">
    For security reasons, please log out and close your browser when you are finished accessing authenticated services.
    <br>
    Your identifiers are strictly confidential and must under no circumstances be transmitted to a third party.
  </div>
</footer>
</body>
</html>
