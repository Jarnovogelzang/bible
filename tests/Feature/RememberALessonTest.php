<?php

test('Remember a lesson that God is learning me', function () {
    $output = shell_exec('php index.php lesson:remember "Je mag luisteren, liefhebben en zachtjes bidden."');
    $this->assertStringContainsString(
        needle: 'Added the lesson to your list.',
        haystack: $output,
        message: 'The lesson was not added.'
    );

    $renouncedLessons = shell_exec("php index.php lessons:renounce");
    $this->assertStringContainsString(
        needle: "Je mag luisteren, liefhebben en zachtjes bidden.",
        haystack: $renouncedLessons,
        message: "The learnt lesson was not renounced."
    );
});