<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Supprimer</title>
        <link rel="stylesheet" href="../../View/Style/PageProf.css" >
        <script src="../../Modele/Fonction/LesFonctionsJS.js"></script>

    </head>

    <?php
    include("../../View/BarreHTML/BarreScenario.php");
    ?>

    <body>
    <br><br><br><br>
    <form method="post" >
        <div class="supprimer">
            Êtes-vous sur de supprimer ce patient ?
            <input type="submit" name="OuiSupp" value="Oui">
            <input type="submit" name="Non" value="Non">
        </div>
    </form>

    </body>
    </html>


