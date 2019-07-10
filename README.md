# Doctrine ORM Batcher Bundle

[![Latest Version][ico-version]][link-packagist]
[![Latest Unstable Version][ico-unstable-version]][link-packagist]
[![Software License][ico-license]](LICENSE)
[![Build Status][ico-travis]][link-travis]
[![Quality Score][ico-code-quality]][link-code-quality]

Integrates the [Doctrine ORM Batcher library](https://github.com/Setono/doctrine-orm-batcher) into Symfony.

## Installation

### Step 1: Download the bundle

Open a command console, enter your project directory and execute the following command to download the latest stable version of this plugin:

```bash
$ composer require setono/doctrine-orm-batcher-bundle
```

This command requires you to have Composer installed globally, as explained in the [installation chapter](https://getcomposer.org/doc/00-intro.md) of the Composer documentation.


### Step 2: Enable the bundle

Enable the plugin by adding it to the list of registered plugins/bundles in `config/bundles.php`:

```php
<?php
$bundles = [
    // ...
    
    Setono\DoctrineORMBatcherBundle\SetonoDoctrineORMBatcherBundle::class => ['all' => true],
    
    // ...
];
```

## Usage
Now you can inject the `BestIdRangeBatcherFactoryInterface` or the `Setono\DoctrineORMBatcher\Query\QueryRebuilderInterface` into your services:

```php
<?php

use Setono\DoctrineORMBatcher\Factory\BestIdRangeBatcherFactoryInterface;

final class YourService
{
    private $factory;
    
    public function __construct(BestIdRangeBatcherFactoryInterface $factory)
    {
        $this->factory = $factory;
    }
}
```

With auto wiring this will work out of the box. If you're not using auto wiring you have to inject it in your service definition:

```xml
<?xml version="1.0" encoding="UTF-8" ?>

<container xmlns="http://symfony.com/schema/dic/services" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://symfony.com/schema/dic/services http://symfony.com/schema/dic/services/services-1.0.xsd">
    <services>
        <service id="YourService">
            <argument type="service" id="Setono\DoctrineORMBatcher\Factory\BestIdRangeBatcherFactoryInterface"/>
        </service>
    </services>
</container>

```

[ico-version]: https://poser.pugx.org/setono/doctrine-orm-batcher-bundle/v/stable
[ico-unstable-version]: https://poser.pugx.org/setono/doctrine-orm-batcher-bundle/v/unstable
[ico-license]: https://poser.pugx.org/setono/doctrine-orm-batcher-bundle/license
[ico-travis]: https://travis-ci.com/Setono/DoctrineORMBatcherBundle.svg?branch=master
[ico-code-quality]: https://img.shields.io/scrutinizer/g/Setono/DoctrineORMBatcherBundle.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/setono/doctrine-orm-batcher-bundle
[link-travis]: https://travis-ci.com/Setono/DoctrineORMBatcherBundle
[link-code-quality]: https://scrutinizer-ci.com/g/Setono/DoctrineORMBatcherBundle
