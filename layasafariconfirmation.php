<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Laya Safari | Admin Panel - Confirmation</title>
<link rel="icon" href="layasafariimages/logo.jpg" type="image/x-icon">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<style>
/* Custom Styles */
body {
  font-family: 'Poppins', sans-serif;
  background-color: #f4f7f6;
  color: #333;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

.form-group {
  margin-bottom: 20px;
}

.confirmation-form {
  margin-top: 30px;
  border: 1px solid #ccc;
  padding: 20px;
  border-radius: 8px;
  background-color: #fff;
}

.confirmation-form h2 {
  margin-bottom: 15px;
}

.confirmation-form textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.confirmation-form button[type="submit"] {
  padding: 10px 20px;
  background-color: #111;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.confirmation-form button[type="submit"]:hover {
  background-color: #333;
}

.confirmation-form .btn-secondary {
  margin-left: 10px;
}

.list-group {
  max-height: 300px;
  overflow-y: auto;
  border: 1px solid #ccc;
  border-radius: 4px;
  padding: 10px;
}

.list-group-item {
  cursor: pointer;
}

.row {
  display: flex;
}

.col-left {
  flex: 1;
  padding-right: 20px;
}

.col-right {
  flex: 1;
}
.back-link {
            float: left;
            margin-bottom: 20px;
        }
        .back-link a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #006400; /* Dark green background */
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }
        .back-link a:hover {
            background-color: #004d00; /* Darker green on hover */
        }
</style>
</head>
<body>
<div class="back-link">
        <a href="layasafariadminpanel.php">Back to Dashboard</a>
    </div>
    &nbsp;
<div class="container">
  
  <h1 class="mb-4">Laya Safari Admin Panel - Confirmation</h1>
  
  <div class="row">
    <!-- Left Column - Search Form -->
    <div class="col-left">
      <!-- Guest Search Form -->
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mb-4">
        <div class="form-group">
          <label for="search">Search Booking ID:</label>
          <input type="text" id="search" name="search" class="form-control" placeholder="Enter booking ID" required>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-dark">Search</button>
        </div>
      </form>
    </div>

    <!-- Right Column - Confirmation Form -->
    <div class="col-right">
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
        // Database connection
        include 'db_connect.php';

        // Sanitize input (escape special characters)
        $search = $conn->real_escape_string($_POST['search']);

        // SQL query to retrieve guest details by booking ID
        $search_sql = "SELECT * FROM safaribookings WHERE id = '$search' ORDER BY id DESC";
        $result = $conn->query($search_sql);

        if ($result === false) {
          echo "<p class='alert alert-danger'>Error executing the query: " . $conn->error . "</p>";
        } elseif ($result->num_rows > 0) {
          // Display initial form for the latest booking
          $first_row = $result->fetch_assoc();
          echo "<div id='confirmation-details' class='confirmation-form border rounded p-4 mb-4'>";
          echo "<h2 class='mb-3'>Confirmation Email</h2>";
          echo "<p><strong>Guest Name:</strong> <span id='guest_name'>" . $first_row['first_name'] . " " . $first_row['last_name'] . "</span></p>";
          echo "<p><strong>Guest Email:</strong> <span id='guest_email_display'>" . $first_row['email_address'] . "</span></p>";
          echo "<p><strong>Booking ID:</strong> <span id='booking_id_display'>" . $first_row['id'] . "</span></p>";

          // Strip HTML tags from selected_rooms_html
          $selected_rooms = strip_tags($first_row['selected_rooms_html']);

          // Prepare the message with HTML-like content for the textarea
          $confirmation_message = "Dear " . $first_row['first_name'] . " " . $first_row['last_name'] . ",\n\n";
          $confirmation_message .= "Your booking has been confirmed.\n\n";
          $confirmation_message .= "Here are your booking details:\n";
          $confirmation_message .= "Check-in Date: " . $first_row['checkin_date'] . "\n";
          $confirmation_message .= "Check-out Date: " . $first_row['checkout_date'] . "\n";
          $confirmation_message .= "Selected Rooms: " . $selected_rooms . "\n\n";
       

          // Form to send confirmation email
          echo "<form id='confirmation-email-form' method='POST' action='layasafariconfirmationmail.php'>";
          echo "<input type='hidden' name='guest_email' id='guest_email' value='" . $first_row['email_address'] . "'>";
          echo "<input type='hidden' id='booking_id' name='booking_id' value='" . $first_row['id'] . "'>";
          echo "<div class='form-group'>";
          echo "<label for='sender_email'>Sender Email:</label>";
          echo "<input type='email' id='sender_email' name='sender_email' class='form-control' value='layasafari@layahotels.lk' placeholder='Enter sender email' required>";
          echo "</div>";
          echo "<div class='form-group'>";
          echo "<label for='confirmation_message'>Confirmation Message:</label>";
          echo "<textarea id='confirmation_message' name='confirmation_message' class='form-control' placeholder='Enter confirmation message' rows='10'>$confirmation_message</textarea>";
          echo "</div>";
          echo "<div class='form-group'>";
          echo "<label for='highlighted_notes'>Highlighted Notes:</label>";
          echo "<textarea id='highlighted_notes' name='highlighted_notes' class='form-control' placeholder='Enter highlighted notes' rows='10'>Checking time: 2.00 P.M\nCheckout time: 12.00 P.M\n\nAdvanced details:\nAccount No: 061100140017774\nAccount Name: Laya Safari Army Holiday Resort\nAccount Branch: People's Bank - Thissamaharama\nEmail: layawaves@gmail.com\nWhatsApp No: 0761412216\n\nPrior to advance: 75% of advance and bank slip should be sent through WhatsApp or email.</textarea>";
          echo "</div>";
          echo "<button type='submit' name='send_email' class='btn btn-primary'>Send Confirmation Email</button>";
          echo "</form>";
          echo "</div>";
        } else {
          echo "<p class='alert alert-warning'>No guest found with the booking ID: $search</p>";
        }

        $conn->close();
      }
      ?>
    </div>
  </div>
</div>

<!-- Bootstrap JS and dependencies (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-ZvpUoO/+Pp02U24rUOqG+TsuUHpV1U8o/Nz6WOuhpu4oqKNmAY8n3O0p3Xa/6D3X" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-Wf/3xx2j+a6+i7z5Tnclts7tCP0HzJ2Gv9+e0EtUwE9bSN8WuXfjS+XauWl5fcO" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgPSUpOI9+Tyf/ixQp+N5tKp+eN3oj5xdA7/5RkQm4lm/Ar2OQF" crossorigin="anonymous"></script>
</body>
</html>

