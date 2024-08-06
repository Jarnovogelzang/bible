<?php

namespace Features;

use Behat\Behat\Context\Context;
use Behat\Step\Given;
use Behat\Step\Then;
use Behat\Step\When;
use PHPUnit\Framework\Assert;

/**
 * Defines application features from the specific context.
 */
class EndToEndContext implements Context
{
    private string $lessons;

    #[Given('all the learnt lessons are removed')]
    public function allTheLearntLessonsAreRemoved(): void
    {
        $message = shell_exec('php application.php lessons:remove');

        Assert::assertIsString($message);
        Assert::assertStringContainsString(needle: 'Removed all your learnt lessons.', haystack: $message);
    }

    #[When('I repeat all lessons learnt so far')]
    public function iRepeatAllLessonsLearntSoFar(): void
    {
        $lessons = shell_exec('php application.php lessons:repeat');

        Assert::assertIsString($lessons);

        $this->lessons = $lessons;
    }

    #[When('I remember the lesson "Je mag je hart ophalen en plezier hebben in het leven."')]
    public function iRememberTheLesson(): void
    {
        $message = shell_exec('php application.php lesson:remember "Je mag je hart ophalen en plezier hebben in het leven."');

        Assert::assertIsString($message);
        Assert::assertStringContainsString(needle: 'Added the lesson to your list.', haystack: $message);
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
