<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path to autoload.php based on your project

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assign POST data to variables
    $contactname = $_POST['contactname'] ?? '';
    $contactmail = $_POST['contactmail'] ?? '';
    $contactmessage = $_POST['contactmessage'] ?? '';

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings for Gmail SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'arunahospitalkakinada2023@gmail.com'; // Your Gmail email address
        $mail->Password = 'qialhzzlxuhtvvce'; // Your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('arunahospitalkakinada2023@gmail.com', 'Couple Clinic'); // Your Gmail email and name
        $mail->addAddress('arunahospitalkakinada2023@gmail.com', 'Couple Clinic'); // Recipient's email and name

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Message from Contact Form';
        $mail->Body = "
            <h1>New Message</h1>
            <p><strong>Name:</strong> $contactname</p>
            <p><strong>Mail:</strong> $contactmail</p>
            <p><strong>Message:</strong><br>$contactmessage</p>
        ";

        $mail->send();
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Successfully Submitted')
        window.location.href='contact.html';
        </SCRIPT>");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    // If accessed directly without POST data
    echo 'Access Denied';
}
