<?php
require_once "config.php";

function db_connect() {
    global $DB_SERVER, $connectionOptions;
    $conn = sqlsrv_connect($DB_SERVER, $connectionOptions);
    if ($conn === false) {
        http_response_code(500);
        die(json_encode(array("error" => "Database connection failed", "details" => sqlsrv_errors())));
    }
    return $conn;
}
