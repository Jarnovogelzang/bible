<?php

namespace Tests\Suite\Unit;

use Scripture\Memorization\UseCase\RememberLesson;
use Scripture\Memorization\UseCase\RemoveAllLessons;
use Scripture\Memorization\UseCase\RepeatAllLessons;

class RememberLessonTest extends \Tests\UseCase\RememberLessonTest
{
    private string $lessons;

    protected function givenAllLessonsAreRemoved(): void
    {
        $removeAllLessons = new RemoveAllLessons();
        $removeAllLessons->execute();
    }

    protected function whenIRememberALesson(string $lesson): void
    {
        $rememberLesson = new RememberLesson();
        $rememberLesson->execute($lesson);
    }

    protected function andIRepeatAllLessons(): void
    {
        $repeatAllLessons = new RepeatAllLessons();
        $this->lessons = $repeatAllLessons->execute();
    }

    protected function thenIShouldSeeTheLearntLesson(string $lesson): void
    {
        $this->assertStringContainsString(
            needle: $lesson,
            haystack: $this->lessons,
            message: 'The learnt lesson was not renounced.'
        );
    }
}
