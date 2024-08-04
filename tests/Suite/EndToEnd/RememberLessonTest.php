<?php

namespace Tests\Suite\EndToEnd;

class RememberLessonTest extends \Tests\UseCase\RememberLessonTest
{
    private string $lessons;

    protected function givenAllLessonsAreRemoved(): void
    {
        $message = shell_exec('php application.php lessons:remove');

        $this->assertIsString($message);
        $this->assertStringContainsString(needle: 'Removed all your learnt lessons.', haystack: $message);
    }

    protected function whenIRememberALesson(string $lesson): void
    {
        $message = shell_exec('php application.php lesson:remember "'.$lesson.'"');

        $this->assertIsString($message);
        $this->assertStringContainsString(needle: 'Added the lesson to your list.', haystack: $message);
    }

    protected function andIRepeatAllLessons(): void
    {
        $lessons = shell_exec('php application.php lessons:repeat');

        $this->assertIsString($lessons);

        $this->lessons = $lessons;
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
