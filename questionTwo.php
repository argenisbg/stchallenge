<?php
require 'vendor/autoload.php';

$data = require 'storage/fixtures/guests.php';
print_r((new App\Guests())->sortRecursive(
    $data, ['first_name', 'last_name', 'account_id'])
);