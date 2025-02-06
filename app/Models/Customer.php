<?php
declare(strict_types=1);

namespace App\Models;

class Customer
{
    private string $firstName;
    private string $lastName;
    /**
     * @var Address[]
     */
    private array $addresses;

    public function getFirstName(): string {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): Customer {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): string {
        return $this->lastName;
    }

    public function setLastName(string $lastName): Customer {
        $this->lastName = $lastName;
        return $this;
    }

    public function getFullName(): string {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getAddresses(): array {
        return $this->addresses;
    }

    public function setAddresses(array $addresses): Customer {
        $this->addresses = $addresses;
        return $this;
    }
}