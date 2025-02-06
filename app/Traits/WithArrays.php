<?php

namespace App\Traits;

trait WithArrays
{
    public function flatten(array $array): array {
        $results = [];

        array_walk_recursive($array, function($value, $key) use (&$results) {
            $results += [$key => $value];
        });

        return $results;
    }

    public function flattenRaw(array $array): string {
        $results = "";

        array_walk_recursive($array, function ($value, $key) use (&$results) {
            $results .= "$key : $value \n";
        });

        return $results;
    }

    public function sort(array &$array, array $sortKeys): array {
        $sortKeys = array_reverse($sortKeys);

        foreach ($sortKeys as $sortKey) {
            usort($array, function ($a, $b) use ($sortKey) {
                $a = $this->flatten($a)[$sortKey] ?? null;
                $b = $this->flatten($b)[$sortKey] ?? null;

                return $a <=> $b;
            });
        }

        return $array;
    }
}