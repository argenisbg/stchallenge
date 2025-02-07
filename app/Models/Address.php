<?php
declare(strict_types=1);

namespace App\Models;

class Address
{
    private string $lineOne;
    private ?string $lineTwo;
    private string $city;
    private string $state;
    private string $zipCode;

    public function getLineOne(): string {
        return $this->lineOne;
    }

    public function setLineOne(string $lineOne): Address {
        $this->lineOne = $lineOne;
        return $this;
    }

    public function getLineTwo(): ?string {
        return $this->lineTwo;
    }

    public function setLineTwo(?string $lineTwo): Address {
        $this->lineTwo = $lineTwo;
        return $this;
    }

    public function getCity(): string {
        return $this->city;
    }

    public function setCity(string $city): Address {
        $this->city = $city;
        return $this;
    }

    public function getState(): string {
        return $this->state;
    }

    public function setState(string $state): Address {
        $this->state = $state;
        return $this;
    }

    public function getZipCode(): ?string {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): Address {
        $this->zipCode = $zipCode;
        return $this;
    }
}