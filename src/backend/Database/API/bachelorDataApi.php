<?php

header("content-type: application/json");

include __DIR__.'/../model/programet.php';

if(isset($_GET['bachelor'])){

    $bachelor = getAllBachelor();
 
    if($bachelor){
          echo json_encode([
            "success" => true,
            "bachelor" => $bachelor
          ]);
    } else{
         echo json_encode([
            "success" => false,
            "bachelor" => $bachelor
          ]);
        }
}else {
    echo json_encode([
        "success" => false,
        "message" => "Email and password are required"
    ]);
}


?>