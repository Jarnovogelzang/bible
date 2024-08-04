<?php

namespace Scripture\Memorization\UseCase;

class RepeatAllLessons
{
    public function execute(): string
    {
        return (string) file_get_contents(filename: __DIR__.'/../../storage/lessons.txt');
    }
}
