<?php

namespace Scripture\Memorization\UseCase;

use Symfony\Component\Filesystem\Filesystem;

class RepeatAllLessons
{
    private const string NO_LESSONS = '';

    private readonly Filesystem $filesystem;

    public function __construct(
        private readonly string $baseDirectory = __DIR__.'/../../storage'
    ) {
        $this->filesystem = new Filesystem();
    }

    public function execute(): string
    {
        $filePath = $this->baseDirectory.'/lessons.txt';

        if (!$this->filesystem->exists($filePath)) {
            return self::NO_LESSONS;
        }

        return $this->filesystem->readFile($filePath);
    }
}
