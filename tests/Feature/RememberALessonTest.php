<?php

test('I can remember a lesson that God wants me to learn', function () {
    shell_exec('php application.php lesson:remember "Je mag je hart ophalen en plezier hebben in het leven."');

    $lessons = shell_exec('php application.php lessons:repeat');
    $this->assertStringContainsString(
        needle: 'Je mag je hart ophalen en plezier hebben in het leven.',
        haystack: $lessons,
        message: 'The learnt lesson was not renounced.'
    );
});
