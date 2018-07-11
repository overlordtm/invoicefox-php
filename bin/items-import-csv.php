#!/usr/bin/env php
<?php

require __DIR__ . '/../vendor/autoload.php';

use RTFM\InvoiceFoxAPI\InvoiceFoxAPI;


$api = InvoiceFoxAPI::newInstance();

$file = fopen('php://stdin', 'r');

$header = fgetcsv($file, 0, ";");

while (!feof($file)) {
    $line = fgetcsv($file, 0, ";");

    if ($line != false) {
        $data = array_combine($header, $line);
        $item = \RTFM\InvoiceFoxAPI\Model\Item::from($data);


        try {
            $existingItem = $api->itemGetByCode($item->getCode());
            $id = $existingItem->getId();
            echo "Item ($id) already exists\n";
        } catch (\RTFM\InvoiceFoxAPI\Exception\NotFoundException $exception) {
            $id = $api->itemCreate($item);

            echo "Item ($id) imported\n";
        }



    }
}


fclose($file);
