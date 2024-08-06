<?php

namespace Scripture\Memorization\UseCase;

use Symfony\Component\Filesystem\Filesystem;

class RemoveAllLessons
{
    private readonly Filesystem $filesystem;

    public function __construct()
    {
        $this->filesystem = new Filesystem();
    }

    public function execute(): void
    {
        $this->filesystem->remove(__DIR__.'/../../storage/lessons.txt');
    }
}
