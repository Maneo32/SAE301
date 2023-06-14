<!DOCTYPE html>
<html lang="en">
<head>
    <meta title="BarreScenario" charset="UTF-8">
    <script>
        window.onload = init;
        function menu_f() {
            if(menu.classList.contains('test')) {
                menu.classList.remove('test');
            } else {
                menu.classList.add('test');
            }
        }
        function init() {
            let boutton = document.getElementById("boutton");
            let menu = document.getElementsByClassName("menu");
            boutton.addEventListener("click", menu_f);
        }
    </script>
    <title></title>
</head>
<body>
<?php
//require('../../Controleur/Accueil/checkSessionSessionProf.php');
?>
  <!--Le haut de la page avec l'image et le titre-->

<div class="font">
    <div class="header">
        <a href="../../Controleur/Accueil/Accueil.php">
            <img src="../../View/image/logoIFSI.png" width=120 height=80 alt="leLogo" >
        </a>
        <h1>Institut de Formation aux Soins Infirmiers (IFSI)</h1>

        <div class="deconnexion">
            <br>
            <br>
        </div>
    </div>
    <button type="button" id="boutton" class="menu">
        <span class="burger-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </button>
    <div id="menu" class="test">
        <button class="button-57" onclick="document.location='../../View/Prof/PageProf.php'"><span class="text">Accueil</span><span>Accueil</span></button>
        <button class="button-57" onclick="document.location='CreateScenario.php'"><span class="text">Scénario</span><span>Scénario</span></button>
        <button class="button-57" onclick="document.location='Correction.php'"><span class="text">Correction</span><span>Correction</span></button>
        <button class="button-57" onclick="document.location='AvantLesNotes.php'"><span class="text">Note</span><span>Note</span></button>
        <button class="button-57" onclick="document.location='../Accueil/chat.php'"><span class="text">Message</span><span>Message</span></button>
    </div>
    <br>
</div>
</body>
</html>