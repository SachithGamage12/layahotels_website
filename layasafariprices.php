<?php
// Include database connection file
include_once 'db_connect.php';

// SQL query to fetch room prices
$sql = "SELECT room_type, basis_type, weekday, weekend, holiday FROM safariroomprices";
$result = mysqli_query($conn, $sql);

$prices = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $prices[] = $row;
    }
}

// Close connection
mysqli_close($conn);

// Return JSON response
header('Content-Type: application/json');
echo json_encode($prices);
?>
