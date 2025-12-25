<?php
include 'db_connect.php';

// Function to sanitize input data
function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        $action = sanitize($_POST['action']);

        // Add Image
        if ($action == 'add') {
            $image = $_FILES['image']['name'];
            $target_dir = "layaleisureimages/"; // Directory where images will be uploaded
            $target = $target_dir . basename($image);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));

            // Check if image file is an actual image or fake image
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                echo "<script>alert('File is not an image.');</script>";
                $uploadOk = 0;
            }

            // Check if file already exists
            if (file_exists($target)) {
                echo "<script>alert('Sorry, file already exists.');</script>";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["image"]["size"] > 5000000) { // Adjust size limit as necessary
                echo "<script>alert('Sorry, your file is too large.');</script>";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "<script>alert('Sorry, your file was not uploaded.');</script>";
            } else {
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true); // Create the directory if it doesn't exist
                }

                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
                    // File uploaded successfully, insert into database
                    $sql = "INSERT INTO gallery_images (image_url) VALUES ('$target')";
                    if ($conn->query($sql) === TRUE) {
                        echo "<script>alert('New image added successfully');</script>";
                    } else {
                        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
                    }
                } else {
                    echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
                }
            }
        }

        // Delete Image
        elseif ($action == 'delete') {
            $id = isset($_POST['id']) ? $_POST['id'] : '';

            // Fetch image URL based on ID from database
            $sql = "SELECT image_url FROM gallery_images WHERE id=$id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $image_url = $row['image_url'];

                // Delete record from database
                $delete_sql = "DELETE FROM gallery_images WHERE id=$id";
                if ($conn->query($delete_sql) === TRUE) {
                    // Delete image file
                    if (file_exists($image_url)) {
                        unlink($image_url); // Delete file from server
                    }
                    echo "<script>alert('Image deleted successfully');</script>";
                } else {
                    echo "<script>alert('Error deleting image: " . $conn->error . "');</script>";
                }
            } else {
                echo "<script>alert('Image not found');</script>";
            }
        }
    }
}

// Fetch all images
$sql = "SELECT * FROM gallery_images";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Gallery Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Bootstrap CSS -->
    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #2c2c2c;
            color: #fff;
        }
        .container {
            margin-top: 50px;
        }
        .upload-form {
            background-color: #1a1a1a;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 10px #00ff00;
            margin-bottom: 20px;
        }
        .upload-form input[type="file"] {
            display: inline-block;
            width: auto;
        }
        .gallery-item {
            margin-bottom: 30px;
        }
        .card {
            height: 400px; /* Fixed height for all cards */
            background-color: #fff; /* White background */
            border: none; /* Remove default card border */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Optional: Add a shadow */
        }
        .card-img-top {
            height: 70%; /* Set image height within card */
            object-fit: cover; /* Ensure images cover the card area */
        }
        .card-body {
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative; /* Ensure relative positioning for child elements */
        }
        .delete-wrapper {
            position: absolute;
            bottom: 15px; /* Adjust as needed for vertical positioning */
            left: 50%; /* Center horizontally */
            transform: translateX(-50%);
        }
        .neon-line {
            height: 5px;
            background: linear-gradient(to right, #00ff00, #00aaff, #ff00ff);
            margin-bottom: 20px;
        }
        .back-to-dashboard {
            position: absolute;
            top: 10px;
            left: 10px;
        }
        .back-to-dashboard button {
            background-color: #00ff00;
            color: #000;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }
        .back-to-dashboard button:hover {
            background-color: #00cc00;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="back-to-dashboard">
            <button onclick="location.href='layaleisureadimpanel.php'">Back to Dashboard</button>
        </div>
        
        <h1 class="text-center">Gallery Management</h1>

        <!-- Form to upload a new image -->
        <div class="upload-form mx-auto mb-4">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add">
                <div class="form-group">
                    <label for="image">Select Image to Upload:</label>
                    <input type="file" name="image" id="image" class="form-control-file" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload Image</button>
            </form>
        </div>

        <!-- Display existing images with delete option -->
        <h2>Existing Images</h2>
        <div class="row">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="col-md-4 gallery-item">
                    <div class="card">
                        <img src="<?php echo htmlspecialchars($row['image_url']); ?>" class="card-img-top" alt="Gallery Image">
                        <div class="card-body">
                            <!-- Centered delete button -->
                            <div class="delete-wrapper">
                                <form action="" method="POST" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this image?');">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php $conn->close(); ?>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
