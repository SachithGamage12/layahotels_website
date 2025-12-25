<?php
// Include database connection file
include_once 'db_connect.php';

// Retrieve form data using $_POST
$room_type = $_POST['room_type'];
$basis_type = $_POST['basis_type'];
$weekday = $_POST['weekday'];
$weekend = $_POST['weekend'];
$holiday = $_POST['holiday'];

// SQL query to update room prices
$sql = "UPDATE safariroomprices SET weekday='$weekday', weekend='$weekend', holiday='$holiday' WHERE room_type='$room_type' AND  basis_type='$basis_type'";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    echo "<script>alert('Room prices updated successfully.'); window.location.href='layasafariupdatingprice.php';</script>";
} else {
    echo "Error updating room prices: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
