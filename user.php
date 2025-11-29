<?php
require_once "db.php";
header("Content-Type: application/json");

if (!isset($_GET["id"])) {
    echo json_encode(array("error" => "User ID required"));
    exit();
}

$conn = db_connect();
$sql = "SELECT UserID, FullName, Email FROM Users WHERE UserID = ?";
$stmt = sqlsrv_query($conn, $sql, array($_GET["id"]));

if ($stmt && ($user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))) {
    echo json_encode($user);
} else {
    echo json_encode(array("error" => "User not found"));
}
