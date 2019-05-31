Winserve API Client
=======================

A api services for winserve application

Requirements
============

* PHP >= 7.*
* Laragon Application
* Sql driver for php

Installation
============

composer require buonzz/laravel-4-freegeoip:dev-master

Add the service provider and facade in your config/app.php

Service Provider

Buonzz\GeoIP\Laravel4\ServiceProviders\GeoIPServiceProvider

Facade

'GeoIP' => 'Buonzz\GeoIP\Laravel4\Facades\GeoIP',