<?php

namespace Tests\UseCase;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

abstract class RememberLessonTest extends TestCase
{
    abstract protected function givenAllLessonsAreRemoved(): void;

    abstract protected function whenIRememberALesson(string $lesson): void;

    abstract protected function andIRepeatAllLessons(): void;

    abstract protected function thenIShouldSeeTheLearntLesson(string $lesson): void;

    #[Test]
    public function iCanRememberALessonThatGodWantsMeToLearn(): void
    {
        $this->givenAllLessonsAreRemoved();

        $this->whenIRememberALesson('Je mag je hart ophalen en plezier hebben in het leven.');

        $this->andIRepeatAllLessons();

        $this->thenIShouldSeeTheLearntLesson('Je mag je hart ophalen en plezier hebben in het leven.');
    }
}
