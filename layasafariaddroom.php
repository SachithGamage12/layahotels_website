<?php
require_once 'db_connect.php';

// Function to sanitize input data
function sanitizeInput($data) {
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($data))));
}

// Initialize a variable to control modal display
$update_success = false;

// Handle room image update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_image'])) {
    $room_id = sanitizeInput($_POST['room_id']);

    // File upload handling
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo '<div class="error-message">File is not an image.</div>';
            $uploadOk = 0;
        }
    }

    // Check file size (max 15MB)
    if ($_FILES["image"]["size"] > 15000000) {
        echo '<div class="error-message">Sorry, your file is too large. Maximum size is 15MB.</div>';
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo '<div class="error-message">Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>';
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo '<div class="error-message">Sorry, your file was not uploaded.</div>';
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Update room image in database only if upload was successful
            $sql = "UPDATE safarirooms SET image='$target_file' WHERE id='$room_id'";
            if ($conn->query($sql) === TRUE) {
                $update_success = true;
                echo '<script>alert("Image updated successfully.");</script>';
            } else {
                echo '<div class="error-message">Error updating room image: ' . $conn->error . '</div>';
            }
        } else {
            echo '<div class="error-message">Sorry, there was an error uploading your file.</div>';
        }
    }
}

// Handle room title update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_title'])) {
    $room_id = sanitizeInput($_POST['room_id']);
    $title = sanitizeInput($_POST['title']);

    // Update room title in database
    $sql = "UPDATE safarirooms SET title='$title' WHERE id='$room_id'";
    if ($conn->query($sql) === TRUE) {
        $update_success = true;
        echo '<script>alert("Title updated successfully.");</script>';
    } else {
        echo '<div class="error-message">Error updating room title: ' . $conn->error . '</div>';
    }
}

// Handle room description update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_description'])) {
    $room_id = sanitizeInput($_POST['room_id']);
    $description = sanitizeInput($_POST['description']);

    // Update room description in database
    $sql = "UPDATE safarirooms SET description='$description' WHERE id='$room_id'";
    if ($conn->query($sql) === TRUE) {
        $update_success = true;
        echo '<script>alert("Description updated successfully.");</script>';
    } else {
        echo '<div class="error-message">Error updating room description: ' . $conn->error . '</div>';
    }
}

// Fetch and display rooms
$sql = "SELECT * FROM safarirooms";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manage Rooms</title>
    <link rel="icon" href="layasafariimages/logo.jpg" type="image/x-icon">
    <style>
        /* Basic styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .admin-panel {
            padding: 20px;
            max-width: 1200px;
            margin: auto;
            background-color: #FFE62D;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
            margin-top: 20px;
            position: relative; /* Relative positioning for absolute button */
        }
        .btn-back {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #006400; /* Dark green background */
            border-radius: 4px;
            text-decoration: none;
            margin-bottom: 20px; /* Adjust margin as needed */
            font-size: 16px; /* Adjust font size */
        }
        .btn-back:hover {
            background-color: #008000; /* Darker green on hover */
        }
        .btn-add {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            color: #fff;
            background-color: #00008B; /* Neon dark blue background */
            border-radius: 4px;
            text-decoration: none;
            font-size: 16px;
        }
        .btn-add:hover {
            background-color: #0000CD; /* Darker blue on hover */
        }
        .room-list-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding-right: 20px; /* Add padding to compensate for scrollbar width */
        }
        .room-item {
            flex: 1 0 calc(33.333% - 20px); /* Adjust width for 3 columns */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%; /* Set full height */
            margin-bottom: 20px;
            position: relative; /* Relative position for .neon-line */
        }
        .room-item img {
            width: 100%;
            height: auto;
            display: block;
            object-fit: cover; /* Ensure images fill their containers */
        }
        .details {
            padding: 16px;
            flex: 1; /* Allow details section to expand */
        }
        .details h3 {
            margin: 0 0 8px;
            font-size: 18px;
        }
        .details p {
            margin: 0 0 16px;
            font-size: 14px;
        }
        .btns-wrapper {
            display: flex;
            flex-direction: column; /* Stack buttons vertically */
            gap: 10px; /* Add space between buttons */
            position: relative;
        }
        .btns-wrapper form {
            display: flex;
            flex-direction: column;
            gap: 10px; /* Add space between form elements */
        }
        .btn-update {
            padding: 8px 16px;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border: none;
            font-size: 14px;
            text-align: center;
            position: relative;
            overflow: hidden;
            background-color: #006400; /* Dark green background */
        }
        .btn-update:hover {
            background-color: #008080; /* Darker green on hover */
        }
        .btn-update::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 100%;
            background-color: #ffffff; /* White underline */
            transition: all 0.3s ease-out;
            z-index: -1;
            border-radius: 5px;
        }
        .btn-update:hover::before {
            left: 0;
            width: 100%;
        }
        textarea {
            width: 100%;
            height: 80px; /* Adjust height as needed */
            padding: 8px;
            font-size: 14px;
            border-radius: 4px;
            border: 1px solid #ccc;
            resize: vertical; /* Allow vertical resizing */
        }
        @media (max-width: 1024px) {
            .room-item {
                flex: 1 0 calc(50% - 20px); /* Two columns on medium screens */
            }
        }
        @media (max-width: 768px) {
            .room-item {
                flex: 1 0 calc(100% - 20px); /* One column on small screens */
            }
            .btns-wrapper form {
                flex-direction: row; /* Arrange form elements horizontally */
            }
            .btns-wrapper form input,
            .btns-wrapper form button {
                flex: 1; /* Expand input and button to fill container */
            }
            .btns-wrapper form textarea {
                flex: 1; /* Expand textarea to fill container */
                margin-right: 10px; /* Add space between input and button */
            }
        }
    </style>
</head>
<body>
    <div class="admin-panel">
        <a href="layasafariadminpanel.php" class="btn-back">Back to Dashboard</a>
        <h2>Manage Rooms</h2>
        <?php if ($update_success): ?>
            <div class="success-message">Update successful!</div>
        <?php endif; ?>
        <div class="room-list-wrapper">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="room-item">
                        <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
                        <div class="details">
                            <h3><?php echo $row['title']; ?></h3>
                            <p><?php echo $row['description']; ?></p>
                            <div class="btns-wrapper">
                                <!-- Update Image Button -->
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="room_id" value="<?php echo $row['id']; ?>">
                                    <input type="file" name="image" id="image">
                                    <button type="submit" name="update_image" class="btn-update">Update Image</button>
                                </form>
                                <!-- Update Title Button -->
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <input type="hidden" name="room_id" value="<?php echo $row['id']; ?>">
                                    <input type="text" name="title" placeholder="New Title">
                                    <button type="submit" name="update_title" class="btn-update">Update Title</button>
                                </form>
                                <!-- Update Description Button -->
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <input type="hidden" name="room_id" value="<?php echo $row['id']; ?>">
                                    <textarea name="description" placeholder="New Description"></textarea>
                                    <button type="submit" name="update_description" class="btn-update">Update Description</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No rooms found.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
