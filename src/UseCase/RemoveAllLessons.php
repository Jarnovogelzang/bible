<?php

namespace Scripture\Memorization\UseCase;

class RemoveAllLessons
{
    public function execute(): void
    {
        file_put_contents(
            filename: __DIR__.'/../../storage/lessons.txt',
            data: null
        );
    }
}
