<?php

include __DIR__ . '/../db_connect.php'; 


function getAllBachelor(){

    $con = getConnection();

       $stmt = sqlsrv_query($con, "SELECT p.*, d.* FROM programet p JOIN dega d ON d.ID = p.id_deges");
    if ($stmt === false) {
        die(json_encode(array("error" => "Query failed")));
    }

    $data = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($con);
   
    return $data;
}

?>