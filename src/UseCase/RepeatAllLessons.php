<?php

namespace Scripture\Memorization\UseCase;

use Symfony\Component\Filesystem\Filesystem;

class RepeatAllLessons
{
    private const string NO_LESSONS = '';

    private readonly Filesystem $filesystem;

    public function __construct(
        private readonly string $pathToFile = __DIR__.'/../../storage/lessons.txt'
    ) {
        $this->filesystem = new Filesystem();
    }

    public function execute(): string
    {
        if (!$this->filesystem->exists($this->pathToFile)) {
            return self::NO_LESSONS;
        }

        return $this->filesystem->readFile($this->pathToFile);
    }
}
