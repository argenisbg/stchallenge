<?php

namespace tests\Unit;

use App\Guests;
use PHPUnit\Framework\TestCase;

class GuestsTest extends TestCase
{
    public function testPrintNested(): void {
        $data           = require 'storage/fixtures/guests.php';
        $expectedOutput = require 'tests/storage/fixtures/guestsNested.php';

        $results = (new Guests())->printNested($data);

        $this->assertStringContainsString($expectedOutput, $results);
    }

    public function testPrintNestedReturnsEmptyStringForEmptyArray(): void {
        $results = (new Guests())->printNested([]);
        $this->assertEmpty($results);
    }

    public function testSortRecursive(): void {
        $data                          = require 'storage/fixtures/guests.php';
        $expectedFirstElementFirstName = 'Marco';
        $expectedFirstElementLastName  = 'Burns';
        $expectedLastElementFirstName  = 'Al ';
        $expectedLastElementLastName   = 'Santiago';

        $results = (new Guests())
            ->sortRecursive($data,
                [
                    'last_name',
                    'account_id'
                ]
            );

        $firstElement = current($results);
        $lastElement  = end($results);

        $this->assertEquals($expectedFirstElementFirstName, $firstElement['first_name']);
        $this->assertEquals($expectedFirstElementLastName, $firstElement['last_name']);

        $this->assertEquals($expectedLastElementFirstName, $lastElement['first_name']);
        $this->assertEquals($expectedLastElementLastName, $lastElement['last_name']);
    }

    public function testSortRecursiveForRepeatedNameAndDifferentAccountId(): void {
        $data                         = require 'tests/storage/fixtures/sortSampleData.php';
        $expectedAccountId            = 1024;
        $expectedFirstName            = 'Han';
        $expectedMiddleName           = 'Star Wars';
        $expectedLastName             = 'Solo';
        $expectedLastElementLastName  = 'Quill';
        $expectedNextElementAccountId = 2048;

        $results = (new Guests())
            ->sortRecursive($data,
                [
                    'first_name',
                    'middle_name',
                    'last_name',
                    'account_id'
                ]
            );

        $firstElement = current($results);
        $nextElement  = next($results);
        $lastElement  = end($results);

        $this->assertEquals($expectedFirstName, $firstElement['first_name']);
        $this->assertEquals($expectedMiddleName, $firstElement['middle_name']);
        $this->assertEquals($expectedLastName, $firstElement['last_name']);
        $this->assertEquals($expectedAccountId, $firstElement['guest_account'][0]['account_id']);

        $this->assertEquals($expectedFirstName, $nextElement['first_name']);
        $this->assertEquals($expectedMiddleName, $nextElement['middle_name']);
        $this->assertEquals($expectedLastName, $nextElement['last_name']);
        $this->assertEquals($expectedNextElementAccountId, $nextElement['guest_account'][0]['account_id']);

        $this->assertEquals($expectedLastElementLastName, $lastElement['last_name']);
    }
}
