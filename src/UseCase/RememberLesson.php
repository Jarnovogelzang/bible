<?php

namespace Scripture\Memorization\UseCase;

class RememberLesson
{
    public function execute(string $lesson): string
    {
        file_put_contents(
            filename: __DIR__.'/../../storage/lessons.txt',
            data: $lesson.PHP_EOL,
            flags: FILE_APPEND
        );

        return 'Added the lesson to your list.';
    }
}
