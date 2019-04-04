<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

class Mail
{
    public static function send($from, $to, $subject, $body, $attachments=[]) 
    {
        global $app;
        
        $c = $app->getContainer();
        $mail_conf = $c->get('settings')['mail'];
        
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = $mail_conf['smtp'];                     // Specify main and backup SMTP servers
            $mail->SMTPAuth   = $mail_conf['auth'];                     // Enable SMTP authentication
            $mail->Username   = $mail_conf['username'];                 // SMTP username
            $mail->Password   = $mail_conf['password'];                 // SMTP password
            $mail->SMTPSecure = $mail_conf['secure'];                   // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = $mail_conf['port'];                     // TCP port to connect to
            
            //Recipients
            $mail->setFrom($mail_conf['from'], 'Flatyou');
            if(is_string($to))
            {
                $mail->addAddress($to);
            }
            elseif(is_array($to))
            {
                foreach($to as $t)
                {
                    $mail->addAddress($t);               // Name is optional
                }
            }
            
            if(is_array($attachments) && !empty($attachments))
            {
                foreach($attachments as $a)
                {
                    $mail->addAttachment($a);
                }
            }
            $mail->isHTML(true);                              
            $mail->Subject = $subject;
            $mail->Body    = $body;

            $mail->send();
            return true;
        } 
        catch (Exception $e) 
        {
            return array('error'=>$mail->ErrorInfo);
        }
    }
}