<?php
declare(strict_types=1);

namespace App;

use App\Traits\WithArrays;

class Guests
{
    use WithArrays;

    public function __construct(protected array $data) {
    }

    public function nested(): string {
        return $this->flatten($this->data);
    }
}