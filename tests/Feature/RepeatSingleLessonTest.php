<?php

test('Repeat a lesson that God has learnt me', function () {
    $repeatedLesson = shell_exec('php application.php lesson:repeat');

    $this->assertSame(expected: "Dit is een les die God mij heeft geleerd.\n", actual: $repeatedLesson);
});
