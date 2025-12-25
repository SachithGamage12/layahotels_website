<!-- fetch_prices.php -->

<?php
// Include database connection
include 'db_connect.php';

try {
    // Query to fetch room prices
    $sql = "SELECT * FROM room_prices";
    $stmt = $pdo->query($sql);

    // Fetch all rows as associative array
    $prices = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Output as JSON (or process as needed)
    header('Content-Type: application/json');
    echo json_encode($prices);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
