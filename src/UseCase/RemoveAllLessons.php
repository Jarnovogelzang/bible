<?php

namespace Scripture\Memorization\UseCase;

class RemoveAllLessons implements RemoveAllLessonsInterface
{
    #[\Override]
    public function execute(): void
    {
        file_put_contents(
            filename: __DIR__.'/../../storage/lessons.txt',
            data: null
        );
    }
}
