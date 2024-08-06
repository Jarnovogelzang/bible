<?php

namespace Scripture\Memorization\UseCase;

interface RememberVerseInterface
{
    public function execute(string $verse): void;
}
