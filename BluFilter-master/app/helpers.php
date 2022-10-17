<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//send email
if (!function_exists('send_php_email')) {
    function send_php_email($emails, $subject, $body, $isContactUs, $replyTo = null, $replyToName = null)
    {
        $mail = new PHPMailer(true);

        $mail->isMail();
        $mail->Host       = env('MAIL_HOST');
        $mail->SMTPAuth   = true;
        $mail->Username   = env('MAIL_USERNAME');
        $mail->Password   = env('MAIL_PASSWORD');
        $mail->Port       = env('MAIL_PORT');

        if ($isContactUs) {
            $from = env('MAIL_FROM_ADDRESS');
            $fromName = env('MAIL_FROM_NAME');

            $mail->setFrom($from, $fromName);
        } else
            $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $mail->addAddress($emails);

        // if (count($emails) > 0) {
        //     foreach ($emails as $email) {
        //         $mail->addAddress($email);
        //     }
        // }
        if (!empty($replyTo))
            $mail->addReplyTo($replyTo, $replyToName);
        //Content
        $mail->isHTML(true);
        $mail->Subject =  $subject;
        $mail->Body    = $body;
        $mail->send();
    }
}
