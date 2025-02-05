<?php

namespace tests\Unit;

use App\Guests;
use PHPUnit\Framework\TestCase;

class GuestsTest extends TestCase
{
    public function testNested(): void {
        $data = require 'storage/fixtures/guests.php';
        $expectedOutput = require 'tests/storage/fixtures/guestsNested.php';

        $results = (new Guests($data))->nestedRaw();

        $this->assertStringContainsString($expectedOutput, $results);
    }

    public function testNestedReturnsEmptyStringForEmptyArray(): void {
        $results = (new Guests([]))->nestedRaw();
        $this->assertEmpty($results);
    }
}
