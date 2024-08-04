<?php

namespace Features;

use Behat\Behat\Context\Context;
use Behat\Step\Given;
use Behat\Step\Then;
use Behat\Step\When;
use PHPUnit\Framework\Assert;
use Scripture\Memorization\UseCase\RememberLesson;
use Scripture\Memorization\UseCase\RemoveAllLessons;
use Scripture\Memorization\UseCase\RepeatAllLessons;

/**
 * Defines application features from the specific context.
 */
class UnitContext implements Context
{
    private string $lessons;

    #[Given('all the learnt lessons are removed')]
    public function allTheLearntLessonsAreRemoved(): void
    {
        $removeAllLessons = new RemoveAllLessons();
        $removeAllLessons->execute();
    }

    #[When('I repeat all lessons learnt so far')]
    public function iRepeatAllLessonsLearntSoFar(): void
    {
        $repeatAllLessons = new RepeatAllLessons();
        $this->lessons = $repeatAllLessons->execute();
    }

    #[When('I remember the lesson :lesson')]
    public function iRememberTheLesson(string $lesson): void
    {
        $rememberLesson = new RememberLesson();
        $rememberLesson->execute($lesson);
    }

    #[Then('I should see the lesson :lesson')]
    public function iShouldSeeTheLesson(string $lesson): void
    {
        Assert::assertStringContainsString(
            needle: $lesson,
            haystack: $this->lessons,
            message: 'The learnt lesson was not renounced.'
        );
    }
}
