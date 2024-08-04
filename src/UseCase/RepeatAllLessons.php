<?php

namespace Scripture\Memorization\UseCase;

class RepeatAllLessons
{
    private const string NO_LESSONS = '';

    public function execute(): string
    {
        $filePath = __DIR__.'/../../storage/lessons.txt';

        if (!file_exists($filePath)) {
            return self::NO_LESSONS;
        }

        return (string) file_get_contents($filePath);
    }
}
