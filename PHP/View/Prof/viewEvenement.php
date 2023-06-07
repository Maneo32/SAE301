<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Evenement dynamique </title>
    <link rel="stylesheet" href="../../View/Style/PageProf.css" >
    <script src="../../Modele/Fonction/LesFonctionsJS.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>

</head>
<body>


<script>



    document.cookie = 'valid = '+""
    function recupererCookie(nom) {

        nom = nom + "=";
        var liste = document.cookie.split(';');
        console.log(liste);
        for (var i = 0; i < liste.length; i++) {
            var c = liste[i];
            // ignorer les espaces en début de chaîne
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nom) == 0) return c.substring(nom.length, c.length);
        }
        return null;
    }

    document.cookie = 'reload = '+0;
    function controle() {
        const test = document.form.input.value;
        document.cookie = "case = " + test;
        return test;
    }

    function change($i, $date, $do) {
        // demander à l'utilisateur quelle donnée il souhaite mettre
        var variableRecuperee = <?php echo json_encode($_SESSION['fonction']); ?>;
        if (variableRecuperee==='prof') {
            var $a = prompt("Quelle donnée voulez vous mettre?")
            var l = "";
            document.getElementsByTagName("td")[$i].innerHTML = $a;
            l = l + "!";
            l = l + $a;
            l = l + "!";
            l = l + $i;
            l = l + "!";
            l = l + $date
            console.log(l);
            document.cookie = "valid = " + l;
            document.cookie = "date = " + $date;
            document.cookie = "do = " + $do;
            document.cookie = 'reload = ' + 1;
            location.reload();
            return l;
        }
    }

</script>
<?php

include("../../View/BarreHTML/BarreScenario.php");


$sql = sce();


modifdonnee();
?>
<script>console.log(<?php $_SESSION['coo']?>)</script>
<div class="container">
    <h2>Ajouter des événements</h2>
    <button class="button-90" onclick="window.history.back()">Retour</button>
    <br>    <br>

    <form method="post" name="addevt">
        <label for="texte">Texte :</label>

        <div class="form-group">
            <textarea type="text" rows="5" cols="30" class="form-control" id="texte" name="texte" required></textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="ordre">Ordre d'apparition :</label>
            <input type="number" class="form-control" id="ordre" name="ordre" min="1" value="1" required>
            <h6>Il ne faut pas mettre deux fois le même ordre </h6>
        </div>
        <br>
        <button type="submit" id="send" name="send" class="button-90">Ajouter</button>
    </form>
</div>
<br>
<h4>Les événements</h4>

<div style="text-align: center;">
    <table>
        <thead>
        <tr>
            <th>Evénement</th>
            <th>Ordre</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i=0;

        // faire l'affichage des anciens événement

        while ($res = $sql->fetch()) {
            echo "<tr>";
            echo "<td onclick='change($i, $res[0], 0)'>" . $res[2] . "</td>";
            $i = $i+1;
            echo "<td onclick='change($i, $res[0], 0)'>".$res[1] .'</td>';
            $i = $i+1;
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<br>
<form>
    <button  id="btn_supp" class="button-90">Supprimer</button>
</form>
<script>
    function deleteScenario(id) {
        console.log('aaa')
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../../Modele/Prof/modeleEvenement.php?action', true);

        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = xhr.responseText;
                console.log(response);
                location.href = location.href;            }
        };

        xhr.send('action='+id);
    }

    // Exemple d'appel à la fonction supp depuis le JavaScript
    const boutonSuppression = document.getElementById('btn_supp');
    boutonSuppression.addEventListener('click', function(e) {
        deleteScenario(<?php echo $_SESSION['patient']?>)
        e.preventDefault()


    });
</script>
<div class="footer-CreateScenario">
    <br>
    <form action="../Accueil/BesoinAide.php" method="post">
        <button class="button-28" type="submit">Besoin d'aide</button>
    </form>
</div>
</body>
</html>