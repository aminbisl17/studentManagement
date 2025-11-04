<?php 

include __DIR__ . '/../db_connect.php'; 


  function getSpecificStudent($ID){

    $con = getConnection();
    
    $sql = "SELECT * FROM studentdata WHERE ID = ?";
    $params = array($ID);

    $stmt = sqlsrv_query($con, $sql, $params);
    if ($stmt === false) {
        die(json_encode(array("error" => "Query failed")));
    }


      $data = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($con);
   
    return $data;
  }

?>