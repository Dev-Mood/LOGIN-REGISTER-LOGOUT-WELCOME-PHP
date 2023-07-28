<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$full_name = $_SESSION['full_name'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h2>Welcome, <?php echo $full_name; ?>!</h2>
    <p>You are logged in and welcome to the member's area.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
