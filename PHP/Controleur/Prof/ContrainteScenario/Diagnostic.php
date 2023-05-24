<?php
session_start();
include ("../../../View/Prof/viewDiagnostic.php");

require ("../../../Modele/Prof/modeleDiagnostic.php");
?>

<script> let button = document.getElementById("valider");
    button.addEventListener("click",function (){<?php insertDiag();?>});
</script>

