<?php


namespace Source\App;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email
{
    private $mail = \stdClass::class;

    public function __construct($smtpDebug, $host, $user, $pass, $smtpSecure, $port, $setFromEmail, $setFromName)
    {
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = $smtpDebug;
        $this->mail->isSMTP();
        $this->mail->Host = $host;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $user;
        $this->mail->Password = $pass;
        $this->mail->SMTPSecure = $smtpSecure;
        $this->mail->Port = $port;

        $this->mail->CharSet = "utf-8";
        $this->mail->setLanguage("br");

        $this->mail->isHTML(true);
        $this->mail->setFrom($setFromEmail, $setFromName);


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