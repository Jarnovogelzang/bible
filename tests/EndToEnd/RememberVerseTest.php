<?php

namespace Tests\EndToEnd;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class RememberVerseTest extends TestCase
{
    #[Test]
    public function iCanRememberAVerseFromTheBibleThatGodHasSpokenToMe(): void
    {
        $messageToUser = shell_exec('php application.php verses:remove');
        $this->assertIsString($messageToUser);
        $this->assertStringContainsString(needle: 'Removed all your verses.', haystack: $messageToUser);

        $messageToUser = shell_exec('php application.php verse:remember "Laat af en weet, dat Ik God ben."');
        $this->assertIsString($messageToUser);
        $this->assertStringContainsString(needle: 'Added the verse to your list.', haystack: $messageToUser);

        $repeatedVerses = shell_exec('php application.php verses:repeat');
        $this->assertIsString($repeatedVerses);
        $this->assertStringContainsString(
            needle: 'Laat af en weet, dat Ik God ben.',
            haystack: $repeatedVerses,
            message: 'The verse was not repeated.'
        );
    }
}
