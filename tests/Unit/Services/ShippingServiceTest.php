<?php

namespace tests\Unit\Services;

use App\Services\ShippingService;
use PHPUnit\Framework\TestCase;

class ShippingServiceTest extends TestCase
{
    public function testGetRate(): void {
        $expectedRate = 5.30;
        $rate = ShippingService::getRate('90210');
        $this->assertEquals($expectedRate, $rate);
    }

    public function testGetRateReturnZeroWhenNoZipCodeIsSent(): void {
        $expectedRate = 0;
        $rate = ShippingService::getRate();
        $this->assertEquals($expectedRate, $rate);
    }
}