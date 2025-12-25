<!-- dashboard.php -->
<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="layalesuireadmin.css">
</head>
<body>
    <div class="dashboard-container">
        <h2>Welcome, Admin!</h2>
        <div class="options">
            <a href="rooms.php">Manage Rooms</a>
            <a href="gallery.php">Manage Gallery</a>
            <a href="promotions.php">Manage Promotions</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
