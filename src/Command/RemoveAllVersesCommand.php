<?php

namespace Scripture\Memorization\Command;

use Scripture\Memorization\UseCase\RemoveAllVersesInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'verses:remove', description: 'Remove all your verses.')]
class RemoveAllVersesCommand extends Command
{
    public function __construct(private readonly RemoveAllVersesInterface $useCase)
    {
        parent::__construct();
    }

    #[\Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->useCase->execute();

        $output->writeln('Removed all your verses.');

        return self::SUCCESS;
    }
}
