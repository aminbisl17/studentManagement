<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../../vendor/autoload.php';

function SendEmail($name, $email, $subject, $message){
    $mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'dhshcnbshc@gmail.com';
    $mail->Password   = 'imjnddbkldpuvqli';  
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('dhshcnbshc@gmail.com', $name);
    $mail->addAddress('amin.b05@icloud.com');

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = "<b>Name:</b> $name<br><b>Email:</b> $email<br><b>Message:</b><br>$message";
    $mail->AltBody = "Name: $name\nEmail: $email\nMessage:\n$message";
    $mail->send();

    return ['success' => true];
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
return ['success' => false];
}
?>