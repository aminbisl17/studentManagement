<?php

header("content-type: application/json");


include __DIR__ . '/../Database/model/students.php';

if (isset($_POST['email'])) {
    
    $student = getSpecificStudent(strval($_POST['email'])); 

    if ($student) {
        echo json_encode([
            "success" => true,
            "student" => $student
        ]); 
    } else {
       echo json_encode([
            "success" => false,
            "student" => $student
        ]); 
    }
}else {
    echo json_encode([
        "success" => false,
        "message" => "Email and password are required"
    ]);
}


?>