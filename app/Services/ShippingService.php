<?php

namespace App\Services;

class ShippingService
{
    public static function getRate(?string $zipCode = null) : float {
        return match ($zipCode) {
            '90210' => 5.30,
            '90212' => 8.20,
            default => 0
        };
    }
}