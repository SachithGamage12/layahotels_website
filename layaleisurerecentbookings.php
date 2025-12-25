<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Laya Leisure | Recent Bookings</title>
<link rel="icon" href="layaleisureimages/logo.jpeg" type="image/x-icon">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<style>
/* Reset CSS */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: 'Poppins', sans-serif;
  background-color: #f4f7f6;
  color: #333;
}

/* Main Content */
.main-content {
  padding: 20px;
}

.header {
  background-color: #fff;
  padding: 20px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  margin-bottom: 20px;
}

.header h1 {
  margin: 0;
  font-size: 1.5rem;
}

.table-container {
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  margin-bottom: 20px;
}

table {
  width: 100%;
  border-collapse: collapse;
}

table, th, td {
  border: 1px solid #ddd;
  padding: 10px; /* Reduced padding */
  text-align: left;
}

th {
  background-color: #f4f4f4;
}

/* Print-specific styles */
@media print {
  body {
    background-color: #fff;
    color: #333;
  }
  
  .header, .footer, .sidebar {
    display: none;
  }
  
  .table-container {
    box-shadow: none;
    margin: 0;
    padding: 0;
  }
  
  table, th, td {
    border: 1px solid #000;
    padding: 6px; /* Further reduced padding */
    font-size: 12px; /* Smaller font size */
  }
  
  .print-button {
    display: none; /* Hide print button when printing */
  }
}

.print-button {
  margin-top: 20px;
}

.print-button button {
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 1rem;
}

.print-button button:hover {
  background-color: #0056b3;
}
</style>
</head>
<body>

<div class="main-content">
  <div class="header">
    <h1>Recent Bookings</h1>
  </div>

  <div class="table-container">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Guest Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Room</th>
          <th>Check-in</th>
          <th>Check-out</th>
          <th>Booking Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'db_connect.php';
        
        // Query recent bookings
        $sql = "SELECT * FROM bookings ORDER BY id DESC LIMIT 10";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
            echo "<td>" . $row['email_address'] . "</td>";
            echo "<td>" . $row['mobile_number'] . "</td>";
            echo "<td>" . $row['selected_rooms_html'] . "</td>";
            echo "<td>" . $row['checkin_date'] . "</td>";
            echo "<td>" . $row['checkout_date'] . "</td>";
            echo "<td>" . $row['booking_status'] . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='8'>No recent bookings found.</td></tr>";
        }
        
        $conn->close();
        ?>
      </tbody>
    </table>
  </div>

  <div class="print-button">
    <button onclick="window.print()">Print</button>
  </div>
</div>

</body>
</html>
