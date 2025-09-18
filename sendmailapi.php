<?php

require 'PHPMailer/src/PHPMailer.php'; // Adjust path if necessary
require 'PHPMailer/src/SMTP.php'; // Adjust path if necessary
require 'PHPMailer/src/Exception.php'; // Adjust path if necessary

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



<<<<<<< HEAD
//b//
// test conflict
=======
//b
>>>>>>> parent of 0bc5da1... add comment main
// Set content type to JSON
header('Content-Type: application/json');

// Function to send email
function sendEmail($to, $subject, $message, $attachment = null) {
    $mail = new PHPMailer(true); // Enable exceptions
    // die(var_dump([$to, $subject, $message]));
    try {
        $mail->isSMTP(); // Use SMTP
        $mail->SMTPDebug = 2; // Set to 2 for detailed debug output
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->SMTPSecure = 'ssl'; // Use SSL
        $mail->Host = 'hostyourdomain.com'; //  SMTP server
        $mail->Port = 465; //  SMTP port
        $mail->Username = 'no-reply@yourdomain.com'; // Your  address
        $mail->Password = 'yourpassword'; // Your app password

        $mail->setFrom('no-reply@yourdomains.com', 'no-reply@yourdomains.com'); // Sender
        $mail->addAddress($to); // Recipient

        $mail->Subject = $subject;
        $mail->AltBody = 'To view the message, please use an HTML compatible email viewer! ';
        $mail->isHTML(true); // Set email format to HTML

        $htmlContent = $message;

        $mail->Body = $htmlContent; // HTML body content

        // Handle attachment
        if (!empty($attachment)) {
            foreach ($attachment as $file_name => $sourcefile) {
                // $CI->email->attach($sourcefile, 'attachment', $file_name);
                // $mail->addAttachment($sourcefile,$file_name);
                $mail->addStringAttachment(file_get_contents($sourcefile), $file_name);
            }
        }

        $mail->send();
        return ['success' => true, 'message' => 'Email sent successfully'];
    } catch (Exception $e) {
        return ['success' => false, 'message' => 'Email sending failed: ' . $mail->ErrorInfo];
    }
}

// Handle POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get JSON input
    $input = json_decode(file_get_contents('php://input'), true);
    if (isset($input['to'], $input['subject'], $input['message'])) {
        $attachment = isset($input['attachment']) ? $input['attachment'] : null;
        $response = sendEmail($input['to'], $input['subject'], $input['message'],$attachment);
    } else {
        $response = ['success' => false, 'message' => 'Missing required fields'];
    }
} else {
    $response = ['success' => false, 'message' => 'Invalid request method'];
}

// Send JSON response
echo json_encode($response);
?>
