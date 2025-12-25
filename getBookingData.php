<?php
// getBookingData.php
header('Content-Type: application/json');
include 'db_connect.php';

// Fetch booking counts excluding canceled bookings
$beach_bookings_sql = "SELECT COUNT(*) AS total FROM beachbookings WHERE booking_status != 'Cancelled'";
$leisure_bookings_sql = "SELECT COUNT(*) AS total FROM bookings WHERE booking_status != 'Cancelled'";
$waves_bookings_sql = "SELECT COUNT(*) AS total FROM wavesbookings WHERE booking_status != 'Cancelled'";
$safari_bookings_sql = "SELECT COUNT(*) AS total FROM safaribookings WHERE booking_status != 'Cancelled'";

$beach_result = $conn->query($beach_bookings_sql);
$leisure_result = $conn->query($leisure_bookings_sql);
$waves_result = $conn->query($waves_bookings_sql);
$safari_result = $conn->query($safari_bookings_sql);

$beach_count = $beach_result->num_rows > 0 ? $beach_result->fetch_assoc()['total'] : 0;
$leisure_count = $leisure_result->num_rows > 0 ? $leisure_result->fetch_assoc()['total'] : 0;
$waves_count = $waves_result->num_rows > 0 ? $waves_result->fetch_assoc()['total'] : 0;
$safari_count = $safari_result->num_rows > 0 ? $safari_result->fetch_assoc()['total'] : 0;

$conn->close();

echo json_encode([
    'beach' => $beach_count,
    'leisure' => $leisure_count,
    'waves' => $waves_count,
    'safari' => $safari_count
]);
?>
