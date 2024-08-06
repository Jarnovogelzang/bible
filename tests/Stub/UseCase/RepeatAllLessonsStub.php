<?php

namespace Tests\Stub\UseCase;

use PHPUnit\Framework\Assert;
use Scripture\Memorization\UseCase\RepeatAllLessons;

class RepeatAllLessonsStub extends RepeatAllLessons
{
    private bool $isCalled = false;

    public function __construct(private readonly string $lessons)
    {
        parent::__construct();
    }

    #[\Override]
    public function execute(): string
    {
        $this->isCalled = true;

        return $this->lessons;
    }

    public function assertIsCalled(): void
    {
        Assert::assertTrue($this->isCalled);
    }
}
