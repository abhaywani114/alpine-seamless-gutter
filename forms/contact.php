<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/vendor/phpmailer/phpmailer/src/Exception.php';
require '../assets/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../assets/vendor/phpmailer/phpmailer/src/SMTP.php';

$phpmailer = new PHPMailer();
$phpmailer->isSMTP();
$phpmailer->Host = 'smtp.mailtrap.io';
$phpmailer->SMTPAuth = true;
$phpmailer->Port = 2525;
$phpmailer->Username = '07aff2385e8d1f';
$phpmailer->Password = '2b5b289beda6da';


$phpmailer->setFrom('info@mailtrap.io', 'Eproxy');
$phpmailer->addReplyTo('info@mailtrap.io', 'Eproxy');
$phpmailer->addAddress('info@mailtrap.io');
$phpmailer->Subject = 'Test Email via Mailtrap SMTP using PHPMailer';
$phpmailer->isHTML(true);

if (isset($_POST['email'])) {
$firstName = $_POST['firstName'] ?? 'firstName';
$lastName = $_POST['lastName'] ?? 'lastName';
$email = $_POST['email'] ?? 'email';
$subject = $_POST['subject'] ?? 'subject';
$message = nl2br($_POST['message']) ?? 'message';

$mailContent = "<h1>Eproxy: Got a new query!</h1>
    Name: $firstName $lastName<br/>
    Email: $email<br/>
    Phone: $subject<br/>
    Message: $message<br/>
    <p>This is a test email I’m sending using SMTP mail server with PHPMailer.</p><br/>";
$phpmailer->Body = $mailContent;

if(!$phpmailer->send()){
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{
    echo 'OK';
}
}
?>
