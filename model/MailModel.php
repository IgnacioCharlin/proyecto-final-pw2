<?php
require_once ("vendor/phpmailer/phpmailer/src/PHPMailer.php");
require_once ("vendor/phpmailer/phpmailer/src/Exception.php");
require_once ("vendor/phpmailer/phpmailer/src/SMTP.php");
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

date_default_timezone_set('America/Argentina/Buenos_aires');


class MailModel
{



    public static function enviarMail($usuario, $codigo)
    {

        $cuenta = parse_ini_file("Config/mail.ini", true);


        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);


        $mail->isSMTP();

        $mail->SMTPDebug = \PHPMailer\PHPMailer\SMTP::DEBUG_SERVER;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
        $mail->SMTPAuth = true;
        $mail->Username = $cuenta["mail"]["user"];
        $mail->Password = $cuenta["mail"]["password"];
        //Recipients
        $mail->setFrom('noReply@transporte.com.ar', 'UNLaM');
        $mail->addAddress($usuario["0"]["name"]);

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Activa tu cuenta Transporte La Matanza';
        $messege = '</br>
            Gracias por registrarte!</br>
            Tu cuenta ha sido creada, activala utilizando el enlace de la parte inferior.</br>
            </br>
            ------------------------</br>
            Username: ' . $usuario["0"]["name"] . '</br>
            ------------------------</br>
             </br>
            Por favor haz clic en este enlace para activar tu cuenta:</br>
            http://localhost/login/activarUsuario?email=' . $usuario["0"]["name"] . '&codigo=' . $codigo . '
            
            ';
        $mail->msgHTML($messege);

        $mail->AltBody = $messege;

        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            return true;

        }


    }
}