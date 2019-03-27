# Lightweight Dependency Injection

| Build | Coverage | Downloads | Release | License |
|:--------:|:--------:|:--------:|:--------:|:--------:|




## Description

"Lightweight Dependency Injection" is a **PHP** package, which allows to inject your dependencies within services. It builds only required classes for the current request.

## Installation
### Composer
Installing via [Composer](https://getcomposer.org/download/) will keep this package up to date for you.
```bash
composer require narokishi/lightweight-di
```
### Usage
```php
use Narokishi\DependencyInjection\Container;

...

$container = new Container;
$container->registerService(ExampleService::class, function () {
    return new ExampleService(
        ...constructorArgs
    );
});
$container->registerService(SecondExampleService::class, function (Container $container) {
    return new SecondExampleService(
        $container->getService(ExampleService::class)
    );
});

...

$secondExampleService = $container->getService(SecondExampleService::class);
```

## Contributing
Thank you for considering contributing to the package.
