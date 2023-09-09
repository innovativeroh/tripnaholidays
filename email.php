<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // Server settings
    $mail->isSMTP();
    $mail->SMTPDebug = 1;
    $mail->Debugoutput = 'html';
    $mail->Host = 'mail.tripnaholidays.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->Username = 'ops@tripnaholidays.com';
    $mail->Password = 'Reset2123';
    // Sender &amp; Recipient
    $mail->From = 'ops@tripnaholidays.com';
    $mail->FromName = 'Team Crowdbugs';
    $mail->addAddress("innovativeroh@gmail.com");

    // Content
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->Subject = 'Hello';
    $body = 'World';
    $mail->Body = $body;
    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>