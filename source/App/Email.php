<?php


namespace Source\App;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email
{
    private $mail = \stdClass::class;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = 2;                      //Enable verbose debug output
        $this->mail->isSMTP();                                            //Send using SMTP
        $this->mail->Host = 'smtp.sendgrid.net';                     //Set the SMTP server to send through
        $this->mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $this->mail->Username = 'apikey';                     //SMTP username
        $this->mail->Password = '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';                               //SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $this->mail->Port = 587;

        $this->mail->CharSet = "utf-8";
        $this->mail->setLanguage("br");

        $this->mail->isHTML(true);
        $this->mail->setFrom("rafaelnascimento0505@gmail.com", "Equipe RADelivery");


    }

    public function sendMail(string $subject, string $body, string $replyEmail, string $replyName, string $addressEmail, string $addressName)
    {
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;

        $this->mail->addReplyTo($replyEmail, $replyName);
        $this->mail->addAddress($addressEmail, $addressName);

        try {
            $this->mail->send();
        } catch (\Exception $exception) {
            echo "Erro ao enviar o e-mail: {$this->mail->ErrorInfo} {$exception->getMessage()}";
        }
    }
}