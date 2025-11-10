<?php
 
 function getConnection(){

#  amin PC - "DESKTOP-81CTT3O", ["Database" => "ubt","Uid" => "sa","PWD" => "11112222"]
#  amin Laptop - "DESKTOP-RF6FUGB", ["Database" => "ubt","Uid" => "sa","PWD" => "11112222"]
# elon laptop - "DESKTOP-GGBRSR0", ["Database" => "ubt","Uid" => "sa","PWD" => "11112222"]
    
$con = sqlsrv_connect("DESKTOP-GGBRSR0", ["Database" => "ubt","Uid" => "sa","PWD" => "11112222"]);

 if (!$con) {
        die(json_encode(array("error" => "Connection failed")));
    }

return $con;
 }
 

?>