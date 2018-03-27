<?php

include_once __DIR__.'/../vendor/autoload.php';

date_default_timezone_set('Europe/Prague');

$classLoader = new \Composer\Autoload\ClassLoader();
$classLoader->addPsr4("K0nias\\FakturoidApi\\Tests\\", __DIR__, true);
$classLoader->register();