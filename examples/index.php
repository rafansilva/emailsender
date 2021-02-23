<?php

require __DIR__ . "/../vendor/autoload.php";

use Source\App\Email;

$send = new Email(
    2,
    "smtp.example.com",
    "user@example.com",
    "secret",
    "tls",
    "587",
    "from@example.com",
    "Mailer"
);

$send->sendMail(
    "Here is the subject",
    "This is the HTML message body <b>in bold!</b>",
    "info@example.com",
    "Information",
    "joe@example.net",
    "Joe User"
);


var_dump($send);

