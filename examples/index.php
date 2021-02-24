<?php

require __DIR__ . '/../vendor/autoload.php';

use RafaNSilva\Notification\Email;

$email = new Email(
    2,
    "mail.host.com",
    "your@email.com",
    "your-pass",
    "smtp secure (tls/ssl)",
    "port (587)",
    "from@email.com",
    "FromName"
);

$email->sendMail(
    "Subject",
    "Content",
    "reply@email.com",
    "Replay Name",
    "address@email.com",
    "AddressName"
);


var_dump($email);

