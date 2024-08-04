<?php

namespace Tests\Unit\UseCase;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Scripture\Memorization\UseCase\RepeatAllLessons;

class RepeatAllVersesTest extends TestCase
{
    #[Test]
    public function whenThereAreNoVersesYetNoVersesAreRepeated(): void
    {
        // Given there are no verses (yet).
        unlink(__DIR__.'/../../../storage/verses.txt');
        $this->assertFileDoesNotExist(__DIR__.'/../../../storage/verses.txt');

        $repeatAllVerses = new RepeatAllLessons();

        $repeatedLessons = $repeatAllVerses->execute();

        $this->assertEmpty($repeatedLessons);
    }
}
