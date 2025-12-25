<?php
// Include your database connection
include 'db_connect.php';

// Handle the "Delete All" request
if (isset($_POST['delete_all'])) {
    // Execute the deletion
    $delete_sql = "TRUNCATE TABLE beachbookings_archive";
    if (mysqli_query($conn, $delete_sql)) {
        // Reset the ID counter to start from 1
        $reset_sql = "ALTER TABLE beachbookings_archive AUTO_INCREMENT = 1";
        mysqli_query($conn, $reset_sql);
        
        // Redirect to the same page to avoid resubmission
        header("Location: layabeachbookingtable.php");
        exit;
    } else {
        die('Error deleting records: ' . mysqli_error($conn));
    }
}

// Pagination parameters
$records_per_page = 10; // Number of records to display per page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1; // Current page number

// Handle search query
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// Calculate offset for pagination
$offset = ($page - 1) * $records_per_page;

$sql = "SELECT * FROM beachbookings_archive WHERE 1";
if (!empty($search)) {
    $search = mysqli_real_escape_string($conn, $search);
    // Search by name or email
    $sql .= " AND (first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR email_address LIKE '%$search%')";
}

// Adjust ORDER BY clause based on existing columns
$sql .= " ORDER BY id DESC LIMIT $records_per_page OFFSET $offset";
$result = mysqli_query($conn, $sql);

// Check for query execution errors
if (!$result) {
    die('Error executing query: ' . mysqli_error($conn));
}

// Count total results for pagination
$total_records_query = "SELECT COUNT(*) as total_records FROM beachbookings_archive WHERE 1";
if (!empty($search)) {
    $total_records_query .= " AND (first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR email_address LIKE '%$search%')";
}
$total_records_result = mysqli_query($conn, $total_records_query);

// Check for query execution errors
if (!$total_records_result) {
    die('Error executing total records query: ' . mysqli_error($conn));
}

$total_records = mysqli_fetch_assoc($total_records_result)['total_records'];

// Calculate total pages
$total_pages = ceil($total_records / $records_per_page);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Beach Bookings</title>
    <link rel="icon" href="img/logo.jpg" type="image/x-icon">
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4">All Bookings Details</h2>
        
        <!-- Back to Admin Panel button -->
        <a href="layabeachadminpanel.php" class="btn btn-secondary mb-3">Back to Admin Panel</a>
        
        <!-- Search form -->
        <form action="layabeachbookingtable.php" method="GET" class="form-inline mb-4">
            <input type="text" name="search" class="form-control mr-2" placeholder="Search by Name or Email Address" style="width: 300px;" value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        
        <!-- Delete All button -->
        <form action="layabeachbookingtable.php" method="POST" class="mb-4">
            <button type="submit" name="delete_all" class="btn btn-danger">Delete All</button>
        </form>

        <!-- Display table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Booking ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Rooms</th>
                        <th>Check-in Date</th>
                        <th>Check-out Date</th>
                        <th>Status</th>
                        <!-- Update table headings as needed -->
                       
                    </tr>
                </thead>
                <tbody>
                    <!-- PHP code to fetch and display data -->
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>".$row['id']."</td>";
                            echo "<td>".$row['first_name']." ".$row['last_name']."</td>";
                            echo "<td>".$row['email_address']."</td>";
                            echo "<td>".$row['mobile_number']."</td>";
                            echo "<td>" . $row['selected_rooms_html'] . "</td>";
                            echo "<td>".$row['checkin_date']."</td>";
                            echo "<td>".$row['checkout_date']."</td>";
                            echo "<td>".$row['booking_status']."</td>";
                            // Adjust as per your actual column name
                            
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>No results found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination links -->
        <div class="pagination mt-4">
            <ul class="pagination justify-content-center">
                <?php if ($total_pages > 1): ?>
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?php if ($i == $page) echo 'active'; ?>"><a class="page-link" href="?page=<?php echo $i . '&search=' . htmlspecialchars($search); ?>"><?php echo $i; ?></a></li>
                    <?php endfor; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
