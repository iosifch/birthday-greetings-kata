#!/usr/bin/env php
<?php

declare(strict_types=1);

use Greetings\Infrastructure\Console\SendGreetings;
use Symfony\Component\Console\Application;

require_once 'vendor/autoload.php';

$application = new Application();

$command = new SendGreetings(__DIR__ . '/../db/employees.csv');

$application->add($command);
$application->setDefaultCommand($command->getName());

$application->run();
