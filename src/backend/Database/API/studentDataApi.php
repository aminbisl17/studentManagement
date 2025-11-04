<?php

header("content-typet application/json");


include __DIR__ . '/../model/students.php';

if (isset($_GET['id'])) {
    $student = getSpecificStudent(intval($_GET['id'])); 

    if ($student) {
        echo json_encode($student); 
    } else {
        echo json_encode(array("error" => "Student not found"));
    }
} else {
    echo json_encode(array("error" => "No ID provided"));
}

?>