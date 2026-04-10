# TurkeySMS PHP SDK (Official Generic) 🐘

[![Latest Version on Packagist](https://img.shields.io/packagist/v/turkeysms/php-sdk.svg?style=flat-square)](https://packagist.org/packages/turkeysms/php-sdk)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

Official **PHP SDK** for the **TurkeySMS API V4**. Integrate high-volume SMS, secure OTP, and account management into any PHP project with minimal effort.

## 🛠 Installation

Install the package via Composer:

```bash
composer require turkeysms/php-sdk
```

---

## 🚀 Quick Start

### Initialize Client

```php
require 'vendor/autoload.php';

use TurkeySms\TurkeySms;

$client = new TurkeySms("your_api_key_here");
```

### Sending Standard SMS

```php
$result = $client->send([
    'mobile' => '905xxxxxxxxx',
    'text'   => 'Hello from TurkeySMS PHP SDK!',
    'title'  => 'SENDER_ID'
]);

print_r($result);
```

### Sending OTP SMS

```php
$result = $client->sendOtp([
    'mobile' => '905xxxxxxxxx',
    'lang'   => 1, // 0: English, 1: Turkish, 2: Arabic
    'digits' => 4
]);
```

### Check Balance

```php
$balance = $client->getBalance();
echo "Your balance: " . $balance['balance'];
```

---

## 🛡 Security

If you discover any security-related issues, please email support@turkeysms.com.tr instead of using the issue tracker.

## 📄 License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

---
© 2026 **TurkeySMS Bilişim ve İletişim Hizmetleri Tic. Ltd. Şti.**
