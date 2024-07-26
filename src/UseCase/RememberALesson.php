<?php

namespace Scripture\Memorization\UseCase;

class RememberALesson
{
    public function execute(string $lesson): void
    {
        file_put_contents(
            filename: dirname(__DIR__) . '/storage/lessons.txt',
            data: $lesson . PHP_EOL,
            flags: FILE_APPEND
        );
    }
}