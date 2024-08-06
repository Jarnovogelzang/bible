<?php

namespace Scripture\Memorization\UseCase;

use Symfony\Component\Filesystem\Filesystem;

class RemoveAllLessons
{
    public function __construct(private readonly Filesystem $filesystem)
    {
    }

    public function execute(): void
    {
        $this->filesystem->remove(__DIR__.'/../../storage/lessons.txt');
    }
}
