<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Laya Waves | Admin Panel</title>
<link rel="icon" href="layawavesimages/logo.jfif" type="image/x-icon">
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

/* Sidebar */
.sidebar {
  width: 250px;
  height: 100vh;
  position: fixed;
  background-color: #111;
  color: #fff;
  padding-top: 20px;
}

.sidebar h2 {
  text-align: center;
  margin-bottom: 30px;
  font-size: 1.5rem;
}

.sidebar ul {
  list-style-type: none;
  padding-left: 0;
}

.sidebar ul li {
  padding: 15px 20px;
}

.sidebar ul li a {
  color: #fff;
  text-decoration: none;
  display: block;
}

.sidebar ul li a:hover {
  background-color: #575757;
  border-radius: 4px;
}

.sidebar ul li a .fas {
  margin-right: 10px;
}

/* Main Content */
.main-content {
  margin-left: 250px;
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

.dashboard .card {
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  margin-bottom: 20px;
}

.dashboard .card h2 {
  margin-bottom: 10px;
}

.dashboard .card p {
  font-size: 1.2rem;
  margin: 0;
}

.cards {
  display: flex;
  gap: 05px;
  flex-wrap: wrap;
}

.card {
  flex: 1;
  min-width: 200px;
  
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
}

th, td {
  padding: 15px;
  text-align: left;
}

th {
  background-color: #f4f4f4;
}

.chart-container {
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  margin-bottom: 20px;
}

.add-room {
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  margin-bottom: 20px;
}

.add-room h2 {
  margin-bottom: 20px;
}

.add-room form {
  display: flex;
  flex-direction: column;
}

.add-room label {
  margin-bottom: 5px;
  font-weight: bold;
}

.add-room input, .add-room textarea, .add-room select {
  margin-bottom: 15px;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 4px;
}
.a{
  background-color: yellowgreen;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  margin-right: 10px; 
  cursor: pointer; 
}
.b {
  background-color: darkcyan;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  margin-left: auto; /* Centers the button horizontally */
  margin-right: auto; /* Centers the button horizontally */
  cursor: pointer; 
  display: block; /* Ensures it takes full width */
  width: fit-content;
  
}
.print-button{
  background-color: violet;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  margin-right: 10px; 
  cursor: pointer; 
}
.add-room button {
  padding: 10px;
  background-color: #111;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.add-room button:hover {
  background-color: #333;
}

.total-bookings {
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  margin-bottom: 20px;
  text-align: center;
  font-size: 1.2rem;
}

.booking-type {
  flex: 1;
  min-width: 200px;
  background-color: #333;
  color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  text-align: center;
  font-size: 1.2rem;
}
.d {
  background-color: red;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  margin-right: 10px; 
  cursor: pointer; 
}
@media print {
  /* Example: Hide sidebar in print */
  .sidebar {
    display: none;
  }
  
  /* Example: Adjust table styles for printing */
  table {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
  }
  
  /* Example: Hide buttons in print */
  .a {
    display: none;
  }
}

/* Responsive Design */
@media (max-width: 768px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }

  .sidebar ul li {
    text-align: center;
  }

  .main-content {
    margin-left: 0;
  }
  
  .cards {
    flex-direction: column;
  }
  .b {
    margin-left: 10px; /* Adjust margin for smaller screens */
    width: auto; /* Allow button to resize based on content */
    position: absolute; /* Position absolutely within .header */
    top: 20px; /* Adjust top position as needed */
    left: 20px; /* Adjust left position as needed */
  }
}
</style>
</head>
<body>

<div class="sidebar">
  <h2>Laya Waves Admin Panel</h2>
  <ul>
    <li><a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
    <li><a href="layawavesmanagevideo.php"><i class="fas fa-video-camera"></i> Manage Video</a></li>
    <li><a href="layawavesaddroom.php"><i class="fas fa-bed"></i> Manage Rooms</a></li>
    <li><a href="layawavesupdateprice.php"><i class="fas fa-money-bill"></i> Update Prices</a></li>
    <li><a href="layawavesservicemanage.php"><i class="fas fa-concierge-bell"></i> Manage Services</a></li>
    <li><a href="layawavesmanagegallery.php"><i class="fas fa-images"></i> Manage Gallery</a></li>
    <li><a href="layawavespromomanage.php"><i class="fas fa-tags"></i> Manage Promotions</a></li>
    <li><a href="layawavesconfirmation.php"><i class="fas fa-hotel"></i> Confirm Booking</a></li>
    <li><a href="layawavesbookingtable.php"><i class="fas fa-eye"></i> View Deleted Bookings</a></li>
    <li><a href="layawavesuploadbookings.php"><i class="fas fa-upload"></i> Upload Bookings</a></li>
    
    </ul>
  
  <!-- Log Out button -->
  <button class="b" onclick="window.location.href = 'index.php';">Log Out</button>
</div>

