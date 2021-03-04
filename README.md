# CaféApi Library Test

[![Maintainer](http://img.shields.io/badge/maintainer-_rafanas_-blue.svg?style=flat-square)](https://www.instagram.com/_rafanas_/)
[![Source Code](http://img.shields.io/badge/source-rafansilva/emailsender-blue.svg?style=flat-square)](https://github.com/rafansilva/emailsender)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/rafansilva/emailsender.svg?style=flat-square)](https://packagist.org/packages/rafansilva/emailsender)
[![Latest Version](https://img.shields.io/github/release/rafansilva/emailsender.svg?style=flat-square)](https://github.com/rafansilva/emailsender/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build](https://img.shields.io/scrutinizer/build/g/rafansilva/emailsender.svg?style=flat-square)](https://scrutinizer-ci.com/g/rafansilva/emailsender)
[![Quality Score](https://img.shields.io/scrutinizer/g/rafansilva/emailsender.svg?style=flat-square)](https://scrutinizer-ci.com/g/rafansilva/emailsender)
[![Total Downloads](https://img.shields.io/packagist/dt/rafansilva/emailsender.svg?style=flat-square)](https://packagist.org/packages/rafansilva/emailsender)

###### EmailSender is a class that abstracts the behavior of the PhpMailer component, and simplifies the sending of emails via SMTP.

EmailSender é uma classe que abstrai o comportamento do componente PhpMailer, e simplifica o envio de e-mails via SMTP.

### Highlights

- Simple installation (Instalação simples)
- Simplified initial setup (Configuração inicial simplificada)
- Friendly methods for sending emails and attachments (Métodos amigaveis para envio de e-mails e anexos)
- Composer ready and PSR-2 compliant (Pronto para o composer e compatível com PSR-2)

## Installation

Uploader is available via Composer:

```bash
"rafansilva/emailsender": "^1.0"
```

or run

```bash
composer require rafansilva/emailsender
```

## Documentation

###### For details on how to use, see a sample folder in the component directory. In it you will have an example of use for each class. It works like this:

Para mais detalhes sobre como usar, veja uma pasta de exemplo no diretório do componente. Nela terá um exemplo de uso da classe. Ele funciona assim:

#### User endpoint:

```php
<?php

require __DIR__ . "/../vendor/autoload.php";

use rafansilva\emailsender\Me;

$me = new Me(
    "suaapi.url.com",
    "seu@email.com.br",
    "suasenha"
);

//me
$user = $me->me();

//update
$user->update([
    "first_name" => "Robson",
    "last_name" => "Leite",
    "genre" => "male",
    "datebirth" => "1980-01-02",
    "document" => "888888888"
]);

//photo
$user->photo($_FILES["photo"]);

//test and result
if ($user->error()) {
    $user->error(); //object
} else {
    $user->response(); //object
}
```

## Contributing

Please see [CONTRIBUTING](https://github.com/rafansilva/emailsender/blob/master/CONTRIBUTING.md) for details.

## Support

###### Security: If you discover any security related issues, please email rafaelnascimento0505@gmail.com instead of using the issue tracker.

Se você descobrir algum problema relacionado à segurança, envie um e-mail para rafaelnascimento0505@gmail.com em vez de usar o rastreador de problemas.

Thank you

## Credits

- [Rafael N. Silva](https://github.com/rafansilva) (Developer)
- [All Contributors](https://github.com/rafansilva/emailsender/contributors) (This Rock)

## License

The MIT License (MIT). Please see [License File](https://github.com/rafansilva/emailsender/blob/master/LICENSE) for more information.