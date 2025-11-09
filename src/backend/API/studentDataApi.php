<?php

header("content-type: application/json");


include __DIR__ . '/../Database/model/students.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    
    $student = getSpecificStudent(strval($_POST['email']), strval($_POST['password'])); 

    if ($student != 0) {
        echo json_encode([
            "success" => true,
            "student" => $student
        ]); 
    } else {
       echo json_encode([
            "success" => false,
            "student" => $student,
            "message" => 'user not found!'
        ]); 
    }
}else {
    echo json_encode([
        "success" => false,
        "message" => "Email and password are required"
    ]);
}


?>