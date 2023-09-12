<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendEmail($email, $subject, $bodyMsg) {
//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // Server settings
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->Username = 'tripnaholidays@gmail.com';
    $mail->Password = 'mzzmzlwzwtxvueph';
    // Sender &amp; Recipient
    $mail->From = 'tripnaholidays@gmail.com';
    $mail->FromName = 'Tripnaholidays OTP';
    $mail->addAddress($email);

    // Content
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->Subject = $subject;
    $body = $bodyMsg;
    $mail->Body = $body;
    $mail->send();
} catch (Exception $e) {}
}
?>
