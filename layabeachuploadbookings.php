<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF File Upload and View </title>
    <link rel="icon" href="img/logo.jpg" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        .file-list { margin-top: 20px; }
        .file-list ul { list-style-type: none; padding: 0; }
        .file-list ul li { margin-bottom: 10px; }
        .file-list ul li a { text-decoration: none; color: #333; }
        .file-list ul li a:hover { text-decoration: underline; }
    </style>
</head>
<body>
<a href="layabeachadminpanel.php" class="btn btn-secondary mt-3">Back to Admin Panel</a>
    <div class="container mt-5">
        <h2 class="mb-4">Monthly Bookings Details</h2>
        
        <!-- File Upload Form -->
        <div class="card mb-4">
            <div class="card-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="file">Choose PDF File:</label>
                        <input type="file" class="form-control-file" id="file" name="file">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Upload PDF File</button>
                </form>
            </div>
        </div>
        
        <?php
        // Directory where uploaded PDF files will be stored
        $uploadDirectory = 'img/';
        
        // Check if the directory exists, create it if not
        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }
        
        // Handle file upload
        if ($_FILES && isset($_FILES['file'])) {
            $file = $_FILES['file'];
            $targetFilePath = $uploadDirectory . basename($file['name']);
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            
            // Check if the uploaded file is a PDF
            if (strtolower($fileType) == 'pdf') {
                if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                    echo '<div class="alert alert-success mt-3" role="alert">The PDF file ' . htmlspecialchars(basename($file['name'])) . ' has been uploaded.</div>';
                } else {
                    echo '<div class="alert alert-danger mt-3" role="alert">Sorry, there was an error uploading your PDF file.</div>';
                }
            } else {
                echo '<div class="alert alert-danger mt-3" role="alert">Only PDF files are allowed.</div>';
            }
        }
        
        // Handle file deletion
        if (isset($_GET['delete'])) {
            $fileToDelete = $_GET['delete'];
            $filePath = $uploadDirectory . $fileToDelete;
            
            // Check if file exists and delete it
            if (file_exists($filePath)) {
                if (unlink($filePath)) {
                    echo '<div class="alert alert-success mt-3" role="alert">File ' . $fileToDelete . ' has been deleted.</div>';
                } else {
                    echo '<div class="alert alert-danger mt-3" role="alert">Failed to delete file ' . $fileToDelete . '.</div>';
                }
            } else {
                echo '<div class="alert alert-danger mt-3" role="alert">File ' . $fileToDelete . ' does not exist.</div>';
            }
        }
        
        // Display uploaded PDF file list
        echo '<div class="file-list mt-4">';
        echo '<h3>Uploaded PDF Files:</h3>';
        echo '<ul class="list-group">';
        
        if (is_dir($uploadDirectory)) {
            if ($handle = opendir($uploadDirectory)) {
                while (($file = readdir($handle)) !== false) {
                    if (!in_array($file, array('.', '..'))) {
                        $filePath = $uploadDirectory . $file;
                        $fileType = pathinfo($filePath, PATHINFO_EXTENSION);
                        if (strtolower($fileType) == 'pdf') {
                            echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                            echo '<a href="' . $filePath . '">' . $file . '</a>';
                            echo '<a href="?delete=' . urlencode($file) . '" class="btn btn-danger btn-sm">Delete</a>';
                            echo '</li>';
                        }
                    }
                }
                closedir($handle);
            }
        } else {
            echo '<li class="list-group-item">No PDF files uploaded yet.</li>';
        }
        
        echo '</ul>';
        echo '</div>';
        ?>
        
        <!-- Back to Admin Panel Button -->
        
        
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
