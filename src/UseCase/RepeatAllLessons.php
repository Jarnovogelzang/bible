<?php

namespace Scripture\Memorization\UseCase;

class RepeatAllLessons
{
    private const string NO_LESSONS = '';

    public function __construct(private readonly string $baseDirectory = __DIR__.'/../../storage')
    {
    }

    public function execute(): string
    {
        $filePath = $this->baseDirectory.'/lessons.txt';

        if (!file_exists($filePath)) {
            return self::NO_LESSONS;
        }

        return (string) file_get_contents($filePath);
    }
}
