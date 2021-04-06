<?php


namespace RafaNSilva\Support;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Class Email
 *
 * @author Rafael N. Silva
 * @package RafaNSilva\Support
 */
class Email
{
    /** @var \stdClass */
    private $data;

    /** @var PHPMailer */
    private $mail;

    /** @var Exception */
    private $error;


    /**
     * Email constructor.
     */
    public function __construct()
    {
        $this->data = new \stdClass();
        $this->mail = new PHPMailer(true);

        //setup
        $this->mail->SMTPDebug = CONF_MAIL_OPTION_DEBUG;
        $this->mail->isSMTP();
        $this->mail->setLanguage(CONF_MAIL_OPTION_LANG);
        $this->mail->isHTML(CONF_MAIL_OPTION_HTML);
        $this->mail->SMTPAuth = CONF_MAIL_OPTION_AUTH;
        $this->mail->SMTPSecure = CONF_MAIL_OPTION_SECURE;
        $this->mail->CharSet = CONF_MAIL_OPTION_CHARSET;

        //auth
        $this->mail->Host = CONF_MAIL_HOST;
        $this->mail->Port = CONF_MAIL_PORT;
        $this->mail->Username = CONF_MAIL_USER;
        $this->mail->Password = CONF_MAIL_PASS;
    }

    /**
     * @param string $subject
     * @param string $body
     * @param string $recipientMail
     * @param string $recipientName
     * @return $this
     */
    public function bootstrap(string $subject, string $body, string $recipientMail, string $recipientName): Email
    {
        $this->data->subject = $subject;
        $this->data->body = $body;
        $this->data->recipientMail = $recipientMail;
        $this->data->recipientName = $recipientName;
        return $this;
    }


    /**
     * @param string $filePath
     * @param string $fileName
     * @return $this
     */
    public function attach(string $filePath, string $fileName): Email
    {
        $this->data->attach[$filePath] = $fileName;
        return $this;
    }


    /**
     * @param string $from
     * @param string $fromName
     * @return bool
     * @throws \Exception
     */
    public function send(string $from = CONF_MAIL_SENDER["address"], string $fromName = CONF_MAIL_SENDER["name"]): bool
    {
        try {
            if (empty($this->data)) {
                throw new Exception("Error sending, please check the data");
            }

            if (!filter_var($this->data->recipientMail, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Recipient email is not valid");
            }

            if (!filter_var($from, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("The sender email is not valid");
            }

            $this->mail->Subject = $this->data->subject;
            $this->mail->msgHTML($this->data->body);
            $this->mail->addAddress($this->data->recipientMail, $this->data->recipientName);
            $this->mail->setFrom($from, $fromName);

            if (!empty($this->data->attach)) {
                foreach ($this->data->attach as $path => $name) {
                    $this->mail->addAttachment($path, $name);
                }
            }

            $this->mail->send();
            return true;
        } catch (Exception $exception) {
            $this->error = $exception;
            return false;
        }
    }

    /**
     * @return PHPMailer
     */
    public function mail(): PHPMailer
    {
        return $this->mail;
    }

    /**
     * @return Exception|null
     */
    public function error(): ?Exception
    {
        return $this->error;
    }
}