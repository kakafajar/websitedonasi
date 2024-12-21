<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/PHPMailer/src/Exception.php';
require_once __DIR__ . '/PHPMailer/src/PHPMailer.php';
require_once __DIR__ . '/PHPMailer/src/SMTP.php';

require_once __DIR__ . '/mailconfig.php';


function get_phpmailer(){
    global $smtp_username;
    global $smtp_password;

    $mail = new PHPMailer(true);
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "ssl://smtp.gmail.com";
    $mail->Port = 465;
    $mail->Username = $smtp_username;
    $mail->Password = $smtp_password;

    return $mail;
}
