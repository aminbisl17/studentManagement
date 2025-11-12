<?php

include __DIR__ . '/../db_connect.php'; 


function getProgrami($programi){

    $con = getConnection();

    if (!$con) {
        return ['success' => false, 'error' => 'Database connection failed'];
    }


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

 function getSpecificStudent($Email, $Password){

    $con = getConnection();

    if (!$con) {
        return ['success' => false, 'error' => 'Database connection failed'];
    }

    $sql = "SELECT s.*, p.* FROM studentdata s JOIN people p ON p.ID = s.id_personit WHERE s.emailUBT = ? and s.studentPassword = ?";

    $stmt = sqlsrv_query($con, $sql, array($Email, $Password));
    if ($stmt === false) {
        die(json_encode(array("error" => "Query failed")));
    }

      $data = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($con);
   
    return $data;
  }

  function personExists($Emri, $Mbiemri, $Vendbanimi) {
    $con = getConnection();
    if (!$con) {
        return ['success' => false, 'error' => 'Database connection failed'];
    }

    $sql = "SELECT COUNT(*) AS count 
            FROM people 
            WHERE Emri = ? AND Mbiemri = ? AND Vendbanimi = ?";

    $stmt = sqlsrv_query($con, $sql, [$Emri, $Mbiemri, $Vendbanimi]);
    if ($stmt === false) {
        $errors = sqlsrv_errors();
        sqlsrv_close($con);
        return ['success' => false, 'error' => 'Query failed', 'details' => $errors];
    }

    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($con);

    return ($row['count'] > 0);
}


 function apply($Emri, $Mbiemri, $Vendbanimi, $Email, $numri_telefonit) {
    $con = getConnection();
    if (!$con) {
        return ['success' => false, 'error' => 'Database connection failed'];
    }

    $sql = "INSERT INTO people (Emri, Mbiemri, Vendbanimi, Email, numri_telefonit) 
            VALUES (?, ?, ?, ?, ?)";

    $stmt = sqlsrv_query($con, $sql, [$Emri, $Mbiemri, $Vendbanimi, $Email, $numri_telefonit]);

    if ($stmt === false) {
        $errors = sqlsrv_errors();
        sqlsrv_close($con);
        return ['success' => false, 'error' => 'Query failed', 'details' => $errors];
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($con);

    return ['success' => true];
}
?>