<?php

test('Remember a lesson that God is learning me', function () {
    $output = shell_exec('php application.php lesson:remember "Dit is een les die God mij heeft geleerd."');
    $this->assertStringContainsString(
        needle: 'Added the lesson to your list.',
        haystack: $output,
        message: 'The lesson was not added.'
    );

    $allLessons = shell_exec('php application.php lessons:repeat');
    $this->assertStringContainsString(
        needle: 'Dit is een les die God mij heeft geleerd.',
        haystack: $allLessons,
        message: 'The learnt lesson was not renounced.'
    );
});
