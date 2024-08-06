<?php

namespace Tests\Stub\UseCase;

use PHPUnit\Framework\Assert;
use Scripture\Memorization\UseCase\RemoveAllLessonsInterface;

class RemoveAllLessonsStub implements RemoveAllLessonsInterface
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
