<?php

namespace Scripture\Memorization\Command;

use Scripture\Memorization\UseCase\RemoveAllLessons;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'lessons:remove', description: 'Remove all your lessons.')]
class RemoveAllLessonsCommand extends Command
{
    public function __construct(private readonly RemoveAllLessons $useCase)
    {
        parent::__construct();
    }

    #[\Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->useCase->execute();

        $output->writeln('Removed all your learnt lessons.');

        return self::SUCCESS;
    }
}
