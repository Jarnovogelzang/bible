<?php

test('I can remember a verse from the Bible that God has spoken to me (personally)', function () {
    $messageToUser = shell_exec('php application.php verses:remove');
    $this->assertStringContainsString(needle: 'Removed all your verses.', haystack: $messageToUser);

    $messageToUser = shell_exec('php application.php verse:remember "Laat af en weet, dat Ik God ben."');
    $this->assertStringContainsString(needle: 'Added the verse to your list.', haystack: $messageToUser);

    $repeatedVerses = shell_exec('php application.php verses:repeat');

    $this->assertStringContainsString(
        needle: 'Laat af en weet, dat Ik God ben.',
        haystack: $repeatedVerses,
        message: 'The verse was not repeated.'
    );

});
