<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoloader
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Instantiate PHPMailer
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';  // Gmail SMTP server
        $mail->SMTPAuth   = true;               // Enable SMTP authentication
        $mail->Username   = 'folayabeach@gmail.com';  // Your Gmail email address
        $mail->Password   = 'dfhtjwxnplcjposf';  // Your Gmail app password
        $mail->SMTPSecure = 'ssl';              // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 465;                // TCP port to connect to

        //Recipients
        $mail->setFrom($_POST['email'], $_POST['firstName'] . ' ' . $_POST['lastName']);
        $mail->addAddress('folayabeach@gmail.com'); // Add a recipient

        // Content
        $mail->isHTML(false); // Set email format to plain text
        $mail->Subject = 'From Laya Beach Website';
        $mail->Body    = " {$_POST['firstName']}\n" .
                         "{$_POST['lastName']}\n" .
                         "{$_POST['email']}\n" .
                         "{$_POST['mobile']}\n" .
                         "{$_POST['message']}\n";

        // Send email
        $mail->send();
        echo 'Email sent successfully!';
    } catch (Exception $e) {
        echo "Failed to send email. Error: {$mail->ErrorInfo}";
    }
}
?>

<!--	