<?php

require_once 'vendor/autoload.php';

class Booking {
    public function flatten(array $data): string {
        $results = [];
        $counter = 0;

        foreach ($data as $item) {
            array_walk_recursive($item, function ($value, $key) use (&$results, $counter) {
                $results[$counter][$key] = $value;
            });

            $counter++;
        }

        return json_encode($results);
    }
}
$data = require 'storage/fixtures/guests.php';


$bookings = [];
$bookings = (new Booking())->flatten($data);
print_r($bookings);