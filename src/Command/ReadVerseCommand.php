<?php

namespace Scripture\Memorization\Command;

use Scripture\Memorization\UseCase\ReadVerse;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'verse:read', description: 'Read a (remembered) verse from the Bible.')]
class ReadVerseCommand extends Command
{
    public function __construct(private ReadVerse $useCase)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $verse = $this->useCase->execute();

        $output->writeln($verse);

        return self::SUCCESS;
    }
}
