<?php
header("Content-Type: application/json; charset=UTF-8");
ob_start(); // capture all output

try {
    include __DIR__ . '/../phpmailer/mail.php';

    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';

    if (!$name || !$email || !$subject || !$message) {
        echo json_encode(['success' => false, 'message' => 'All fields are required']);
        exit;
    }

    $result = SendEmail($name, $email, $subject, $message);

} catch (Throwable $e) {
    $result = [
        'success' => false,
        'message' => 'PHP error: ' . $e->getMessage()
    ];
}

// Capture any stray output
$extra = ob_get_clean();
if ($extra) $result['debug_output'] = $extra;

echo json_encode($result);
exit;