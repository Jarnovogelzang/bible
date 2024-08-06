<?php

namespace Scripture\Memorization\UseCase;

use Symfony\Component\Filesystem\Filesystem;

class RepeatAllVerses
{
    private const string NO_VERSES = '';

    private readonly Filesystem $filesystem;

    public function __construct()
    {
        $this->filesystem = new Filesystem();
    }

    public function execute(): string
    {
        $filePath = __DIR__.'/../../storage/verses.txt';

        if (!$this->filesystem->exists($filePath)) {
            return self::NO_VERSES;
        }

        return $this->filesystem->readFile(filename: $filePath);
    }
}
