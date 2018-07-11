#!/usr/bin/env php
<?php

require __DIR__ . '/../vendor/autoload.php';

use RTFM\InvoiceFoxAPI\InvoiceFoxAPI;


$api = InvoiceFoxAPI::newInstance();

$file = fopen('php://stdin', 'r');

$header = fgetcsv($file, 0, ";");

print_r($header);

while (!feof($file)) {
    $line = fgetcsv($file, 0, ";");

    print_r($line);
}


fclose($file);
