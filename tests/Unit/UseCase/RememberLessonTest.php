<?php

namespace Tests\Unit\UseCase;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Scripture\Memorization\UseCase\RememberLesson;

class RememberLessonTest extends TestCase
{
    #[Test]
    public function whenTheFileDoesNotExistOnThePathItIsCreated(): void
    {
        $pathToFile = __DIR__.'/../../../../storage/lessons.txt';
        unlink($pathToFile);
        self::assertFileDoesNotExist(filename: $pathToFile, message: 'The file must not exist (yet) for this test case.');

        $rememberLesson = new RememberLesson($pathToFile);
        $rememberLesson->execute('Het is goed om geordend te werken volgens een plan, want op deze manier heeft God de aarde geschapen.');

        self::assertFileExists(filename: $pathToFile);
    }
}
