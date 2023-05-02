
<?php
session_start();

include ('../../View/Accueil/MDPoublieAnglais.html');

?>


<?php

require("../../Modele/Accueil/MDPoublie.php");

@email();

?>
