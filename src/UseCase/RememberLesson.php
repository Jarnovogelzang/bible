<?php

namespace Scripture\Memorization\UseCase;

class RememberLesson
{
    public function execute(string $lesson): void
    {
        file_put_contents(
            filename: __DIR__.'/../../storage/lessons.txt',
            data: $lesson.PHP_EOL,
            flags: FILE_APPEND
        );
    }
}
