<?php

test('Renounce a lesson that God has learnt me', function () {
    $renouncedLesson = shell_exec('php index.php lesson:renounce');

    $this->assertSame(expected: "Je moet niets doen; Je moet zijn.\n", actual: $renouncedLesson);
});