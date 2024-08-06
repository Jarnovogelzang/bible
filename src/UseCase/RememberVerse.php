<?php

namespace Scripture\Memorization\UseCase;

use Symfony\Component\Filesystem\Filesystem;

class RememberVerse
{
    public function __construct(private Filesystem $filesystem)
    {
    }

    public function execute(string $verse): void
    {
        $this->filesystem->appendToFile(
            filename: __DIR__.'/../../storage/verses.txt',
            content: $verse.PHP_EOL
        );
    }
}
