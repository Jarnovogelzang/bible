<?php

test('I can remember a verse from the Bible that God has spoken to me (personally)', function () {
    shell_exec('php application.php verse:remember "Laat af en weet, dat Ik God ben."');

    $repeatedVerses = shell_exec('php application.php verses:repeat');

    $this->assertStringContainsString(
        needle: 'Laat af en weet, dat Ik God ben.',
        haystack: $repeatedVerses,
        message: 'The verse was not repeated.'
    );
});
