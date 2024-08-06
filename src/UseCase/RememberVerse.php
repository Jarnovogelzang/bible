<?php

namespace Scripture\Memorization\UseCase;

class RememberVerse implements RememberVerseInterface
{
    #[\Override]
    public function execute(string $verse): void
    {
        file_put_contents(
            filename: __DIR__.'/../../storage/verses.txt',
            data: $verse.PHP_EOL,
            flags: FILE_APPEND
        );
    }
}
