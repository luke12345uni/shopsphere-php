<?php
$DB_SERVER = "tcp:YOUR-SERVER.database.windows.net,1433";
$DB_NAME   = "YOUR-DB";
$DB_USER   = "YOUR-USER";
$DB_PASS   = "YOUR-PASSWORD";

$connectionOptions = array(
    "Database" => $DB_NAME,
    "Uid" => $DB_USER,
    "PWD" => $DB_PASS,
    "Encrypt" => 1,
    "TrustServerCertificate" => 0
);
