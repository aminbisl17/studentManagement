<?php
header("Content-Type: application/json");

include __DIR__ . '/../Database/model/programet.php';

$response = []; // Prepare response object

if (isset($_GET['bachelor'])) {
    $bachelor = getAllBachelor();
    if ($bachelor && count($bachelor) > 0) {
        $response['success'] = true;
        $response['bachelor'] = $bachelor;
    } else {
        $response['success'] = false;
        $response['bachelor'] = [];
        $response['message'] = "No bachelor data found";
    }
}

if (isset($_GET['master'])) {
    $master = getAllMaster();
    if ($master && count($master) > 0) {
        $response['success'] = true;
        $response['master'] = $master;
    } else {
        $response['success'] = false;
        $response['master'] = [];
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