<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"] ?? "";
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";

    if ($name && $email && $password) {
        $conn = db_connect();
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO Users (FullName, Email, PasswordHash) VALUES (?, ?, ?)";
        $params = array($name, $email, $hashed);
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt) {
            header("Location: success.php");
            exit();
        } else {
            echo "Error inserting user";
            print_r(sqlsrv_errors());
        }
    } else {
        echo "All fields are required.";
    }
} else {
    header("Location: register.php");
    exit();
}
