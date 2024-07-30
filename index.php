<?php

use Scripture\Memorization\UseCase\ReadAVerse;
use Scripture\Memorization\UseCase\RememberALesson;
use Scripture\Memorization\UseCase\RenounceALesson;
use Scripture\Memorization\UseCase\RenounceAllLessons;

require_once __DIR__.'/vendor/autoload.php';

function writeToOutput(string $text): void
{
    echo $text.PHP_EOL;
}

$commandToRun = $argv[1];

$input = isset($argv[2]) ? $argv[2] : '';

if ($commandToRun === 'verse:read') {
    $useCase = new ReadAVerse;
} elseif ($commandToRun === 'lesson:renounce') {
    $useCase = new RenounceALesson;
} elseif ($commandToRun === 'lesson:remember') {
    $useCase = new RememberALesson;
} elseif ($commandToRun === 'lessons:renounce') {
    $useCase = new RenounceAllLessons;
}

$output = $useCase->execute($input);

if ($output) {
    writeToOutput($output);
}
