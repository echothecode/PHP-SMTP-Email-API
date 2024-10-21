1. A Simple PHP function to send SMTP E-mail Using PHP API from a server to another server with attachment using file_get_contents full url source file.
2. Required PHPMailer PHP Library.
3. Sample using :-

    $attachment['file_name_one'] = 'http://sample-url.com.file_path_one.ext';
   
    $attachment['file_name_two'] = 'http://sample-url.com.file_path_one.ext';
   
    sendMail('receiver@testdomain.com', 'Send SMTP Mail', 'Sample E-mail Content', $attachment);
