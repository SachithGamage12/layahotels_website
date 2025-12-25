<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve general booking information
    $firstName = $_POST['first-name'] ?? '';
    $lastName = $_POST['last-name'] ?? '';
    $mobileNumber = $_POST['mobile-number'] ?? '';
    $checkinDate = $_POST['checkin-date'] ?? '';
    $checkoutDate = $_POST['checkout-date'] ?? '';
    $emailAddress = $_POST['email-address'] ?? '';

    // Retrieve selected rooms HTML
    $selectedRoomsHTML = $_POST['selected-rooms-html'] ?? '';

    // PHPMailer initialization
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->SMTPDebug = 0; // Disable verbose debug output
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true;
        $mail->Username = 'layawaves@gmail.com'; // SMTP username
        $mail->Password = 'mbqnkevanujntclv'; // SMTP password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Recipients
        $mail->setFrom('your_email@gmail.com', 'Laya Waves');
        $mail->addAddress('layawaves@gmail.com', 'Recipient Name'); // Add a recipient

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Room Booking Request From Layahotels.lk';

        // Email body with inline styles
        $emailBody = "
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; background-color: #f0f0f0; margin: 0; padding: 0; }
                    .email-container { max-width: 600px; margin: 0 auto; padding: 20px; background-color: #ffffff; border-radius: 10px; }
                    h2 { color: #E6EC33; text-align: center; background-color: #000000; }
                    p { margin-bottom: 10px; }
                    .room-details { padding: 10px; margin-bottom: 10px; background-color: #f9f9f9; border-radius: 5px; }
                    .footer-line { height: 2px; background-image: linear-gradient(to right, rgb(255, 0, 0), rgb(0, 128, 0), rgb(0, 0, 255)); margin-top: 20px; }
                    .form-data { font-size: 18px; }
                    .button { display: inline-block; padding: 10px 20px; font-size: 18px; color: #ffffff; background-color: #E6EC33; text-decoration: none; border-radius: 5px; }
                </style>
            </head>
            <body>
                <div class='email-container'>
                    <h2>New Booking Request</h2>
                    <p class='form-data'><strong>First Name:</strong> $firstName</p>
                    <p class='form-data'><strong>Last Name:</strong> $lastName</p>
                    <p class='form-data'><strong>Mobile Number:</strong> $mobileNumber</p>
                    <p class='form-data'><strong>Check-in Date:</strong> $checkinDate</p>
                    <p class='form-data'><strong>Check-out Date:</strong> $checkoutDate</p>
                    <p class='form-data'><strong>Email Address:</strong> $emailAddress</p>
                    <div class='footer-line'></div>
                    <h3>Selected Rooms</h3>
                    $selectedRoomsHTML
                    <div class='footer-line'></div>
                    <a href='https://www.layahotels.lk/layawavesconfirmation.php?email=<?php echo urlencode($emailAddress); ?>&first_name=<?php echo urlencode($firstName); ?>&last_name=<?php echo urlencode($lastName); ?>&mobile_number=<?php echo urlencode($mobileNumber); ?>&checkin_date=<?php echo urlencode($checkinDate); ?>&checkout_date=<?php echo urlencode($checkoutDate); ?>' class='button'>Confirm Reservation</a>

                </div>
            </body>
            </html>
        ";

        $mail->Body = $emailBody;

        // Send email
        $mail->send();
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<?php
// Database connection
include_once 'db_connect.php';

// Function to sanitize and validate input
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Clean and validate inputs
    $first_name = clean_input($_POST['first-name']);
    $last_name = clean_input($_POST['last-name']);
    $mobile_number = clean_input($_POST['mobile-number']);
    $checkin_date = clean_input($_POST['checkin-date']);
    $checkout_date = clean_input($_POST['checkout-date']);
    $email_address = clean_input($_POST['email-address']);
    $selected_rooms_html = $_POST['selected-rooms-html']; // Retrieve HTML formatted selected rooms

    // Prepare SQL query to insert data into the bookings table
    $sql = "INSERT INTO wavesbookings (first_name, last_name, mobile_number, checkin_date, checkout_date, email_address,selected_rooms_html)
            VALUES ('$first_name', '$last_name', '$mobile_number', '$checkin_date', '$checkout_date', '$email_address', '$selected_rooms_html')";

    // Execute SQL query
    if (mysqli_query($conn, $sql)) {
        echo '<script type="text/javascript">
            alert("Thank You For Choosing Us!.We Will Get Back You Soon");
            window.location.href = "layawaves.php";
        </script>';
    } else {
        // Handle SQL query error
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}
?>
