VirCom ePUAP2 Readme
=========

[![Build Status](https://travis-ci.org/VirCom/ePUAP2.svg?branch=master)](https://travis-ci.org/VirCom/ePUAP2)

VirCom ePUAP2 is a PHP library that makes it easy to communicate with ePUAP2 platform.
* Generating URL's for login and logout actions with ePUAP2 platform


## Installation
The recommended way to install VirCom ePUAP2 library is through [Composer](http://getcomposer.org/).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Next, you should run command below, to install the latest stable version of package:

```bash
composer.phar require VirCom/ePUAP2
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

## Authentication URL generators

This section delivers examples of usage URL generator methods.

**Login code example:**
```php
require_once('..\vendor\autoload.php');

use VirCom\ePUAP2\AuthenticationFactory;
use VirCom\ePUAP2\Requests\Login;

$factory = new AuthenticationFactory();
$service = $factory->createService();

$url = $service->getLoginUrl(
    new Login(
        'https://hetmantest.epuap.gov.pl/DracoEngine2/draco.jsf',
        'http://your.application.url',
        '/your.application.id'
    )
);

header('Location: ' . $url);
exit();
```

**Logout code example:**
```php
require_once('..\vendor\autoload.php');

use VirCom\ePUAP2\AuthenticationFactory;
use VirCom\ePUAP2\Requests\Login;

$factory = new AuthenticationFactory();
$service = $factory->createService();

$url = $service->getLogoutUrl(
    new Logout(
        'https://hetmantest.epuap.gov.pl/DracoEngine2/draco.jsf',
        'your.username',
        '/your.application.id'
    )
);

header('Location: ' . $url);
exit();
```