<?php

require __DIR__ . "/vendor/autoload.php";

use Source\App\Email;

$send = new Email();

$send->sendMail(
    "Assunto de Teste",
    "<p>Esse é um e-mail de <b>teste</b>!</p>",
    "rafaelnascimento0505@gmail.com",
    "Equipe RADelivery",
    "rafael_nascimento@aol.com",
    "Rafael"
);


var_dump($send);

