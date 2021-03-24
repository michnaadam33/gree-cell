#!/usr/bin/env php
<?php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use App\Factory\CommandFactory;

$application = new Application();
$factory = new CommandFactory();
$application->add($factory->createCommand());

$application->run();