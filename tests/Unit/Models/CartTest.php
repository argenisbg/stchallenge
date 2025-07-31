<?php

namespace tests\Unit\Models;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Item;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    public function testGetTaxRate(): void {
        $expectedTaxRate = .07;

        $cart = new Cart();

        $this->assertEquals($expectedTaxRate, $cart->getTaxRate());
    }

    public function testGetCartSubtotal(): void {
        $expectedSubtotal = 22.8;

        $itemOne = new Item();
        $itemOne->setId('000100')
                ->setName('Hot wheels car')
                ->setQuantity(3)
                ->setPrice(2.6);

        $itemTwo = new Item();
        $itemTwo->setId('000101')
                ->setName('Play doh')
                ->setQuantity(4)
                ->setPrice(1.5);

        $itemThree = new Item();
        $itemThree->setId('000102')
                  ->setName('Ironman')
                  ->setQuantity(1)
                  ->setPrice(9);

        $cart = new Cart();
        $cart->setItems([$itemOne, $itemTwo, $itemThree]);

        $this->assertEquals($expectedSubtotal, $cart->getSubtotal());
    }

    public function testGetCartTax(): void {
        $expectedTaxRate = 0.6993;

        $itemOne = new Item();
        $itemOne->setId('000103')
                ->setName('Barbie')
                ->setQuantity(1)
                ->setPrice(9.99);

        $cart = new Cart();
        $cart->setItems([$itemOne]);

        $this->assertEquals($expectedTaxRate, $cart->getTax());
    }

    public function testGetCartShipping(): void {
        $expectedCartShipping = 8.20;

        $address = new Address();
        $address->setLineOne('test address')
                ->setZipCode('90212');

        $cart = new Cart();
        $cart->setShippingAddress($address);

        $this->assertEquals($expectedCartShipping, $cart->getShipping());
    }

    public function testGetCartTotal(): void {

        $expectedTotalWithShippingAndTax = 68.6443;

        $address = new Address();
        $address->setLineOne('test address')
                ->setZipCode('90212');

        $itemOne = new Item();
        $itemOne->setId('000104')
                ->setName('Ricochet')
                ->setQuantity(2)
                ->setPrice(6.75);

        $itemTwo = new Item();
        $itemTwo->setId('000105')
                ->setName('Puzzle')
                ->setQuantity(2)
                ->setPrice(3);

        $itemThree = new Item();
        $itemThree->setId('000106')
                  ->setName('Gameboy')
                  ->setQuantity(1)
                  ->setPrice(36.99);

        $cart = new Cart();
        $cart->setShippingAddress($address)
             ->setItems([$itemOne, $itemTwo, $itemThree]);

        $this->assertEquals($expectedTotalWithShippingAndTax, $cart->getTotal());
    }
}