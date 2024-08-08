<?php

namespace Scripture\Memorization\UseCase;

use Symfony\Component\Filesystem\Filesystem;

class RememberLesson
{
    private readonly Filesystem $filesystem;

    public function __construct(private readonly string $pathToFile = __DIR__.'/../../storage/lessons.txt')
    {
        $this->filesystem = new Filesystem();
    }

    public function execute(string $lesson): void
    {
        $this->filesystem->appendToFile(
            filename: $this->pathToFile,
            content: $lesson.PHP_EOL
        );
    }
}
