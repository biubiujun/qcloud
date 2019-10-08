<h1 align="center"> QCloud SDK </h1>

<p align="center"> 腾讯云 SDK.</p>


## Installing

```shell
$ composer require biubiujun/qcloud
```

## Usage

```php
$qCloud = new QCloud();
$TIM = $qCloud->TIM(
    'SDK_APP_ID',
    'IDENTIFIER',
    'PRIVATE_KEY',
    'PUBLIC_KEY',
    'SIG_VERSION'
);

$request = new AccountImportRequest('identifier', 'nickname');
$response = $TIM->sendRequest($request);
$response->isSuccessful(); // true
```
