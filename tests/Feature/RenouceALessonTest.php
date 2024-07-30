<?php

test('Renounce a lesson that God has learnt me', function () {
    $renouncedLesson = shell_exec('php index.php lesson:repeat');

    $this->assertSame(expected: "Dit is een les die God mij heeft geleerd.\n", actual: $renouncedLesson);
});
