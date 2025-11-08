<?php
header("Content-Type: application/json");

include __DIR__ . '/../Database/model/programet.php';

$response = []; // Prepare response object
if (isset($_GET['bachelor'])) {
    $programi = getProgrami('Bachelor');
    if ($programi && count($programi) > 0) {
        $response['success'] = true;
        $response['programi'] = $programi;
    } else {
        $response['success'] = false;
        $response['programi'] = [];
        $response['message'] = "No bachelor data found";
    }
}

if (isset($_GET['master'])) {
    $programi = getProgrami('Master');
    if ($programi && count($programi) > 0) {
        $response['success'] = true;
        $response['programi'] = $programi;
    } else {
        $response['success'] = false;
        $response['programi'] = [];
        $response['message'] = "No master data found";
    }
}

// If neither parameter is set
if (!isset($_GET['bachelor']) && !isset($_GET['master'])) {
    $response['success'] = false;
    $response['message'] = "No query parameter provided";
}

// Return **single JSON**
echo json_encode($response);
?>