<div class="main-content">
  <div class="header">
    <h1>Dashboard</h1>
    

  </div>
  
  
  <div class="total-bookings" style="background-color: orange; ">
  <?php
  include 'db_connect.php';
  
  // SQL query to count only non-cancelled bookings
  $total_bookings_sql = "SELECT COUNT(*) AS total FROM wavesbookings WHERE booking_status != 'Cancelled'";
  
  $total_result = $conn->query($total_bookings_sql);
  
  if ($total_result->num_rows > 0) {
      $total_row = $total_result->fetch_assoc();
      echo "Total Bookings: " . $total_row['total'];
  } else {
      echo "Total Bookings: 0";
  }
  
  $conn->close();
  ?>
</div>

    <div class="cards">
    <div class="booking-type" style="background-color: darkgreen;">
      <?php
      include 'db_connect.php';
      $pending_bookings_sql = "SELECT COUNT(*) AS total FROM wavesbookings WHERE booking_status = 'Pending'";
      $pending_result = $conn->query($pending_bookings_sql);
      if ($pending_result->num_rows > 0) {
          $pending_row = $pending_result->fetch_assoc();
          echo "Pending Bookings: " . $pending_row['total'];
      } else {
          echo "Pending Bookings: 0";
      }
      $conn->close();
      ?>
    </div>
    
    <div class="booking-type" style="background-color: darkyellow;">
      <?php
      include 'db_connect.php';
      $confirmed_bookings_sql = "SELECT COUNT(*) AS total FROM wavesbookings WHERE booking_status = 'Confirmed'";
      $confirmed_result = $conn->query($confirmed_bookings_sql);
      if ($confirmed_result->num_rows > 0) {
          $confirmed_row = $confirmed_result->fetch_assoc();
          echo "Confirmed Bookings: " . $confirmed_row['total'];
      } else {
          echo "Confirmed Bookings: 0";
      }
      $conn->close();
      ?>
    </div>
    
    <div class="booking-type" style="background-color: darkred;">
      <?php
      include 'db_connect.php';
      $cancelled_bookings_sql = "SELECT COUNT(*) AS total FROM wavesbookings WHERE booking_status = 'Cancelled'";
      $cancelled_result = $conn->query($cancelled_bookings_sql);
      if ($cancelled_result->num_rows > 0) {
          $cancelled_row = $cancelled_result->fetch_assoc();
          echo "Cancelled Bookings: " . $cancelled_row['total'];
      } else {
          echo "Cancelled Bookings: 0";
      }
      $conn->close();

      
      ?>
    </div>

    
    
    <!-- New cards for civil and army booking counts -->
  
  </div>
  
  <div class="table-container">
    <h2>Bookings</h2>&nbsp;&nbsp;
    <form method="POST" action="layawavesupdatingbooking.php">
    <button type="submit" name="delete_all" class="d" onclick="return confirmDeleteAll()">Delete All Bookings</button>
    <button type="submit" class="a">Update Status</button>
    <button type="button" class="print-button" onclick="openRecentBookingsPage()"  >Print Recent Bookings</button>
    
    
      <table id="bookingsTable">
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
        <tbody >
        <?php
        include 'db_connect.php';
       
        // SQL to reset AUTO_INCREMENT
        $reset_ai_sql = "ALTER TABLE wavesbookings AUTO_INCREMENT = 1";
        $conn->query($reset_ai_sql);
        
        $sql = "SELECT * FROM wavesbookings ORDER BY id DESC LIMIT 10";
        $result = $conn->query($sql);
        
        if (!$result) {
            die("Query failed: " . $conn->error); // Display SQL error message
        }
        
        if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Determine background color based on booking status
        
        
        // Output table row with dynamic background color and select dropdown
        
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
        echo "<td>" . $row['email_address'] . "</td>";
        echo "<td>" . $row['mobile_number'] . "</td>";
        echo "<td>" . $row['selected_rooms_html'] . "</td>";
        echo "<td>" . $row['checkin_date'] . "</td>";
        echo "<td>" . $row['checkout_date'] . "</td>";
        
        echo "<td>
                <select name='booking_status[" . $row['id'] . "]'>
                    <option value='Pending'" . ($row['booking_status'] == 'Pending' ? ' selected' : '') . ">Pending</option>
                    <option value='Confirmed'" . ($row['booking_status'] == 'Confirmed' ? ' selected' : '') . ">Confirmed</option>
                    <option value='Cancelled'" . ($row['booking_status'] == 'Cancelled' ? ' selected' : '') . ">Cancelled</option>
                </select>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>No recent bookings found.</td></tr>";
}

        
        $conn->close();
        ?>
        </tbody>
      </table>
      
    </form>
    <script>
 function confirmDeleteAll() {
    if (confirm("Are you sure you want to delete all bookings?")) {
        // User confirmed, submit the form
        document.getElementById('delete-all-form').submit();
        return true; // Ensure form submits
    }
    return false; // Cancel form submission if not confirmed
}
function openRecentBookingsPage() {
  window.open('layawavesrecentbooking.php', '_blank');
}


</script>
  </div>
</div>

</body>
</html>
