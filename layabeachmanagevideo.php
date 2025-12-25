<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Video</title>
    <link rel="icon" href="img/logo.jpg" type="image/x-icon"> 
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
        .back-button {
            display: block;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
        }.back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
        .card {
            background-color: #000;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
        }
        .card video {
            width: 100%;
            height: auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="layabeachadminpanel.php" class="back-button">Back to Admin Panel</a>
        <h2>Upload Video</h2>
        <div class="card">
            <?php
            include 'db_connect.php';
            $result = $conn->query("SELECT video_path FROM videos ORDER BY id DESC LIMIT 1");
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $videoPath = $row['video_path'];
                echo '<video autoplay muted loop>
                        <source src="' . $videoPath . '" type="video/mp4">
                        Your browser does not support the video tag.
                      </video>';
            } else {
                echo '<p>No video available.</p>';
            }
            ?>
        </div>
        <form action="layabeachupload_video.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="video">Choose Video:</label>
                <input type="file" name="video" id="video" required>
            </div>
            <input type="submit" name="submit" value="Upload">
        </form>
    </div>
</body>
</html>
