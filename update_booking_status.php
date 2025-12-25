<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['booking_status'])) {
    foreach ($_POST['booking_status'] as $id => $status) {
        $sql = "UPDATE bookings SET booking_status = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param('si', $status, $id);
            $stmt->execute();
            $stmt->close();
        } else {
            die("Failed to prepare statement: " . $conn->error);
        }
    }
}

// Check if the form is submitted and delete_all button is clicked
if (isset($_POST['delete_all'])) {
    // Archive bookings first
    archiveBookings();

    // Delete bookings from main table
    $delete_sql = "DELETE FROM bookings WHERE 1";
    if ($conn->query($delete_sql) === TRUE) {
        echo "<script>alert('All bookings deleted successfully!');</script>";
    } else {
        echo "Error deleting bookings: " . $conn->error;
    }
}

// Function to archive bookings
function archiveBookings() {
    global $conn;

    // Select all bookings to archive
    $select_sql = "SELECT * FROM bookings";
    $result = $conn->query($select_sql);

    if ($result->num_rows > 0) {
        // Prepare archive insert statement
        $archive_insert_sql = "INSERT INTO leisurebookings_archive (first_name, last_name, email_address, mobile_number, selected_rooms_html, checkin_date, checkout_date, booking_status) VALUES ";

        $values = array();
        while ($row = $result->fetch_assoc()) {
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $email_address = $row['email_address'];
            $mobile_number = $row['mobile_number'];
            $selected_rooms_html = $row['selected_rooms_html'];
            $checkin_date = $row['checkin_date'];
            $checkout_date = $row['checkout_date'];
            $booking_status = $row['booking_status'];

            // Escape values to prevent SQL injection
            $first_name = $conn->real_escape_string($first_name);
            $last_name = $conn->real_escape_string($last_name);
            $email_address = $conn->real_escape_string($email_address);
            $mobile_number = $conn->real_escape_string($mobile_number);
            $selected_rooms_html = $conn->real_escape_string($selected_rooms_html);
            $checkin_date = $conn->real_escape_string($checkin_date);
            $checkout_date = $conn->real_escape_string($checkout_date);
            $booking_status = $conn->real_escape_string($booking_status);

            // Prepare values for insertion
            $values[] = "('$first_name', '$last_name', '$email_address', '$mobile_number', '$selected_rooms_html', '$checkin_date', '$checkout_date', '$booking_status')";
        }

        // Join all values to form a single insert query
        $archive_insert_sql .= implode(', ', $values);

        // Insert into archive table
        if ($conn->query($archive_insert_sql)) {
            // Archive successful
            echo "Bookings archived successfully.<br>";
        } else {
            echo "Error archiving bookings: " . $conn->error . "<br>";
        }
    } else {
        echo "No bookings found to archive.<br>";
    }
}

// Select last 10 bookings after deletion
$sql = "SELECT * FROM bookings ORDER BY id DESC LIMIT 10";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error); // Display SQL error message
}

// Display last 10 bookings
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Display booking information as needed
        echo "Booking ID: " . $row['id'] . "<br>";
        echo "First Name: " . $row['first_name'] . "<br>";
        echo "Last Name: " . $row['last_name'] . "<br>";
        echo "Email Address: " . $row['email_address'] . "<br>";
        // Add more fields as necessary
        echo "<hr>";
    }
} else {
    echo "No bookings found.";
}




$conn->close();
header("Location: layaleisureadimpanel.php");
exit();
?>
