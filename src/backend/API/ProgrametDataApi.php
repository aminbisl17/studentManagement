<?php
header("Content-Type: application/json");

include __DIR__ . '/../Database/model/functions.php';

$response = [];

if(isset($_GET['dega'])){
  
    $programi = getAllDega();

    if($programi){
         $response['success'] = true;
         $response['programi'] = $programi;
    }else{
        $response['success'] = false;
        $response['programi'] = [];
        $response['message'] = "No dega data found";
    }

}

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

if (!isset($_GET['bachelor']) && !isset($_GET['master']) && !isset($_GET['dega'])) {
    $response['success'] = false;
    $response['message'] = "No query parameter provided";
}

echo json_encode($response);
exit;
?>