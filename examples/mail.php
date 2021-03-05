<?php

require __DIR__ . '/../vendor/autoload.php';

/**
 * Setup to send an email
 * TIP: Put these constants in your project's config file.
 */
define("CONF_MAIL_HOST", "smtp.example.com"); //Set the SMTP server to send through
define("CONF_MAIL_PORT", 587); //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS`
define("CONF_MAIL_USER", "user@example.com"); //SMTP username
define("CONF_MAIL_PASS", "password"); //SMTP password
define("CONF_MAIL_SENDER", ["name" => "yourName", "address" => "your@email.com"]); //Change here the name and email of who will send the email
define("CONF_MAIL_OPTION_DEBUG", 0); //To enable verbose debug output use 2 or 0 to disable
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
    "joe@example.net",
    "Joe User"
)->send();

/**
 * Email with Attachments:
 */

$mail->bootstrap(
    "Email with Attachments",
    "<p>See the attachment below</p>",
    "joe@example.net",
    "Joe User"
)->attach(__DIR__ . "/image/joinha.jpg", "Joinha")->send();