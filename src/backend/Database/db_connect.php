<?php
 
 function getConnection(){

    
$con = sqlsrv_connect("DESKTOP-81CTT3O", ["Database" => "ubt","Uid" => "sa","PWD" => "11112222"]);

 if (!$con) {
        die(json_encode(array("error" => "Connection failed")));
    }

return $con;
 }
 

?>