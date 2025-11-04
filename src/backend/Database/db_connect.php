<?php
 
 function getConnection(){
$con = sqlsrv_connect("DESKTOP-81CTT3O", ["Database" => "ubt","Uid" => "sa","PWD" => "11112222"]);

if($con) {
    echo "Connection established.<br />";
} else {
    echo "Connection could not be established.<br />";
    die(print_r(sqlsrv_errors(), true));
}

return $con;
 }
 

?>