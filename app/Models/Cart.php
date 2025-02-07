<?php
declare(strict_types=1);

namespace App\Models;

use App\Services\ShippingService;

class Cart
{
    const TAX_RATE = 7;

    private Customer $customer;

    /**
     * @var array|Item[]
     */
    private array $items;

    private ?Address $shippingAddress;

    public function __construct() {
        $this->items = [];
    }

    public function getCustomer(): Customer {
        return $this->customer;
    }

    public function setCustomer(Customer $customer): Cart {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return Item[]
     */
    public function getItems(): array {
        return $this->items;
    }

    public function setItems(array $items): Cart {
        $this->items = $items;
        return $this;
    }

    public function setItem(Item $item): Cart {
        $this->items[] = $item;
        return $this;
    }

    public function getTaxRate(): float {
        return self::TAX_RATE / 100;
    }

    public function getShippingAddress(): Address {
        return $this->shippingAddress;
    }

    public function setShippingAddress(Address $shippingAddress): Cart {
        $this->shippingAddress = $shippingAddress;
        return $this;
    }

    public function getCartSubtotal(): float {
        $total = 0;

        foreach ($this->items as $item) {
            $total += ($item->getPrice() * $item->getQuantity());
        }

        return $total;
    }

    public function getCartTax(): float {
        return $this->getCartSubtotal() * $this->getTaxRate();
    }

    public function getCartShipping(): float {
        return ShippingService::getRate(
            $this->shippingAddress->getZipCode()
        );
    }

    public function getCartTotal(): float {
        return $this->getCartSubtotal() + $this->getCartTax() + $this->getCartShipping();
    }
}