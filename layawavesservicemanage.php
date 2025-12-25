<?php
include 'db_connect.php';

// Function to sanitize input data
function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        $action = sanitize($_POST['action']);

        // Add Service
        if ($action == 'add') {
            $description = isset($_POST['description']) ? sanitize($_POST['description']) : '';
            $image = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : '';
            $target = "layawavesimages/" . basename($image);

            if ($description && $image) {
                $sql = "INSERT INTO wavesservices (image_url, description) VALUES ('$target', '$description')";

                if ($conn->query($sql) === TRUE) {
                    move_uploaded_file($_FILES['image']['tmp_name'], $target);
                    echo "<script>alert('New service added successfully');</script>";
                } else {
                    echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
                }
            } else {
                echo "<script>alert('Error: Description or image is missing.');</script>";
            }
        }

        // Update Service
        elseif ($action == 'update') {
            $id = isset($_POST['id']) ? $_POST['id'] : '';
            $description = isset($_POST['description']) ? sanitize($_POST['description']) : '';
            $image = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : '';
            $target = "layawavesimages/" . basename($image);

            // Check if image is uploaded
            if ($image) {
                $sql = "UPDATE wavesservices SET image_url='$target' WHERE id=$id";

                if ($conn->query($sql) === TRUE) {
                    move_uploaded_file($_FILES['image']['tmp_name'], $target);
                    echo "<script>alert('Service image updated successfully');</script>";
                } else {
                    echo "<script>alert('Error updating service image: " . $conn->error . "');</script>";
                }
            }

            // Update description if provided
            if (!empty($description)) {
                $sql = "UPDATE wavesservices SET description='$description' WHERE id=$id";

                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Service description updated successfully');</script>";
                } else {
                    echo "<script>alert('Error updating service description: " . $conn->error . "');</script>";
                }
            }
        }

        // Delete Service
        elseif ($action == 'delete') {
            $id = isset($_POST['id']) ? $_POST['id'] : '';

            $sql = "DELETE FROM wavesservices WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Service deleted successfully');</script>";
            } else {
                echo "<script>alert('Error deleting service: " . $conn->error . "');</script>";
            }
        }
    }
}

// Fetch all services
$sql = "SELECT * FROM wavesservices";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Manage Services</title>
    <link rel="icon" href="layawavesimages/logo.jfif" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #111;
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .header {
            width: 100%;
            text-align: center;
            padding: 20px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            position: relative; /* Added to position back button */
        }
        .add-service-form {
            background-color: #88edff; /* Light blue */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            width: 80%;
            max-width: 600px;
            text-align: center;
            margin-bottom: 20px;
            margin-top: 20px; /* Added margin top to center */
            display: inline-block;
        }
        .add-service-form input[type="file"],
        .add-service-form input[type="text"] {
            margin: 10px 0;
            padding: 10px;
            width: calc(50% - 20px); /* Adjusted width for responsiveness */
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            display: inline-block;
        }
        .add-service-form button[type="submit"] {
            background-color: #ff0; /* Yellow */
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            display: inline-block;
        }
        .services {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
            width: 100%;
            max-width: 1200px;
        }
        .box-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center; /* Center align boxes */
        }
        .box {
            border: 1px solid #000;
            border-radius: 8px;
            overflow: hidden;
            width: calc(25% - 20px); /* Adjusted width for responsiveness */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 10px;
            background-color: #222;
            margin: 10px;
        }
        .box img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        .box h3 {
            margin: 10px 0;
        }
        .box form {
            margin: 10px 0;
        }
        .box button {
            border: none;
            padding: 10px 15px;
            text-align: center;
            display: inline-block;
            font-size: 16px;
            margin: 5px 2px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s, transform 0.3s;
        }
        .box button.update-image {
            background-color: #00bfff; /* Neon blue */
            color: #fff;
        }
        .box button.update-image:hover {
            background-color: #007BFF;
            transform: scale(1.1);
        }
        .box button.update-description {
            background-color: #32cd32; /* Neon green */
            color: #fff;
        }
        .box button.update-description:hover {
            background-color: #28a745;
            transform: scale(1.1);
        }
        .box button.delete-service {
            background-color: #ff4500; /* Neon red */
            color: #fff;
        }
        .box button.delete-service:hover {
            background-color: #dc3545;
            transform: scale(1.1);
        }
        #scrollBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            border: none;
            outline: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 4px;
        }
        #scrollBtn:hover {
            background-color: #45a049;
        }
        .back-to-dashboard {
            position: absolute;
            top: 20px;
            left: 20px;
        }
        .back-to-dashboard button {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #006400;
            color: white;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .back-to-dashboard button:hover {
            background-color: #555;
        }
        @media screen and (max-width: 1200px) {
            .box {
                width: calc(33.33% - 20px); /* Adjusted width for responsiveness */
            }
        }
        @media screen and (max-width: 900px) {
            .box {
                width: calc(50% - 20px); /* Adjusted width for responsiveness */
            }
        }
        @media screen and (max-width: 600px) {
            .add-service-form {
                width: 100%;
            }
            .box {
                width: 100%; /* Full width on smaller screens */
            }
            .add-service-form input[type="file"],
            .add-service-form input[type="text"] {
                width: calc(100% - 20px); /* Full width for inputs on smaller screens */
            }
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Add/Manage Services</h1>
    <div class="back-to-dashboard">
        <button onclick="location.href='layawavesadimpanel.php'">Back to Dashboard</button>
    </div>
</div>

<div class="add-service-form">
    <h2>Add Service</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="add">
        <input type="text" name="description" placeholder="Service Description" required>
        <input type="file" name="image" accept="image/*" required>
        <button type="submit">Add Service</button>
    </form>
</div>

<div class="services">
    <div class="box-container">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="box">
                <img src="<?php echo $row['image_url']; ?>" alt="Service Image">
                <h3><?php echo $row['description']; ?></h3>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="file" name="image" accept="image/*">
                    <button type="submit" class="update-image">Update Image</button>
                </form>
                <form action="" method="POST">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="text" name="description" placeholder="Update Description" required>
                    <button type="submit" class="update-description">Update Description</button>
                </form>
                <form action="" method="POST">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <button type="submit" class="delete-service">Delete Service</button>
                </form>
            </div>
        <?php } ?>
    </div>
</div>

</body>
</html>
