<?php

namespace Scripture\Memorization\Command;

use Scripture\Memorization\UseCase\RememberLessonInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'lesson:remember', description: 'Remember a learnt lesson from God.')]
class RememberLessonCommand extends Command
{
    public function __construct(private readonly RememberLessonInterface $useCase)
    {
        parent::__construct();
    }

    #[\Override]
    protected function configure(): void
    {
        $this->addArgument(name: 'lesson', description: 'The lesson.');
    }

    #[\Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        /** @var string $lesson */
        $lesson = $input->getArgument('lesson');

        $this->useCase->execute($lesson);

        $output->writeln('Added the lesson to your list.');

        return self::SUCCESS;
    }
}
