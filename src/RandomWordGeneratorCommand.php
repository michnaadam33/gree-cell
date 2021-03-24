<?php

declare(strict_types=1);

namespace App;

use DateTime;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class RandomWordGeneratorCommand extends Command implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    private const ARGUMENT_LENGTH = 'length';
    private const ARGUMENT_WORDS = 'words';

    /**
     * @var string
     */
    protected static $defaultName = 'app:random-word';
    /**
     * @var Generator
     */
    private $generator;

    public function __construct(Generator $generator)
    {
        $this->generator = $generator;
        parent::__construct(self::$defaultName);
    }

    protected function configure()
    {
        $this
            ->addArgument(self::ARGUMENT_WORDS, InputArgument::OPTIONAL, 'Count of word', 1)
            ->addArgument(self::ARGUMENT_LENGTH, InputArgument::OPTIONAL, 'Length of word', 6)
            ->addOption('force', 'f', InputOption::VALUE_OPTIONAL, 'Force execute out of te time');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $words = (int)$input->getArgument(self::ARGUMENT_WORDS);
        $length = (int)$input->getArgument(self::ARGUMENT_LENGTH);

        $results = $this->generator->getRandomWords(
            $words,
            $length
        );
        foreach ($results as $result) {
            $output->writeln($result);
        }

        $this->logger->debug(
            (new DateTime())->format(DateTime::ATOM) . ":"
            . 'words:' . $words . ':'
            . 'length:' . $length
        );
        return Command::SUCCESS;
    }
}
