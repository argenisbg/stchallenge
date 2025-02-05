<?php
namespace App\Traits;

trait WithArrays
{
    public function flatten(array $data): string {
        $results = "";

        array_walk_recursive($data, function ($value, $key) use (&$results) {
            $results .= "$key : $value \n";
        });

        return $results;
    }
}