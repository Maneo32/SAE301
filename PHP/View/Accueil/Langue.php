<script>
    /* ne fonctionne pas correctement avec Firefox, utliser avec Chrome */
    function changerLangue(){
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "changerVariableSession.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    console.log(this.responseText);
                }
            }
            var langue = "<?php
                if (isset($_SESSION['langue'])){
                echo $_SESSION['langue'];}
                else {
                    echo 0; };
                ?>";
            console.log(langue)
            if (langue == 1) {
                xhr.send("nouvelle_valeur=0");
            } else {
                xhr.send("nouvelle_valeur=1");
            }
            location.reload();
        }


</script>