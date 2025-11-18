<?php

header("Content-Type: application/json; charset=UTF-8");


include __DIR__ . '/../phpmailer/mail.php';


$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';


if(!$name || !$email || !$subject || !$message){
    echo json_encode(['success' => false, 'message' => 'All fields are required']);
    exit;
}

echo json_encode(SendEmail($name,$email,$subject,$message));

?>