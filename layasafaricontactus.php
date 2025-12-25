<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Initialize PHPMailer
$mail = new PHPMailer(true);

// Enable verbose debug output
$mail->SMTPDebug = 0; // Set to 2 for detailed debug output

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
    $mail->SMTPAuth = true;
    $mail->Username = 'layasafarifo@gmail.com'; // SMTP username
    $mail->Password = 'cmqyollcywaupilw'; // SMTP password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465; // TCP port to connect to

    // Sender info
    $mail->setFrom('layasafarifo@gmail.com', 'Laya Safari Contact Form');

    // Receiver info
    $mail->addAddress('layasafarifo@gmail.com', 'Recipient Name'); // Add a recipient

    // Content
    $mail->isHTML(true); // Set email format to HTML

    // Email subject
    $mail->Subject = 'New Message from Laya Safari Contact Form';

    // Email body
    $emailBody = '
        <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    line-height: 1.6;
                    background-color: #f0f0f0;
                    padding: 20px;
                }
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    background-color: #ffffff;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0,0,0,0.1);
                }
                h1 {
                    color: #333333;
                    text-align: center;
                }
                .message {
                    margin-top: 20px;
                    padding: 10px;
                    background-color: #f9f9f9;
                    border-left: 5px solid #3498db;
                }
                .footer {
                    margin-top: 20px;
                    text-align: center;
                    color: #999999;
                    font-size: 14px;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h1>New Message from Laya Safari Contact Form</h1>
                <div class="message">
                    <p><strong>Name:</strong> ' . $_POST['user'] . '</p>
                    <p><strong>Email:</strong> ' . $_POST['email'] . '</p>
                    <p><strong>Message:</strong></p>
                    <p>' . nl2br($_POST['message']) . '</p>
                </div>
                <div class="footer">
                    <p>This email was sent via Layahotels.lk Contact Form.</p>
                </div>
            </div>
        </body>
        </html>
    ';

    $mail->Body = $emailBody;

    // Send email
    if ($mail->send()) {
        $statusMessage = "Your message has been sent successfully!";
    } else {
        $statusMessage = "Failed to send message. Error: {$mail->ErrorInfo}";
    }
} catch (Exception $e) {
    $statusMessage = "Message could not be sent. Error: {$mail->ErrorInfo}";
}

// Display the status message as JavaScript alert and redirect
echo "<script>alert('{$statusMessage}'); window.location.href = 'layasafari.php';</script>";
?>
