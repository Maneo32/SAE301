<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Scenario</title>

    <link rel="stylesheet" href="../../View/Style/PageProf.css">
    <script src="../../Modele/Fonction/LesFonctionsJS.js"></script>

</head>


<body>  <!--Le haut de la page avec l'image et le titre-->
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
</div>



<h2>Le Scénario</h2>
<button class="button-90" onclick="window.history.back()">Retour</button>
<br><br>
<form action="AfficheRadio.php">
    <button type="submit" class="button-90" >Radio</button>
</form>
<br><br>
