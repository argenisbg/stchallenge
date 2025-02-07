<?php

namespace App\Traits;

trait WithArrays
{
    public function flatten(array $array): array {
        $output = [];

        array_walk_recursive($array, function($value, $key) use (&$output) {
            $output += [$key => $value];
        });

        return $output;
    }

    public function flattenRaw(array $array, int $indent = 0): string {
        $output = '';
        foreach ($array as $key => $value) {
            if (is_int($key)) {
                $output.= $this->flattenRaw($value, $indent );
                continue;
            }

            $prefix = str_repeat("  ", $indent);

            if (is_array($value)) {
                $output.= "$prefix$key:\n";
                $output.= $this->flattenRaw($value, $indent + 1);
                continue;
            }

            $output.= "$prefix$key: $value\n";
        }

        return $output;
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