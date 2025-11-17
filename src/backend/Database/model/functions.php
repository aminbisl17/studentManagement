<?php

include __DIR__ . '/../db_connect.php'; 


function getProgrami($programi)
{
    $con = getConnection();

    if (!$con) {
        return ['success' => false, 'error' => 'Database connection failed'];
    }

    $sql = "
        SELECT 
            p.ID AS program_id,
            d.fushaStudimit,
            d.pershkrimi,
            d.imgPath,
            p.programi,
            p.qmimiBaz,
            s.lokacioni
        FROM programet p
        JOIN dega d ON d.ID = p.id_deges
        LEFT JOIN branch b ON b.id_programit = p.ID
        LEFT JOIN studyplaces s ON s.ID = b.id_lokacionit
        WHERE p.programi = ?
    ";

    $params = [$programi];

    $stmt = sqlsrv_query($con, $sql, $params);

    if ($stmt === false) {
        return ['success' => false, 'error' => 'Query failed', 'details' => sqlsrv_errors()];
    }

    $result = [];

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {

        $id = $row['program_id'];

        if (!isset($result[$id])) {
            $result[$id] = [
                'ID'        => $id,
                'fushaStudimit'  => $row['fushaStudimit'],
                'programi'  => $row['programi'],
                'pershkrimi' => $row['pershkrimi'],
                'imgPath' => $row['imgPath'],
                'qmimiBaz'  => $row['qmimiBaz'],
                'lokacioni' => []
            ];
        }

        if (!empty($row['lokacioni'])) {
            $result[$id]['lokacioni'][] = $row['lokacioni'];
        }
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($con);

    return array_values($result);
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

          if ($data && isset($data['CreatedAt']) && $data['CreatedAt'] instanceof DateTime) {
        $data['CreatedAt'] = $data['CreatedAt']->format('Y-m-d H:i:s');
    }


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

function getAllDega(){

    $con = getConnection();

    if (!$con) {
        return ['success' => false, 'error' => 'Database connection failed'];
    }

    $stmt = sqlsrv_query($con, "SELECT * FROM dega");

     if ($stmt === false) {
        die(json_encode(array("error" => "Query failed")));
    }


     $data = [];

    while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){

        $data[] = $row;
    }
    return $data;
}
?>