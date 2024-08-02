<?php

namespace Scripture\Memorization\Command;

use Scripture\Memorization\UseCase\RememberVerse;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'verse:remember', description: 'Remember a verse from the Bible that God has spoken to me (personally)')]
class RememberVerseCommand extends Command
{
    public function __construct(private readonly RememberVerse $useCase)
    {
        parent::__construct();
    }

    #[\Override]
    protected function configure(): void
    {
        $this->addArgument(name: 'verse', description: 'The verse from the Bible.');
    }

    #[\Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        /** @var string $verse */
        $verse = $input->getArgument('verse');

        $this->useCase->execute($verse);

        $output->writeln('Added the verse to your list.');

        return self::SUCCESS;
    }
}
