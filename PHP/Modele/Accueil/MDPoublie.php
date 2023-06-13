<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


require('../../Modele/includes/Exception.php');
require('../../Modele/includes/PHPMailer.php');
require('../../Modele/includes/SMTP.php');
require("../../Modele/Accueil/email.php");
require("../../Modele/Accueil/MotDePasse.php");
require("../../Modele/BDD/ConnectionBDD.php");
require("../../Modele/Accueil/Connexion.php");
require("../../Modele/Accueil/Premier.php");
/* permet d'envoyer un mail a la perssonne qui a perdu son mot de passe*/
/**
 * @return void
 */
function email(){
    $conn = ConnectionBDD::getInstance();
    $pdo = $conn::getpdo();
    $sess = new Premier();
    $sess->premier('oublie');
    if ($_SESSION['oublie']==2) {
        if (isset($_POST['mail']) and isset($_POST['mailV2'])) {
            if (@strcmp(($_POST['mail']), ($_POST['mailV2'])) == 0) {//strcmp sert a comparer les deux chaines de caracteres
                @$email = $_POST['mail'];
                $etu = $pdo->prepare("SELECT * FROM etudiant WHERE email=?");
                $prof = $pdo->prepare("SELECT * FROM prof WHERE email=?");
                $etu->execute([$email]);
                $prof->execute([$email]);
                if ($etu->rowCount() > 0 or $prof->rowCount() > 0) {
                    echo '<script>alert("Vous allez recevoir un email sur votre adresse mail")</script>';
                    $mail = new PHPMailer(true);
                    try {
                        //Server settings
                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                        $mail->isSMTP();//Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'bulletforce59750@gmail.com';                     //SMTP username
                        $mail->Password   = 'bxwvbwzeuydsgpoa';                               //SMTP password
                        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                        $mail->Port       = 25;
                        //Recipients
                        $mail->CharSet='UTF-8';
                        $mail->setFrom('bulletforce59750@gmail.com', 'IFSI');
                        $mail->Subject = 'Réinitialisation de ton mot de passe';
                        $mail->Body='Changer votre mot de passe : http://localhost:63342/SAE301/PHP/Controleur/Accueil/nouveaumdp.php?_ijt=h7aqva8cftedg67rtq9qiplklt&_ij_reload=RELOAD_ON_SAVE';	                //Le contenu au format BarreHTML
                        $mail->addAddress($_POST['mail'], 'Joe User');     //Add a recipient
                        $mail->send();
                        echo 'Message has been sent';
                        $_SESSION['mail']=$email;
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                } else {
                    echo '<script>alert("Vous devez vous créer un compte")</script>';

                }

            }
            else {
                echo '<script>alert("Les mails sont différents")</script>';
            }
        }
    }

}

?>
