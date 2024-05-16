<?php

var_dump($_REQUEST);

include __DIR__ . "/vendor/autoload.php";

use Exception as GlobalException;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use RedBeanPHP\R;


$checkEmail = $_REQUEST['emailcheck'] ?? false;
$checkDb = $_REQUEST['dbcheck'] ?? false;

try {

if ($checkDb) {
    $DB_NAME = $_REQUEST['db_database'];
    $DB_HOST = $_REQUEST['db_host'];
    $DB_USER = $_REQUEST['db_username'];
    $DB_PASS = $_REQUEST['db_password'];
    $DB_DSN = 'mysql:dbname=' . $DB_NAME . ';host=' . $DB_HOST . ';charset=utf8mb4';
    R::setup($DB_DSN, $DB_USER, $DB_PASS);
}

if ($checkEmail) {
    $EMAIL_HOST = $_REQUEST['email_host'];
    $EMAIL_USERNAME = $_REQUEST['email_username'];
    $EMAIL_PASSWORD = $_REQUEST['email_password'];
    $EMAIL_PORT = $_REQUEST['email_port'];
    $EMAIL_USERNAME = $_REQUEST['email_username'];
    $EMAIL_SENDER = $_REQUEST['email_sender_name'];
    $EMAIL_SECURITY = $_REQUEST['email_sECURITY'];
    $EMAIL_RECEIVER_NAME = $_REQUEST['email_receiver_name'];
    $EMAIL_RECEIVER_EMAIL = $_REQUEST['email_receiver_email'];
    $EMAIL_SUBJECT = $_REQUEST['email_subject'];
    $EMAIL_BODY = $_REQUEST['email_body'];
    $EMAIL_RECEIVER_EMAIL = $_REQUEST['email_receiver_email'];

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host       = $EMAIL_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = $EMAIL_USERNAME;
        $mail->Password   = $EMAIL_PASSWORD;
        $mail->SMTPSecure = $EMAIL_SECURITY;
        $mail->Port       = $EMAIL_PORT;

        $mail->setFrom($EMAIL_USERNAME, $EMAIL_SENDER);
        $mail->addAddress($EMAIL_RECEIVER_EMAIL, $EMAIL_RECEIVER_NAME);


        $mail->isHTML(true);
        $mail->Subject = $EMAIL_SUBJECT;
        $mail->Body    = $EMAIL_BODY;

        $mail->send();
        echo 'Done';
    } catch (Exception $e) {
        echo "Error: {$mail->ErrorInfo}";
    }
}
} catch (GlobalException $ex) {
    var_dump($ex);
}
