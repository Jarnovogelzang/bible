<?php

use Scripture\Memorization\Command\ReadVerseCommand;
use Scripture\Memorization\Command\RememberLessonCommand;
use Scripture\Memorization\Command\RememberVerseCommand;
use Scripture\Memorization\Command\RepeatAllLessonsCommand;
use Scripture\Memorization\Command\RepeatAllVersesCommand;
use Scripture\Memorization\Command\RepeatSingleLessonCommand;
use Scripture\Memorization\UseCase\ReadVerse;
use Scripture\Memorization\UseCase\RememberLesson;
use Scripture\Memorization\UseCase\RememberVerse;
use Scripture\Memorization\UseCase\RepeatAllLessons;
use Scripture\Memorization\UseCase\RepeatAllVerses;
use Scripture\Memorization\UseCase\RepeatSingleLesson;
use Symfony\Component\Console\Application;

require_once __DIR__.'/vendor/autoload.php';

$application = new Application(name: 'Memorize Scripture', version: '0.0.1');

$readVerseCommand = new ReadVerseCommand(new ReadVerse);
$rememberLessonCommand = new RememberLessonCommand(new RememberLesson);
$rememberVerseCommand = new RememberVerseCommand(new RememberVerse);
$repeatAllLessonsCommand = new RepeatAllLessonsCommand(new RepeatAllLessons);
$repeatAllVersesCommand = new RepeatAllVersesCommand(new RepeatAllVerses);
$repeatSingleLessonCommand = new RepeatSingleLessonCommand(new RepeatSingleLesson);

$application->add($readVerseCommand);
$application->add($rememberLessonCommand);
$application->add($rememberVerseCommand);
$application->add($repeatAllLessonsCommand);
$application->add($repeatAllVersesCommand);
$application->add($repeatSingleLessonCommand);

$application->run();
