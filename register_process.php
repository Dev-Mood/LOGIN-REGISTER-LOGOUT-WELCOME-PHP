<?php

$dbHost = "localhost";
$dbUser = "id21085175_windelform";
$dbPassword = "#Windel123";
$dbName = "id21085175_windelform";

$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $contact_number = $_POST["contact_number"];
    $location = $_POST["location"];
    $password = $_POST["password"];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $uniqueId = uniqid(); 

    $sql = "INSERT INTO user_registered (unique_id, full_name, username, email, contact_number, location, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssssss", $uniqueId, $fullname, $username, $email, $contact_number, $location, $hashedPassword);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        header("Location: register.php");
        exit;
    } else {
        echo "Registration failed. Please try again.";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
