<?php
declare(strict_types=1);

namespace App;

use App\Traits\WithArrays;

class Guests
{
    use WithArrays;

    public function printNested(array $data): string {
        return $this->flattenRaw($data);
    }

    public function sortRecursive(array $data, array $sortKeys): array {
        return $this->sort($data, $sortKeys);
    }
}