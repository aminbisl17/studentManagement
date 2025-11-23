<?php
 /*
 function getConnection(){

#  amin PC - "DESKTOP-81CTT3O", ["Database" => "ubt","Uid" => "sa","PWD" => "11112222"]
#  amin Laptop - "DESKTOP-RF6FUGB", ["Database" => "ubt","Uid" => "sa","PWD" => "11112222"]
# elon laptop - "DESKTOP-GGBRSR0", ["Database" => "ubt","Uid" => "sa","PWD" => "11112222"]
    
 /* amin pc */#$con = sqlsrv_connect("DESKTOP-81CTT3O", ["Database" => "ubt","Uid" => "sa","PWD" => "11112222"]);

# amin laptop $con = sqlsrv_connect("DESKTOP-GGBRSR0", ["Database" => "ubt","Uid" => "sa","PWD" => "11112222"]);

# amin laptop  $con = sqlsrv_connect("aminfirstserver.database.windows.net", ["Database" => "ubt","Uid" => "client","PWD" => "UBT_cloud123C!"]);
 /*
$con = sqlsrv_connect("aminfirstserver.database.windows.net,1433",
    [
        "Database" => "ubt",
        "Uid" => "ubtwebclient_login",
        "PWD" => "UBT_cloud123C!",
        "Encrypt" => true,
        "TrustServerCertificate" => false
    ]
);

 if (!$con) {
        die(json_encode(array("error" => "Connection failed")));
    }


return $con;
 }
 
*/
function getConnection() {
    $serverName = getenv("DB_SERVER");
    $connectionOptions = [
        "Database" => getenv("DB_NAME"),
        "Uid" => getenv("DB_USER"),
        "PWD" => getenv("DB_PASS"),
        "Encrypt" => true,
        "TrustServerCertificate" => false
    ];

    $conn = sqlsrv_connect($serverName, $connectionOptions);

    if (!$conn) {
         die(json_encode(array("error" => "Connection failed")));
    }

    return $conn;
}

?>