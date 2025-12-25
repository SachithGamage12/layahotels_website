<?php
include 'db_connect.php';

if (isset($_POST['submit'])) {
    $videoName = $_FILES['video']['name'];
    $targetDir = "uploads/";
    $targetFilePath = $targetDir . basename($videoName);
    
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $allowedTypes = array('mp4', 'webm', 'ogg');
    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES['video']['tmp_name'], $targetFilePath)) {
            $insert = $conn->query("INSERT INTO safarivideos (video_name, video_path) VALUES ('$videoName', '$targetFilePath')");
            if ($insert) {
                echo "<script>alert('The video has been uploaded successfully.'); window.location.href='layasafariadminpanel.php';</script>";
            } else {
                echo "<script>alert('Video upload failed, please try again.'); window.location.href='layasafariadminpanel.php';</script>";
            }
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.'); window.location.href='layasafariadminpanel.php';</script>";
        }
    } else {
        echo "<script>alert('Sorry, only MP4, WEBM, & OGG files are allowed.'); window.location.href='layasafariadminpanel.php';</script>";
    }
}
?>
