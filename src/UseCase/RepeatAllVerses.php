<?php

namespace Scripture\Memorization\UseCase;

class RepeatAllVerses
{
    public function execute(): string
    {
        return (string) file_get_contents(filename: __DIR__.'/../../storage/verses.txt');
    }
}
