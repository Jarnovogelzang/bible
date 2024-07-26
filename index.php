<?php

function writeToOutput(string $text): void
{
    echo $text . PHP_EOL;
}

$commandToRun = $argv[1];

if ($commandToRun === 'verse:read') {
    writeToOutput("Laat af en weet, dat Ik God ben.");
} elseif ($commandToRun === 'lesson:renounce') {
    writeToOutput("Je moet niets doen; Je moet zijn.");
} elseif($commandToRun === 'lesson:remember') {
    $lesson = $argv[2];

    writeToOutput("Added the lesson to your list.");

    file_put_contents(filename: __DIR__ . '/storage/lessons.txt', data: $lesson . PHP_EOL, flags: FILE_APPEND);
} elseif ($commandToRun === 'lessons:renounce') {
    $learntLessons = file_get_contents(filename: __DIR__ . '/storage/lessons.txt');

    writeToOutput($learntLessons);
}