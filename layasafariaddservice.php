<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $target = "layasafariimages/" . basename($image);

    $sql = "INSERT INTO safariservices (image_url, description) VALUES ('$target', '$description')";

    if ($conn->query($sql) === TRUE) {
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        echo "New service added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
