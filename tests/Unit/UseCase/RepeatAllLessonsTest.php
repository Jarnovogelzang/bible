<?php

namespace Tests\Unit\UseCase;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Scripture\Memorization\UseCase\RepeatAllLessons;

class RepeatAllLessonsTest extends TestCase
{
    #[Test]
    public function whenThereAreNoLessonsYetNoLessonsAreRepeated(): void
    {
        // Given there are no lessons (yet).
        unlink(__DIR__.'/../../../storage/lessons.txt');
        $this->assertFileDoesNotExist(__DIR__.'/../../../storage/lessons.txt');

        $repeatAllLessons = new RepeatAllLessons();

        $repeatedLessons = $repeatAllLessons->execute();

        $this->assertEmpty($repeatedLessons);
    }
}
