<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use RedBeanPHP\R;

$DB_DSN = 'mysql:dbname=' . $DB_NAME . ';host='. $DB_HOST . ';charset=utf8mb4';
R::setup($DB_DSN, $DB_USER, $DB_PASS);


function sendEmail($subject, $body, $to) {
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host       = EMAIL_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = EMAIL_USERNAME;
        $mail->Password   = EMAIL_PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = EMAIL_PORT;

        //Recipients
        $mail->setFrom(EMAIL_USERNAME, EMAIL_SENDER);
        $mail->addAddress($to[0], $to[1]);


        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
        echo 'Done';
    } catch (Exception $e) {
        echo "Error: {$mail->ErrorInfo}";
    }
}
