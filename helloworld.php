<?php

 $serverName = "DESKTOP-81CTT3O";
  $databaseName = "ubt";
  $uid = "sa";
  $pass = "11112222";

  $connection = ["Database" => $databaseName,
                     "Uid" => $uid,
                     "PWD" => $pass
];

$con = sqlsrv_connect($serverName, $connection);

if($con) {
    echo "Connection established.<br />";
} else {
    echo "Connection could not be established.<br />";
    die(print_r(sqlsrv_errors(), true));
}
?>