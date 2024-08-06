<?php

namespace Scripture\Memorization\Command;

use Scripture\Memorization\UseCase\RepeatAllVersesInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'verses:repeat', description: 'Repeat all verses learnt from God.')]
class RepeatAllVersesCommand extends Command
{
    public function __construct(private readonly RepeatAllVersesInterface $useCase)
    {
        parent::__construct();
    }

    #[\Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $verses = $this->useCase->execute();

        $output->writeln($verses);

        return self::SUCCESS;
    }
}
