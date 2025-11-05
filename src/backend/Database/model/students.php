<?php 

include __DIR__ . '/../db_connect.php'; 


  function getSpecificStudent($Email){

    $con = getConnection();

    $sql = "SELECT s.*, p.* FROM studentdata s JOIN people p ON p.ID = s.ID WHERE s.emailUBT = ?";

    $stmt = sqlsrv_query($con, $sql, array($Email));
    if ($stmt === false) {
        die(json_encode(array("error" => "Query failed")));
    }

      $data = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($con);
   
    return $data;
  }

?>