<?php
require 'PHPMailer/src/PHPMailer.php'; // Adjust path if necessary
require 'PHPMailer/src/SMTP.php'; // Adjust path if necessary
require 'PHPMailer/src/Exception.php'; // Adjust path if necessary

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
        $mail->Host = 'hostyourdom $htmlContent = $message;
        $htmlContent .= '
            <p>&nbsp; </p>
            <p>&nbsp;</p>
            <p style="font-size:10px;text-align: justify;"><em>DISCLAIMER: The contents of this email and its attachment, if any ("message") are intended for the named addressee only and may contain privileged and/or confidential information. If you are not the named addressee or if you have inadvertently receive this message, you should immediately destroy or delete this message and notify the sender by return e-mail. E-ACC disclaims all liabilities for any error, loss or damage arising from this message being infected by computer virus or other contamination. All opinions, conclusions and other information in this message that do not relate to the official business of System shall be deemed as neither given nor endorsed by System.</em></p>';
ain.com'; //  SMTP server
        $mail->Port = 465; //  SMTP port
        $mail->Username = 'no-reply@yourdomain.com'; // Your  address
        $mail->Password = 'yourpassword'; // Your app password

        $mail->setFrom('no-reply@yourdomains.com', 'no-reply@yourdomains.com'); // Sender
        $mail->addAddress($to); // Recipient

        $mail->Subject = $subject;
        $mail->AltBo $htmlContent = $message;
        $htmlContent .= '
            <p>&nbsp; </p>
            <p>&nbsp;</p>
            <p style="font-size:10px;text-align: justify;"><em>DISCLAIMER: The contents of this email and its attachment, if any ("message") are intended for the named addressee only and may contain privileged and/or confidential information. If you are not the named addressee or if you have inadvertently receive this message, you should immediately destroy or delete this message and notify the sender by return e-mail. E-ACC disclaims all liabilities for any error, loss or damage arising from this message being infected by computer virus or other contamination. All opinions, conclusions and other information in this message that do not relate to the official business of System shall be deemed as neither given nor endorsed by System.</em></p>';
dy = 'To view the message, please use an HTML compatible email viewer! ';
        $mail->isHTML(true); // Set email format to HTML

        $htmlContent = $message;

        $mail->Body = $htmlContent; // HTML body content

        // Handle attachment
        if (!empty($at $htmlContent = $message;
        $htmlContent .= '
            <p>&nbsp; </p>
            <p>&nbsp;</p>
            <p style="font-size:10px;text-align: justify;"><em>DISCLAIMER: The contents of this email and its attachment, if any ("message") are intended for the named addressee only and may contain privileged and/or confidential information. If you are not the named addressee or if you have inadvertently receive this message, you should immediately destroy or delete this message and notify the sender by return e-mail. E-ACC disclaims all liabilities for any error, loss or damage arising from this message being infected by computer virus or other contamination. All opinions, conclusions and other information in this message that do not relate to the official business of System shall be deemed as neither given nor endorsed by System.</em></p>';
tachment)) {
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
        $attachment = isset($in $htmlContent = $message;
        $htmlContent .= '
            <p>&nbsp; </p>
            <p>&nbsp;</p>
            <p style="font-size:10px;text-align: justify;"><em>DISCLAIMER: The contents of this email and its attachment, if any ("message") are intended for the named addressee only and may contain privileged and/or confidential information. If you are not the named addressee or if you have inadvertently receive this message, you should immediately destroy or delete this message and notify the sender by return e-mail. E-ACC disclaims all liabilities for any error, loss or damage arising from this message being infected by computer virus or other contamination. All opinions, conclusions and other information in this message that do not relate to the official business of System shall be deemed as neither given nor endorsed by System.</em></p>';
put['attachment']) ? $input['attachment'] : null;
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
