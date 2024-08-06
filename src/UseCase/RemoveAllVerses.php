<?php

namespace Scripture\Memorization\UseCase;

class RemoveAllVerses implements RemoveAllVersesInterface
{
    #[\Override]
    public function execute(): void
    {
        file_put_contents(
            filename: __DIR__.'/../../storage/verses.txt',
            data: null
        );
    }
}
