<?php

namespace Scripture\Memorization\UseCase;

use Symfony\Component\Filesystem\Filesystem;

class RememberVerse
{
    private readonly Filesystem $filesystem;

    public function __construct()
    {
        $this->filesystem = new Filesystem();
    }

    public function execute(string $verse): void
    {
        $this->filesystem->appendToFile(
            filename: __DIR__.'/../../storage/verses.txt',
            content: $verse.PHP_EOL
        );
    }
}
