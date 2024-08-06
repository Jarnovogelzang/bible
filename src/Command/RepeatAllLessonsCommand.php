<?php

namespace Scripture\Memorization\Command;

use Scripture\Memorization\UseCase\RepeatAllLessons;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'lessons:repeat', description: 'Repeat all lessons learnt from God.')]
class RepeatAllLessonsCommand extends Command
{
    public function __construct(private readonly RepeatAllLessons $useCase)
    {
        parent::__construct();
    }

    #[\Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $learntLessons = $this->useCase->execute();

        $output->writeln($learntLessons);

        return self::SUCCESS;
    }
}
