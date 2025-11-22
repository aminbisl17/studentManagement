<?php
 
 function getConnection(){

#  amin PC - "DESKTOP-81CTT3O", ["Database" => "ubt","Uid" => "sa","PWD" => "11112222"]
#  amin Laptop - "DESKTOP-RF6FUGB", ["Database" => "ubt","Uid" => "sa","PWD" => "11112222"]
# elon laptop - "DESKTOP-GGBRSR0", ["Database" => "ubt","Uid" => "sa","PWD" => "11112222"]
    
 /* amin pc */ #$con = sqlsrv_connect("DESKTOP-81CTT3O", ["Database" => "ubt","Uid" => "sa","PWD" => "11112222"]);

<<<<<<< HEAD
# amin laptop 
  $con = sqlsrv_connect("DESKTOP-GGBRSR0", ["Database" => "ubt","Uid" => "sa","PWD" => "11112222"]);
=======
# amin laptop   
$con = sqlsrv_connect("localhost", ["Database" => "ubt","Uid" => "sa","PWD" => "11112222"]);
>>>>>>> 2f200d343ca195b698ff1c4dffc88a5b157f7151

 if (!$con) {
        die(json_encode(array("error" => "Connection failed")));
    }


return $con;
 }
 

?>