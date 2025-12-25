<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $jobTitle = $_POST['jobTitle'];
    $to = 'udarasachith41@gmail.com';
    $subject = "Application for $jobTitle";

    // Validate file upload
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['cv']['tmp_name'];
        $fileName = $_FILES['cv']['name'];
        $fileSize = $_FILES['cv']['size'];
        $fileType = $_FILES['cv']['type'];

        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 0; // Disable verbose debug output
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
            $mail->SMTPAuth = true;
            $mail->Username = 'sachithgamage2310@gmail.com'; // SMTP username
            $mail->Password = 'lnsierkwlpzxfnol'; // SMTP password
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            // Recipients
            $mail->setFrom('sachithgamage2310@gmail.com', 'New Job Request');
            $mail->addAddress($to);

            // Attachments
            $mail->addAttachment($fileTmpPath, $fileName);

            // Content
            $mail->isHTML(false);
            $mail->Subject = $subject;
            $mail->Body    = "Application for $jobTitle";

            $mail->send();
            echo "CV sent successfully!";
        } catch (Exception $e) {
            echo "Failed to send CV. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "No file uploaded or there was an upload error.";
    }
} else {
    echo "Invalid request.";
}
?>
