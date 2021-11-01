# EmailSender Library

[![Maintainer](http://img.shields.io/badge/maintainer-@rafansilva-blue.svg?style=flat-square)](https://github.com/rafansilva/)
[![Source Code](http://img.shields.io/badge/source-rafansilva/emailsender-blue.svg?style=flat-square)](https://github.com/rafansilva/emailsender)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/rafansilva/emailsender.svg?style=flat-square)](https://packagist.org/packages/rafansilva/emailsender)
[![Latest Version](https://img.shields.io/github/release/rafansilva/emailsender.svg?style=flat-square)](https://github.com/rafansilva/emailsender/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build](https://img.shields.io/scrutinizer/build/g/rafansilva/emailsender.svg?style=flat-square)](https://scrutinizer-ci.com/g/rafansilva/emailsender)
[![Quality Score](https://img.shields.io/scrutinizer/g/rafansilva/emailsender.svg?style=flat-square)](https://scrutinizer-ci.com/g/rafansilva/emailsender)
[![Total Downloads](https://img.shields.io/packagist/dt/rafansilva/emailsender.svg?style=flat-square)](https://packagist.org/packages/rafansilva/emailsender)

###### EmailSender is a class that abstracts the behavior of the PhpMailer component, and simplifies the sending of emails via SMTP.

EmailSender é uma classe que abstrai o comportamento do componente PHPMailer, e simplifica o envio de e-mails via SMTP.

### Highlights

- Simple installation (Instalação simples)
- Simplified initial setup (Configuração inicial simplificada)
- Simple methods for sending emails and attachments (Métodos simples para envio de e-mails e anexos)
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

#### Setup to send an email:

```php
<?php

/**
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
```
#### Example of sending email and attachments:

```php
<?php

require __DIR__ . '/../vendor/autoload.php';

use RafaNSilva\Support\Email;

$mail = new Email();

$mail->bootstrap(
    "Example of sending email",
    "<h1>This is the HTML message body</h1>",
    "joe@example.net",
    "Joe User"
)->send();

$mail->bootstrap(
    "Email with Attachments",
    "<p>See the attachment below</p>",
    "joe@example.net",
    "Joe User"
)->attach(__DIR__ . "/image/joinha.jpg", "Joinha")->send();
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
