<?php

namespace Scripture\Memorization\UseCase;

class RepeatAllVerses
{
    private const string NO_VERSES = '';

    public function execute(): string
    {
        $filePath = __DIR__.'/../../storage/verses.txt';

        if (!file_exists($filePath)) {
            return self::NO_VERSES;
        }

        return (string) file_get_contents(filename: $filePath);
    }
}
