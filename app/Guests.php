<?php
declare(strict_types=1);

namespace App;

class Guests
{
    public function __construct(protected array $data) {
    }

    public function nestedRaw(): string {
        $results = "";

        array_walk_recursive($this->data, function ($value, $key) use (&$results) {
            $results .= "$key : $value \n";
        });

        return $results;
    }
}