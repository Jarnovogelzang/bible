<?php

namespace Features;

use Behat\Behat\Context\Context;
use Behat\Step\Given;
use Behat\Step\Then;
use Behat\Step\When;
use PHPUnit\Framework\Assert;
use Scripture\Memorization\Command\RememberLessonCommand;
use Scripture\Memorization\Command\RemoveAllLessonsCommand;
use Scripture\Memorization\Command\RepeatAllLessonsCommand;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\Filesystem\Filesystem;
use Tests\Stub\UseCase\RememberLessonStub;
use Tests\Stub\UseCase\RemoveAllLessonsStub;
use Tests\Stub\UseCase\RepeatAllLessonsStub;

class IntegrationContext implements Context
{
    private string $repeatedLessons;

    #[Given('all the learnt lessons are removed')]
    public function allTheLearntLessonsAreRemoved(): void
    {
        $removeAllLessonsStub = new RemoveAllLessonsStub(new Filesystem());
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
        $repeatAllLessonsStub = new RepeatAllLessonsStub('Je mag je hart ophalen en plezier hebben in het leven.');
        $repeatAllLessonsCommand = new RepeatAllLessonsCommand($repeatAllLessonsStub);

        $commandTester = new CommandTester($repeatAllLessonsCommand);
        $commandTester->execute([]);

        $commandTester->assertCommandIsSuccessful();

        $this->repeatedLessons = $commandTester->getDisplay();

        $repeatAllLessonsStub->assertIsCalled();
    }

    #[When('I remember the lesson "Je mag je hart ophalen en plezier hebben in het leven."')]
    public function iRememberTheLesson(): void
    {
        $rememberLessonStub = new RememberLessonStub();
        $rememberLessonCommand = new RememberLessonCommand($rememberLessonStub);

        $commandTester = new CommandTester($rememberLessonCommand);
        $commandTester->execute([
            'lesson' => 'Je mag je hart ophalen en plezier hebben in het leven.',
        ]);

        $commandTester->assertCommandIsSuccessful();

        $commandOutput = $commandTester->getDisplay();
        Assert::assertIsString($commandOutput);
        Assert::assertStringContainsString(needle: 'Added the lesson to your list.', haystack: $commandOutput);

        $rememberLessonStub->assertIsCalled();
        $rememberLessonStub->assertLessonIsRemember('Je mag je hart ophalen en plezier hebben in het leven.');
    }

    #[Then('I should see the lesson "Je mag je hart ophalen en plezier hebben in het leven."')]
    public function iShouldSeeTheLesson(): void
    {
        Assert::assertStringContainsString(
            needle: 'Je mag je hart ophalen en plezier hebben in het leven.',
            haystack: $this->repeatedLessons,
            message: 'The learnt lesson was not renounced.'
        );
    }
}
