<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Safari Bookings</title>
    <link rel="icon" href="layasafariimages/logo.jpg" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .dashboard {
            width: 90%;
            max-width: 1200px;
            margin: 30px auto;
            background: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header a {
            font-size: 16px;
            color: #28a745; /* Green color */
            text-decoration: none; /* Remove underline */
            font-family: Arial, sans-serif;
        }

        .header a:hover {
            text-decoration: underline; /* Underline on hover */
        }

        .header button {
            font-size: 16px;
            color: #ffffff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            font-family: Arial, sans-serif;
        }

        .header button:hover {
            background-color: #0056b3;
        }

        .stats {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .stat {
            width: 30%;
            padding: 20px;
            color: #ffffff;
            text-align: center;
            border-radius: 8px;
            font-size: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, transform 0.3s;
            margin: 0 10px;
        }

        .stat.pending {
            background-color: #28a745; /* Green */
        }

        .stat.confirmed {
            background-color: #ffc107; /* Yellow */
        }

        .stat.canceled {
            background-color: #dc3545; /* Red */
        }

        .stat:hover {
            transform: scale(1.05);
        }

        .bookingsTable {
            width: 100%;
            border-collapse: collapse;
        }

        .bookingsTable th, .bookingsTable td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .bookingsTable th {
            background-color: #007bff;
            color: #ffffff;
        }

        .bookingsTable tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .bookingsTable tr:hover {
            background-color: #e1e1e1;
        }

        .bookingsTable td {
            font-size: 16px;
        }

        .bookingsTable th {
            font-size: 18px;
            font-weight: bold;
        }
    </style>
    <script>
        function printTable() {
            var originalContent = document.body.innerHTML;
            var printContent = document.querySelector('.bookingsTable').outerHTML;
            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = originalContent;
        }
    </script>
</head>
<body>
    <div class="dashboard">
        <div class="header">
            <a href="layahotelsadminpanel.php">Back to Admin Panel</a>
            <button onclick="printTable()">Print</button>
        </div>
        <div class="stats">
            <div class="stat pending" id="pendingBookings">Pending: 0</div>
            <div class="stat confirmed" id="confirmedBookings">Confirmed: 0</div>
            <div class="stat canceled" id="canceledBookings">Cancelled: 0</div>
        </div>
        <table class="bookingsTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Mobile Number</th>
                    <th>Check-in Date</th>
                    <th>Check-out Date</th>
                    <th>Email Address</th>
                    <th>Selected Rooms</th>
                    <th>Booking Status</th>
                </tr>
            </thead>
            <tbody id="bookingsTableBody">
                <?php
                include 'db_connect.php';

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM safaribookings";
                $result = $conn->query($sql);

                $pendingCount = 0;
                $confirmedCount = 0;
                $canceledCount = 0;

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if ($row['booking_status'] === 'Pending') {
                            $pendingCount++;
                        } elseif ($row['booking_status'] === 'Confirmed') {
                            $confirmedCount++;
                        } elseif ($row['booking_status'] === 'Cancelled') {
                            $canceledCount++;
                        }

                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['first_name']}</td>
                                <td>{$row['last_name']}</td>
                                <td>{$row['mobile_number']}</td>
                                <td>{$row['checkin_date']}</td>
                                <td>{$row['checkout_date']}</td>
                                <td>{$row['email_address']}</td>
                                <td>{$row['selected_rooms_html']}</td>
                                <td>{$row['booking_status']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No bookings found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <script>
        document.getElementById('pendingBookings').textContent = 'Pending: ' + <?php echo $pendingCount; ?>;
        document.getElementById('confirmedBookings').textContent = 'Confirmed: ' + <?php echo $confirmedCount; ?>;
        document.getElementById('canceledBookings').textContent = 'Cancelled: ' + <?php echo $canceledCount; ?>;
    </script>
</body>
</html>
