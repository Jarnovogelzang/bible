<?php

namespace Scripture\Memorization\UseCase;

interface RememberLessonInterface
{
    public function execute(string $lesson): void;
}
