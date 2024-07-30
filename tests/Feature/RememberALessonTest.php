<?php

test('Remember a lesson that God is learning me', function () {
    $output = shell_exec('php index.php lesson:remember "Dit is een les die God mij heeft geleerd."');
    $this->assertStringContainsString(
        needle: 'Added the lesson to your list.',
        haystack: $output,
        message: 'The lesson was not added.'
    );

    $renouncedLessons = shell_exec("php index.php lessons:renounce");
    $this->assertStringContainsString(
        needle: "Dit is een les die God mij heeft geleerd.",
        haystack: $renouncedLessons,
        message: "The learnt lesson was not renounced."
    );
});