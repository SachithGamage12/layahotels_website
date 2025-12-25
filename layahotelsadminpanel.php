<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Laya Hotels | Admin Panel</title>
<link rel="icon" href="img/layahotels.jfif" type="image/x-icon">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
.cards {
  display: flex;
  gap: 15px;
  flex-wrap: wrap;
}

.card {
  flex: 1;
  min-width: 200px;
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.card h2 {
  margin-bottom: 10px;
}

.card p {
  font-size: 1.2rem;
  margin: 0;
}

.card.laya-beach {
  background-color: #ffcc00; /* Coral color */
}

.card.laya-leisure {
  background-color: #9f00ff; /* Yellow color */
}

.card.laya-waves {
  background-color: #00bcd4; /* Cyan color */
}

.card.laya-safari {
  background-color: #4caf50; /* Green color */
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
}
</style>
</head>
<body>

<div class="sidebar">
  <h2>Laya Hotels Admin Panel</h2>
  <ul>
    <li><a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
    <li><a href="managecareers.php"><i class="fas file-o"></i> Manage Careers</a></li>
    <li><a href="layabeachbookings.php"><i class="fas fa-user-circle"></i>Laya Beach</a></li>
    <li><a href="layaleisurebookings.php"><i class="fas fa-user-circle"></i> Laya Leisure</a></li>
    <li><a href="layasafaribookings.php"><i class="fas fa-user-circle"></i> Laya Safari</a></li>
    <li><a href="layawavesbookings.php"><i class="fas fa-user-circle"></i> Laya Waves</a></li>
  </ul>
  
  <!-- Log Out button -->
  <button class="b" onclick="window.location.href = 'index.php';">Log Out</button>
</div>

<div class="main-content">
  <div class="header">
    <h1>Dashboard</h1>
  </div>
  
  <div class="cards">
    <div class="card laya-beach">
      <h2>Laya Beach All Booking Count</h2>
      <?php
      include 'db_connect.php';
      function getBookingCount($conn, $tableName) {
          $sql = "SELECT COUNT(*) AS total FROM $tableName WHERE booking_status != 'Cancelled'";
          $result = $conn->query($sql);
          if ($result === false) {
              echo "<p>Error: " . $conn->error . "</p>";
              return 0;
          }
          return $result->num_rows > 0 ? $result->fetch_assoc()['total'] : 0;
      }

      $beach_count = getBookingCount($conn, 'beachbookings');
      echo "<p>" . $beach_count . "</p>";
      $conn->close();
      ?>
    </div>
    
    <div class="card laya-leisure">
      <h2>Laya Leisure All Booking Count</h2>
      <?php
      include 'db_connect.php';
      $leisure_count = getBookingCount($conn, 'bookings');
      echo "<p>" . $leisure_count . "</p>";
      $conn->close();
      ?>
    </div>
    
    <div class="card laya-waves">
      <h2>Laya Waves All Booking Count</h2>
      <?php
      include 'db_connect.php';
      $waves_count = getBookingCount($conn, 'wavesbookings');
      echo "<p>" . $waves_count . "</p>";
      $conn->close();
      ?>
    </div>
    
    <div class="card laya-safari">
      <h2>Laya Safari All Booking Count</h2>
      <?php
      include 'db_connect.php';
      $safari_count = getBookingCount($conn, 'safaribookings');
      echo "<p>" . $safari_count . "</p>";
      $conn->close();
      ?>
    </div>
  </div>

  <!-- Bar Chart -->
  <div class="card">
    <h2>Booking Counts by Hotel</h2>
    <canvas id="bookingChart"></canvas>
  </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Fetch booking data
  fetch('getBookingData.php')
    .then(response => response.json())
    .then(data => {
      // Create the chart
      const ctx = document.getElementById('bookingChart').getContext('2d');
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['Laya Beach', 'Laya Leisure', 'Laya Waves', 'Laya Safari'],
          datasets: [{
            label: 'Booking Counts',
            data: [data.beach, data.leisure, data.waves, data.safari],
            backgroundColor: [
              '#ffcc00', // Coral color
              '#9f00ff', // Yellow color
              '#00bcd4', // Cyan color
              '#4caf50'  // Green color
            ],
            borderColor: [
              '#ffcc00',
              '#9f00ff',
              '#00bcd4',
              '#4caf50'
            ],
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          scales: {
            x: {
              title: {
                display: true,
                text: 'Hotels'
              }
            },
            y: {
              beginAtZero: true,
              title: {
                display: true,
                text: 'Booking Count'
              },
              ticks: {
                stepSize: 10,
                max: 100 // Adjust this as needed
              }
            }
          }
        }
      });
    });
});
</script>

</body>
</html>
