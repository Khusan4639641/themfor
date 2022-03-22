<?php
namespace App\services;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Mailer
{
    public $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
    }

    public function sendMail($header,$body,$to,$files=null)
    {
            //Server settings
            $this->mail->isSMTP();                                            //Send using SMTP
            $this->mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $this->mail->Username   = GMAIL;                     //SMTP username
            $this->mail->Password   = GMAIL_PASS;                               //SMTP password

            $this->mail->SMTPSecure = 'tls';
            $this->mail->Port = 587;
            $this->mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            if(!empty($files) && isset($files) && $files!=null){
                $files = json_decode($files);
                foreach ($files as $file){
                    $this->mail->addAttachment("web/uploads/".$file);    //Optional name
                }
            }
            //Recipients
            $this->mail->setFrom(GMAIL, USER);
            $this->mail->addAddress($to);               //Name is optional
            //Content
            $this->mail->isHTML(true);                                  //Set email format to HTML
            $this->mail->Subject = $header;
            $this->mail->Body    = $body;
//            without html tags
            $this->mail->AltBody = strip_tags($body);
            $this->mail->send();
    }

}