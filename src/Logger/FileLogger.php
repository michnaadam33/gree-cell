<?php

declare(strict_types=1);

namespace App\Logger;

use Psr\Log\LoggerInterface;

class FileLogger implements LoggerInterface
{
    /**
     * @var string
     */
    private $logPath;

    public function __construct(string $logPath)
    {
        $this->logPath = $logPath;
    }

    public static function create(string $filePath): self
    {
        return new self($filePath);
    }

    public function emergency($message, array $context = array())
    {
        // TODO: Implement emergency() method.
    }

    public function alert($message, array $context = array())
    {
        // TODO: Implement alert() method.
    }

    public function critical($message, array $context = array())
    {
        // TODO: Implement critical() method.
    }

    public function error($message, array $context = array())
    {
        $data = $message;
        $data .= json_encode($context);
        $filePath = $this->logPath . '/exceptions.log';
        file_put_contents($filePath, $data);
    }

    public function warning($message, array $context = array())
    {
        // TODO: Implement warning() method.
    }

    public function notice($message, array $context = array())
    {
        // TODO: Implement notice() method.
    }

    public function info($message, array $context = array())
    {
        // TODO: Implement info() method.
    }

    public function debug($message, array $context = array())
    {
        $data = $message;
        $data .= json_encode($context);
        $filePath = $this->logPath . '/generator.log';
        file_put_contents($filePath, $data);
    }

    public function log($level, $message, array $context = array())
    {
        // TODO: Implement log() method.
    }
}
