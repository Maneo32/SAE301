<script>
    function changerLangue(){
            console.log('toto');
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "changerVariableSession.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    console.log(this.responseText);
                }
            }
            var langue = "<?php echo $_SESSION['langue']; ?>";
            console.log(langue)
            if (langue == 1) {
                xhr.send("nouvelle_valeur=0");
            } else {
                xhr.send("nouvelle_valeur=1");
            }
            location.reload();
        }


</script>