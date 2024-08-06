<?php

use Scripture\Memorization\Command\RememberLessonCommand;
use Scripture\Memorization\Command\RememberVerseCommand;
use Scripture\Memorization\Command\RemoveAllLessonsCommand;
use Scripture\Memorization\Command\RemoveAllVersesCommand;
use Scripture\Memorization\Command\RepeatAllLessonsCommand;
use Scripture\Memorization\Command\RepeatAllVersesCommand;
use Scripture\Memorization\UseCase\RememberLesson;
use Scripture\Memorization\UseCase\RememberVerse;
use Scripture\Memorization\UseCase\RemoveAllLessons;
use Scripture\Memorization\UseCase\RemoveAllVerses;
use Scripture\Memorization\UseCase\RepeatAllLessons;
use Scripture\Memorization\UseCase\RepeatAllVerses;
use Symfony\Component\Console\Application;
use Symfony\Component\Filesystem\Filesystem;

require_once __DIR__.'/vendor/autoload.php';

$application = new Application(name: 'Memorize Scripture', version: '0.0.1');

$filesystem = new Filesystem();

$rememberLessonCommand = new RememberLessonCommand(new RememberLesson($filesystem));
$rememberVerseCommand = new RememberVerseCommand(new RememberVerse($filesystem));
$removeAllLessonsCommand = new RemoveAllLessonsCommand(new RemoveAllLessons($filesystem));
$removeAllVersesCommand = new RemoveAllVersesCommand(new RemoveAllVerses($filesystem));
$repeatAllLessonsCommand = new RepeatAllLessonsCommand(new RepeatAllLessons());
$repeatAllVersesCommand = new RepeatAllVersesCommand(new RepeatAllVerses());

$application->add($rememberLessonCommand);
$application->add($rememberVerseCommand);
$application->add($removeAllLessonsCommand);
$application->add($removeAllVersesCommand);
$application->add($repeatAllLessonsCommand);
$application->add($repeatAllVersesCommand);

$application->run();
