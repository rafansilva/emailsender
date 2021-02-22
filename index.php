<?php

require __DIR__ . "/vendor/autoload.php";

use Source\App\Email;

$send = new Email();

$send->sendMail(
    "Subject Test",
    "<p>Body e-mail <b>here</b>!</p>",
    "support@email.com",
    "Support",
    "client@email.com",
    "Name Client"
);


var_dump($send);

