<?php
header("Content-Type: application/json");
include __DIR__ . '/../Database/model/functions.php';

$response = [];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

$Emri = $_POST['Emri'] ?? '';
$Mbiemri = $_POST['Mbiemri'] ?? '';
$Vendbanimi = $_POST['Vendbanimi'] ?? '';
$Email = $_POST['Email'] ?? '';
$numri_telefonit = $_POST['numri_telefonit'] ?? '';
$programi = $_POST['dega'] ?? '';

if (!$Emri || !$Mbiemri || !$Vendbanimi || !$Email || !$numri_telefonit || !$programi) {
    echo json_encode(['success' => false, 'message' => 'All fields are required']);
    exit;
}

if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Invalid email format']);
    exit;
}

if (personExists($Emri, $Mbiemri, $Vendbanimi)) {
    echo json_encode(['success' => false, 'message' => 'Person already exists']);
    exit;
}

$result = apply($Emri, $Mbiemri, $Vendbanimi, $Email, $numri_telefonit, $programi);

echo json_encode($result);
?>