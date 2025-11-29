<?php
require_once "db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";

    $conn = db_connect();
    $sql = "SELECT UserID, FullName, PasswordHash FROM Users WHERE Email = ?";
    $stmt = sqlsrv_query($conn, $sql, array($email));

    if ($stmt && ($user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))) {
        if (password_verify($password, $user["PasswordHash"])) {
            $_SESSION["UserID"] = $user["UserID"];
            $_SESSION["FullName"] = $user["FullName"];
            echo "Login successful.";
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "Invalid email or password.";
    }
} else {
    header("Location: login.php");
    exit();
}
