<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['send_email'])) {
    // Sanitize inputs (not shown here, ensure to sanitize and validate input)
    $guest_email = $_POST['guest_email'];
    $sender_email = $_POST['sender_email'];
    $booking_id = $_POST['booking_id'];
    $confirmation_message = $_POST['confirmation_message'];
    $highlighted_notes = $_POST['highlighted_notes'];

    // Initialize PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true;
        $mail->Username = 'noreply2457892@gmail.com'; // SMTP username
        $mail->Password = 'eeossbmghgwgvgvi'; // SMTP password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Recipients
        $mail->setFrom($sender_email, 'Laya Leisure Hotel');
        $mail->addAddress($guest_email); // Add a recipient

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Booking Confirmation - Laya Leisure Hotel';

        // Construct email body
        $email_body = "
            <html>
            <head>
                <style>
                    body {
                        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                        background-color: #f4f7f6;
                        color: #333;
                        margin: 0;
                        padding: 0;
                    }
                    .container {
                        max-width: 600px;
                        margin: 20px auto;
                        background-color: #fff;
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0,0,0,0.1);
                        overflow: hidden;
                    }
                    .header {
                        background-color: #7F00FF;
                        color: #fff;
                        text-align: center;
                        padding: 15px 0;
                    }
                    .content {
                        padding: 20px;
                    }
                    h2 {
                        color: #4CAF50;
                        font-size: 24px;
                        margin-bottom: 10px;
                    }
                    p {
                        margin-bottom: 15px;
                    }
                    .footer {
                        background-color: #333;
                        color: #fff;
                        text-align: center;
                        padding: 10px 0;
                        font-size: 12px;
                    }
                    .footer img {
                        max-width: 100px;
                        height: auto;
                    }
                    .highlighted {
                        background-color: yellow;
                        color: red;
                        font-weight: bold;
                        padding: 5px;
                        margin-bottom: 10px;
                    }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <h1>Laya Leisure Hotel</h1>
                    </div>
                    <div class='content'>
                        <h2>Booking Confirmation</h2>
                        
                        <p>" . nl2br(htmlspecialchars($confirmation_message)) . "</p>
                        <div class='highlighted'>" . nl2br(htmlspecialchars($highlighted_notes)) . "</div>
                        <p>Thank you for choosing Laya Leisure Hotel. We look forward to welcoming you!</p>
                    </div>
                    <div class='footer'>
                        <p>&copy; " . date('Y') . " Laya Leisure Hotel. All rights reserved.</p>
                    </div>
                </div>
            </body>
            </html>
        ";

        $mail->Body = $email_body;

        // Send email
        $mail->send();
        // Redirect to layawavesadimpanel.php after displaying the success message
        echo "<script>
                alert('Confirmation email sent successfully to $guest_email.');
                window.location.href = 'layaleisureadimpanel.php';
              </script>";
        exit; // Make sure to exit to prevent further execution
    } catch (Exception $e) {
        echo "<div class='alert alert-danger' role='alert'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
    }
}
?>
