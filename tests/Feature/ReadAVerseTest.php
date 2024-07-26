<?php

test('Read a verse from the Word of God', function () {
    $readVerse = shell_exec('php index.php verse:read');

    $this->assertSame(
        expected: "Laat af en weet, dat Ik God ben.\n",
        actual: $readVerse,
        message: "The verse was not read."
    );
});