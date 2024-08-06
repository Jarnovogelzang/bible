<?php

namespace Tests\Unit\UseCase;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Scripture\Memorization\UseCase\RepeatAllLessons;
use Symfony\Component\Filesystem\Filesystem;

class RepeatAllLessonsTest extends TestCase
{
    #[Test]
    public function whenTheFileDoesNotExistsNoLessonsAreReturned(): void
    {
        // Given there are no lessons (yet).
        unlink(__DIR__.'/../../../storage/lessons.txt');
        $this->assertFileDoesNotExist(__DIR__.'/../../../storage/lessons.txt');

        $repeatAllLessons = new RepeatAllLessons();

        $repeatedLessons = $repeatAllLessons->execute();

        $this->assertEmpty($repeatedLessons);
    }

    #[Test]
    public function whenTheFileDoesNotHaveTheCorrectPermissionsAnExceptionIsThrown(): void
    {
        $this->expectException(\Exception::class);

        // Given the file to store lessons in does not have the correct permissions
        $filesystem = new Filesystem();
        $filesystem->mkdir(__DIR__.'/../../../storage/tests', 0000);
        $filesystem->touch(__DIR__.'/../../../storage/tests/lessons.txt');
        $filesystem->appendToFile(__DIR__.'/../../../storage/tests/lessons.txt', 'Goede software is goed :).');
        $filesystem->chmod(__DIR__.'/../../../storage/tests/lessons.txt', 0000);

        $repeatAllLessons = new RepeatAllLessons(__DIR__.'/../../../storage/tests');

        $lessons = $repeatAllLessons->execute();
        exit($lessons);
    }
}
