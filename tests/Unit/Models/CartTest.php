<?php

namespace tests\Unit\Models;

use App\Models\Cart;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    public function testGetShippingRate(): void {
        $expectedRate = 5.30;
        $cart = new Cart();

        $this->assertEquals($expectedRate, $cart->getShippingRate('90210'));
    }

    public function testGetShippingRateForNullZipCode(): void {
        $cart = new Cart();

        $this->assertEmpty($cart->getShippingRate(null));
    }
}