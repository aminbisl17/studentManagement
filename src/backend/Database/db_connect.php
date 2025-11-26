<?php
 
require __DIR__ . '/../../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../../');
$dotenv->load();


 function getConnection(){

#  amin PC - "DESKTOP-81CTT3O", ["Database" => "ubt","Uid" => "sa","PWD" => "11112222"]
#  amin Laptop - "DESKTOP-RF6FUGB", ["Database" => "ubt","Uid" => "sa","PWD" => "11112222"]
# elon laptop - "DESKTOP-GGBRSR0", ["Database" => "ubt","Uid" => "sa","PWD" => "11112222"]
    
 /* amin pc */#$con = sqlsrv_connect("DESKTOP-81CTT3O", ["Database" => "ubt","Uid" => "sa","PWD" => "11112222"]);

# amin laptop $con = sqlsrv_connect("DESKTOP-GGBRSR0", ["Database" => "ubt","Uid" => "sa","PWD" => "11112222"]);

# amin laptop  $con = sqlsrv_connect("aminfirstserver.database.windows.net", ["Database" => "ubt","Uid" => "client","PWD" => "UBT_cloud123C!"]);
 
$con = sqlsrv_connect(trim($_ENV['DB_SERVER']), [
    "Database" => trim($_ENV['DB_NAME']),
    "Uid" => trim($_ENV['DB_USER']),
    "PWD" => trim($_ENV['DB_PASSWORD']),
    "Encrypt" => filter_var(trim($_ENV['DB_ENCRYPT']), FILTER_VALIDATE_BOOLEAN),
    "TrustServerCertificate" => filter_var(trim($_ENV['DB_TRUST_CERT']), FILTER_VALIDATE_BOOLEAN)
]);

if (!$con) {
    die(print_r(sqlsrv_errors(), true));
}
 if (!$con) {
        die(json_encode(array("error" => "Connection failed")));
    }


return $con;
 }
 
?>