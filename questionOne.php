<?php
require 'vendor/autoload.php';

$data = require 'storage/fixtures/guests.php';
print_r((new App\Guests($data))->nestedRaw());