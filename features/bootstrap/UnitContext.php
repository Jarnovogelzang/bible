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
use Symfony\Component\Filesystem\Filesystem;

/**
 * Defines application features from the specific context.
 */
class UnitContext implements Context
{
    private string $lessons;

    #[Given('all the learnt lessons are removed')]
    public function allTheLearntLessonsAreRemoved(): void
    {
        $removeAllLessons = new RemoveAllLessons(new Filesystem());
        $removeAllLessons->execute();
    }

    #[When('I repeat all lessons learnt so far')]
    public function iRepeatAllLessonsLearntSoFar(): void
    {
        $repeatAllLessons = new RepeatAllLessons();
        $this->lessons = $repeatAllLessons->execute();
    }

    #[When('I remember the lesson "Je mag je hart ophalen en plezier hebben in het leven."')]
    public function iRememberTheLesson(): void
    {
        $rememberLesson = new RememberLesson(new Filesystem());
        $rememberLesson->execute('Je mag je hart ophalen en plezier hebben in het leven.');
    }

    #[Then('I should see the lesson "Je mag je hart ophalen en plezier hebben in het leven."')]
    public function iShouldSeeTheLesson(): void
    {
        Assert::assertStringContainsString(
            needle: 'Je mag je hart ophalen en plezier hebben in het leven.',
            haystack: $this->lessons,
            message: 'The learnt lesson was not renounced.'
        );
    }
}
