<?php

include __DIR__ . '/../db_connect.php'; 


function getProgrami($programi){

    $con = getConnection();

       $stmt = sqlsrv_query($con, "SELECT p.*, d.* FROM programet p JOIN dega d ON d.ID = p.id_deges WHERE p.programi = '" . $programi . "'");
    if ($stmt === false) {
        die(json_encode(array("error" => "Query failed")));
    }

    $data = [];

    while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){

        $data[] = $row;
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($con);
   
    return $data;
}

?>