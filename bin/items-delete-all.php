#!/usr/bin/env php
<?php

require __DIR__ . '/../vendor/autoload.php';

use RTFM\InvoiceFoxAPI\InvoiceFoxAPI;


$api = InvoiceFoxAPI::newInstance();

foreach ($api->itemList() as $item) {
    /* @var $item \RTFM\InvoiceFoxAPI\Model\Item */
    echo "Deleting " . $item->getCode() . "(" . $item->getId() . ")\n";
    $api->itemDelete($item->getId());
}

