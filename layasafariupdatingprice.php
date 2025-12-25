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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Update Room Prices</title>
    <link rel="icon" href="layasafariimages/logo.jpg" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f2f2f2;
            padding: 20px;
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        thead {
            background-color: #f5f5f5;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            max-width: 600px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        select, input[type="number"], input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
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

    <h2>Update Room Prices</h2>

    <!-- Display current prices -->
    <table>
        <thead>
            <tr>
                <th>Room Type</th>
                <th>Basis Type</th>
                <th>Weekday Price</th>
                <th>Weekend Price</th>
                <th>Holiday Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prices as $price): ?>
                <tr>
                    <td><?php echo $price['room_type']; ?></td>
                    <td><?php echo $price['basis_type']; ?></td>
                    <td><?php echo $price['weekday']; ?></td>
                    <td><?php echo $price['weekend']; ?></td>
                    <td><?php echo $price['holiday']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <hr>

    <!-- Form to update prices -->
    <h3>Update Room Prices</h3>
    <form action="layasafariprice.php" method="POST">
        <label for="room_type">Room Type:</label>
        <select name="room_type" id="room_type" required>
            <option value="deluxe sgl">Deluxe Sea View SGL ROOM</option>
            <option value="deluxe dbl">Deluxe Sea View DBL ROOM</option>
            <option value="deluxe tpl">Deluxe Sea View TPL ROOM</option>
            <option value="jungle sgl">Jungle Villa SGL Room</option>
            <option value="jungle dbl">Jungle Villa DBL Room</option>
            <option value="jungle tpl">Jungle Villa TPL Room</option>
        </select>

        <label for="basis_type">Basis Type:</label>
        <select name="basis_type" id="basis_type" required>
            <option value="bb">BB</option>
            <option value="hb">HB</option>
            <option value="fb">FB</option>
        </select>

        <label for="weekday">Weekday Price:</label>
        <input type="number" id="weekday" name="weekday" required>

        <label for="weekend">Weekend Price:</label>
        <input type="number" id="weekend" name="weekend" required>

        <label for="holiday">Holiday Price:</label>
        <input type="number" id="holiday" name="holiday" required>

        <input type="submit" value="Update Prices">
    </form>
</body>
</html>

<?php
// Close connection
mysqli_close($conn);
?>
