<?php

namespace Scripture\Memorization\UseCase;

use Symfony\Component\Filesystem\Filesystem;

class RememberLesson
{
    private readonly Filesystem $filesystem;

    public function __construct()
    {
        $this->filesystem = new Filesystem();
    }

    public function execute(string $lesson): void
    {
        $this->filesystem->appendToFile(
            filename: __DIR__.'/../../storage/lessons.txt',
            content: $lesson.PHP_EOL
        );
    }
}
