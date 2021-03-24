<?php

declare(strict_types=1);

namespace App\Factory;

use App\Generator;
use App\Logger\FileLogger;
use App\RandomWordGeneratorCommand;

class CommandFactory
{
    public function createCommand(): RandomWordGeneratorCommand
    {
        $logPath = __DIR__ . '/../..';
        $command =  new RandomWordGeneratorCommand(
            new Generator()
        );
        $command->setLogger(FileLogger::create($logPath));
        return $command;
    }
}
