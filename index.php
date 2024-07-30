<?php

use Scripture\Memorization\Command\ReadVerseCommand;
use Scripture\Memorization\Command\RememberLessonCommand;
use Scripture\Memorization\Command\RepeatAllLessonsCommand;
use Scripture\Memorization\Command\RepeatSingleLessonCommand;
use Scripture\Memorization\UseCase\ReadVerse;
use Scripture\Memorization\UseCase\RememberLesson;
use Scripture\Memorization\UseCase\RepeatAllLessons;
use Scripture\Memorization\UseCase\RepeatSingleLesson;
use Symfony\Component\Console\Application;

require_once __DIR__.'/vendor/autoload.php';

$application = new Application(name: 'Memorize Scripture', version: '0.0.1');

$readVerseCommand = new ReadVerseCommand(new ReadVerse);
$application->add($readVerseCommand);

$rememberLessonCommand = new RememberLessonCommand(new RememberLesson);
$application->add($rememberLessonCommand);

$repeatAllLessonsCommand = new RepeatAllLessonsCommand(new RepeatAllLessons);
$application->add($repeatAllLessonsCommand);

$repeatSingleLessonCommand = new RepeatSingleLessonCommand(new RepeatSingleLesson);
$application->add($repeatSingleLessonCommand);

$application->run();
