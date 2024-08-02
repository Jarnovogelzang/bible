<?php

namespace Tests\EndToEnd;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class RememberLessonTest extends TestCase
{
    #[Test]
    public function iCanRememberALessonThatGodWantsMeToLearn(): void
    {
        $message = shell_exec('php application.php lessons:remove');
        $this->assertStringContainsString(needle: 'Removed all your learnt lessons.', haystack: $message);

        $message = shell_exec('php application.php lesson:remember "Je mag je hart ophalen en plezier hebben in het leven."');
        $this->assertStringContainsString(needle: 'Added the lesson to your list.', haystack: $message);

        $lessons = shell_exec('php application.php lessons:repeat');
        $this->assertStringContainsString(
            needle: 'Je mag je hart ophalen en plezier hebben in het leven.',
            haystack: $lessons,
            message: 'The learnt lesson was not renounced.'
        );
    }
}
