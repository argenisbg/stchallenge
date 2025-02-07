<?php

use App\Models\Address;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Item;

require 'vendor/autoload.php';

$itemOne = new Item();
$itemOne->setId('0918783')
        ->setName('Item 1')
        ->setQuantity(1)
        ->setPrice(10);

$itemTwo = new Item();
$itemTwo->setId('0918792')
        ->setName('Item 2')
        ->setQuantity(2)
        ->setPrice(8);

$addressOne = new Address();
$addressOne->setLineOne('Rexford Dr')
           ->setCity('Beverly Hills')
           ->setState('CA')
           ->setZipCode('90212');

$addressTwo = new Address();
$addressTwo->setLineOne('N Camden Dr')
           ->setLineTwo('Apartment 10')
           ->setCity('Beverly Hills')
           ->setState('CA')
           ->setZipCode('90210');

$customer = new Customer();
$customer->setFirstName('Argenis')
         ->setLastName('Barraza')
         ->setAddresses([$addressOne, $addressTwo]);

$cart = new Cart();
$cart->setCustomer($customer)
     ->setShippingAddress($addressOne)
     ->setItems([$itemOne, $itemTwo]);

print_r([
    'Customer Name'           => $cart->getCustomer()->getFullName(),
    'Customer Addresses' => $cart->getCustomer()->getAddresses(),
    'Cart Items'         => $cart->getItems(),
    'Shipping Address'   => $cart->getShippingAddress(),
    'Subtotal'           => $cart->getCartSubtotal(),
    'Shipping'      => $cart->getCartShipping(),
    'Tax'           => $cart->getCartTax(),
    'Total'              => $cart->getCartTotal()
]);

