<?php

namespace Features;

use Behat\Behat\Context\Context;
use Behat\Step\Given;
use Behat\Step\Then;
use Behat\Step\When;
use PHPUnit\Framework\Assert;
use Scripture\Memorization\Command\RemoveAllLessonsCommand;
use Symfony\Component\Console\Tester\CommandTester;
use Tests\Stub\UseCase\RemoveAllLessonsStub;

class IntegrationContext implements Context
{
    private string $lessons;

    #[Given('all the learnt lessons are removed')]
    public function allTheLearntLessonsAreRemoved(): void
    {
        $removeAllLessonsStub = new RemoveAllLessonsStub();
        $removeAllLessonsCommand = new RemoveAllLessonsCommand($removeAllLessonsStub);

        $commandTester = new CommandTester($removeAllLessonsCommand);
        $commandTester->execute([]);

        $commandTester->assertCommandIsSuccessful();

        $commandOutput = $commandTester->getDisplay();
        Assert::assertStringContainsString(needle: 'Removed all your learnt lessons.', haystack: $commandOutput);

        $removeAllLessonsStub->assertIsCalled();
    }

    #[When('I repeat all lessons learnt so far')]
    public function iRepeatAllLessonsLearntSoFar(): void
    {
        $lessons = shell_exec('php application.php lessons:repeat');

        Assert::assertIsString($lessons);

        $this->lessons = $lessons;
    }

    #[When('I remember the lesson :lesson')]
    public function iRememberTheLesson(string $lesson): void
    {
        $message = shell_exec('php application.php lesson:remember "'.$lesson.'"');

        Assert::assertIsString($message);
        Assert::assertStringContainsString(needle: 'Added the lesson to your list.', haystack: $message);
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
