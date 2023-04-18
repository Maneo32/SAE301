<!DOCTYPE html>
<html lang="en">
<head>
  <meta title="BarreScenarioAccueil" charset="UTF-8">


</head>
<body>
<?php
require('../../Controleur/ScenarioProf/checkSession.php');
?>
<header>
    <a href="../../Controleur/Accueil/Accueil.php">
      <img src="../../View/image/logoIFSI.png" width=234 height=125 alt="leLogo" >
    </a>
    <h1> Institut de Formation aux Soins Infirmiers (IFSI)</h1>
    <br>
</header>

<div class="font">
  <div class="deconexilion">
    <a href="../../Controleur/Accueil/Disconnect.php"> <img src="../../View/image/Deconnexion.png" class="icone" width=50 height=50 alt="leRetour" > </a>
  </div>
    <button class="button-57" onclick="document.location='PageProf.php'"><span class="text">Accueil</span><span>Accueil</span></button>
    <button class="button-57" onclick="document.location='../ScenarioProf/CreateScenario.php'"><span class="text">Scénario</span><span>Scénario</span></button>
    <button class="button-57" onclick="document.location='../ScenarioProf/Correction.php'"><span class="text">Correction</span><span>Correction</span></button>
    <button class="button-57" onclick="document.location='../ScenarioProf/AvantLesNotes.php'"><span class="text">Note</span><span>Note</span></button>
    <button class="button-57" onclick="document.location='chat.php'"><span class="text">Message</span><span>Message</span></button>
  <br>
</div>
</body>
</html>