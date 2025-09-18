<?php

	function sendMail($to, $subject, $message, $attachment = array())
    {

        $htmlContent = $message;
        $htmlContent .= '
            <p>&nbsp; </p>
            <p>&nbsp;</p>
            <p style="font-size:10px;text-align: justify;"><em>DISCLAIMER: The contents of this email and its attachment, if any ("message") are intended for the named addressee only and may contain privileged and/or confidential information. If you are not the named addressee or if you have inadvertently receive this message, you should immediately destroy or delete this message and notify the sender by return e-mail. E-ACC disclaims all liabilities for any error, loss or damage arising from this message being infected by computer virus or other contamination. All opinions, conclusions and other information in this message that do not relate to the official business of System shall be deemed as neither given nor endorsed by System.</em></p>';

        $data = [
            'to' => $to,
            'subject' => $subject,
            'message' => $htmlContent,
            'attachment' => $attachment
        ];

        $options = [
            'http' => [
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($data)
            ]
        ];

        $context  = stream_context_create($options);
        $result = file_get_contents('http://yourdomain.com/sendmailapi.php', false, $context);

        if ($result === FALSE) {
            // Handle error
        }

        return $result;
        
    }
