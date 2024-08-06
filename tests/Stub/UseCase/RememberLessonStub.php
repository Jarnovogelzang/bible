<?php

namespace Tests\Stub\UseCase;

use PHPUnit\Framework\Assert;
use Scripture\Memorization\UseCase\RememberLesson;

class RememberLessonStub extends RememberLesson
{
    private bool $isCalled = false;
    private string $rememberLesson;

    #[\Override]
    public function execute(string $lesson): void
    {
        $this->isCalled = true;
        $this->rememberLesson = $lesson;
    }

    public function assertIsCalled(): void
    {
        Assert::assertTrue($this->isCalled);
    }

    public function assertLessonIsRemember(string $lesson): void
    {
        Assert::assertStringContainsString(needle: $lesson, haystack: $this->rememberLesson);
    }
}
