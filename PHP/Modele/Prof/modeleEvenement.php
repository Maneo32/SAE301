<?php
if (@$_COOKIE['reload']==1){
    @$_COOKIE['reload']=0;
    header('Refresh:0');
}
require('../../Modele/BDD/ConnectionBDD.php');
function sce()
{
    $id = $_SESSION['patient'];
// affichage des événements existants
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();
    $sql = $bdd->prepare("Select * from scenario where idpatient= ? order by ordre asc , idscenario asc");
    $sql->bindParam(1, $id);
    $sql->execute();
    return $sql;
}
@$_SESSION['coo'] = $_COOKIE['valid'];


function modifdonnee(){
    $id = $_SESSION['patient'];
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();
    $data = $_SESSION['coo'];
    $bool = true;
    @$mots = [$mot, $num, $ind] = explode('!', $data);
    $sql = $bdd->prepare("SELECT ordre FROM scenario WHERE idpatient = ?");
    $sql->bindParam(1, $id);
    $sql->execute();
    while ($row = $sql->fetch()) {
        if ($row[0] == @$mots[1]) {
            $bool = false;
        }
    }
    if ($data != "") {

        if ($mots[2]%2==0){
            $sql = $bdd->prepare("update scenario set texte=:texte where idpatient=:idp and idscenario=:ordre");
            $sql->bindParam(':texte', $mots[1], PDO::PARAM_STR);
            $sql->bindParam(':idp', $id);
            $sql->bindParam(':ordre', $mots[3]);
            $sql->execute();
        }
        elseif ($mots[2]%2==1 && $bool){
            $sql = $bdd->prepare("update scenario set ordre=:texte where idpatient=:idp and idscenario=:ordre");
            $sql->bindParam(':texte', $mots[1], PDO::PARAM_STR);
            $sql->bindParam(':idp', $id);
            $sql->bindParam(':ordre', $mots[3]);
            $sql->execute();
        }
    }
}


function ajouter($id, $bdd, $texte, $number)
{
    $bool = true;
    $sql = $bdd->prepare("SELECT ordre FROM scenario WHERE idpatient = ?");
            $sql->bindParam(1, $id);
            $sql->execute();
            while ($row = $sql->fetch()) {
            if ($row[0] == @$_POST["ordre"]) {
            $bool = false;
        }
    }
    if ($bool) {

        $sql = "INSERT into scenario(idpatient, texte, ordre) values (?,?,?)";
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $texte);
        $stmt->bindParam(3, $number);
        $stmt->execute();
    }
}
if (isset($_POST['send'])){
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();
    ajouter($_SESSION['patient'], $bdd, $_POST['texte'], $_POST['ordre']);
}



function supp($id){
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();
    $sql = $bdd->prepare("SELECT idscenario FROM scenario WHERE idpatient = ? ORDER BY idscenario DESC ");
    $sql->bindParam(1, $id);
    $sql->execute();


    $premierElement = $sql->fetch();
    if ($premierElement) {

        // Supprimer le premier élément
        $sqlDelete = $bdd->prepare("DELETE FROM scenario WHERE idscenario = ?");
        $sqlDelete->bindParam(1, $premierElement[0]);
        $sqlDelete->execute();

        echo "Suppression effectuée pour le scenario :". $premierElement[0];
    } else {
        echo "Aucun élément trouvé";
    }

}
if (isset($_POST['action'])) {
        supp($_POST['action']);
}
