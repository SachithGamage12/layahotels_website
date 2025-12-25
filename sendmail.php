<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoloader
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $countryCode = $_POST['countryCode'];
    $phoneNumber = $_POST['phoneNumber'];
    $checkinDate = $_POST['checkinDate'];
    $checkoutDate = $_POST['checkoutDate'];
    $roomCategory = $_POST['roomCategory'];
    $selectBasis = $_POST['selectBasis'];
    $adults = $_POST['adults'];
    $kids = $_POST['kids'];
    $email = $_POST['email'];
    $designation = $_POST['designation'];
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';  // Gmail SMTP server
        $mail->SMTPAuth   = true;               // Enable SMTP authentication
        $mail->Username   = 'folayabeach@gmail.com';  // Your Gmail email address
        $mail->Password   = 'vklmfarczeaowzty';  // Your Gmail app password
        $mail->SMTPSecure = 'ssl';              // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 465;                // TCP port to connect to

        //Recipients
        $mail->setFrom($_POST['firstName'], $_POST['lastName'] . ' ' . $_POST['designation']);
        $mail->addAddress('folayabeach@gmail.com'); // Add a recipient

        // Content
        $mail->isHTML(false); // Set email format to plain text
        $subject = 'New Booking Request';
    $message = "First Name: $firstName\nLast Name: $lastName\nCountry Code: $countryCode\nPhone Number: $phoneNumber\nCheck-in Date: $checkinDate\nCheck-out Date: $checkoutDate\nRoom Category: $roomCategory\nSelect Basis: $selectBasis\nAdults: $adults\nKids: $kids\nEmail: $email\nDesignation: $designation";
    $headers = 'From: noreply@yourdomain.com' . "\r\n" .
               'Reply-To: noreply@yourdomain.com' . "\r\n" .

        // Send email
        $mail->send();
        echo 'Email sent successfully!';
    } catch (Exception $e) {
        echo "Failed to send email. Error: {$mail->ErrorInfo}";
    }
}
?>



