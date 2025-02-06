<?php

namespace App\Models;

class Item
{
    private string $id;
    private string $name;
    private int $quantity;
    private float $price;

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): Item {
        $this->id = $id;
        return $this;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): Item {
        $this->name = $name;
        return $this;
    }

    public function getQuantity(): int {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): Item {
        $this->quantity = $quantity;
        return $this;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function setPrice(float $price): Item {
        $this->price = $price;
        return $this;
    }

    public function getItemSubtotal() : float {
        return $this->getPrice() * $this->getQuantity();
    }
}