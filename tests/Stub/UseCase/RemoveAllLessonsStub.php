<?php

namespace Tests\Stub\UseCase;

use PHPUnit\Framework\Assert;
use Scripture\Memorization\UseCase\RemoveAllLessons;

class RemoveAllLessonsStub extends RemoveAllLessons
{
    private bool $isCalled = false;

    #[\Override]
    public function execute(): void
    {
        $this->isCalled = true;
    }

    public function assertIsCalled(): void
    {
        Assert::assertTrue($this->isCalled);
    }
}
