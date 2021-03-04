<?php

require __DIR__ . '/../vendor/autoload.php';

/**
 * Setup to send an email
 */
define("CONF_MAIL_HOST", "smtp.sendgrid.net"); //Set the SMTP server to send through
define("CONF_MAIL_PORT", "587"); //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS`
define("CONF_MAIL_USER", "apikey"); //SMTP username
define("CONF_MAIL_PASS", "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"); //SMTP password
define("CONF_MAIL_SENDER", ["name" => "Rafael N. Silva", "address" => "rafaelnascimento0505@gmail.com"]); //Change here the name and email of who will send the email
define("CONF_MAIL_OPTION_DEBUG", 2); //To enable verbose debug output use 2 or 0 to disable
define("CONF_MAIL_OPTION_LANG", "br"); //Your language
define("CONF_MAIL_OPTION_HTML", true); //Set email format to HTML
define("CONF_MAIL_OPTION_AUTH", true); //Enable SMTP authentication
define("CONF_MAIL_OPTION_SECURE", "tls"); //Enable TLS encryption
define("CONF_MAIL_OPTION_CHARSET", "utf-8"); //Default charset is utf-8


/*
 * Example of sending email:
 */

use RafaNSilva\Notification\Email;

$mail = new Email();

$mail->bootstrap(
    "Example of sending email",
    "<h1>This is the HTML message body</h1>",
    "rafael_nascimento@aol.com",
    "Rafael"
)->send();

/**
 * Email with Attachments:
 */

$mail->bootstrap(
    "Email with Attachments",
    "<p>See the attachment below</p>",
    "rafael_nascimento@aol.com",
    "Rafael"
)->attach(__DIR__ . "/image/joinha.jpg", "Joinha")->send();

var_dump($mail);