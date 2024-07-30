<?php

namespace Scripture\Memorization\Command;

use Scripture\Memorization\UseCase\RepeatSingleLesson;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'lesson:repeat', description: 'Repeat a single (random) lesson learnt from God.')]
class RepeatSingleLessonCommand extends Command
{
    public function __construct(private RepeatSingleLesson $useCase)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $learntLesson = $this->useCase->execute();

        $output->writeln($learntLesson);

        return self::SUCCESS;
    }
}
