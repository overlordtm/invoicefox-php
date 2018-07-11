#!/usr/bin/env php
<?php

require __DIR__ . '/../vendor/autoload.php';

use RTFM\InvoiceFoxAPI\InvoiceFoxAPI;
use RTFM\InvoiceFoxAPI\Model\Transfer;


$api = InvoiceFoxAPI::newInstance();

$file = fopen('php://stdin', 'r');

$transfer = new Transfer();

$transfer->setDateCreated("11.7.2018");
$transfer->setDocnum("ZACETNO STANJE");
$transfer->setDoctype(Transfer::DOCTYPE_IN);
$transfer->setDocsubtype(Transfer::SUBTYPE_INITIAL_STATE);

$transfer_id = $api->transferCreate($transfer);

$header = fgetcsv($file, 0, ";");

while (!feof($file)) {
    $line = fgetcsv($file, 0, ";");

    if ($line != false) {
        $data = array_combine($header, $line);
        $item = \RTFM\InvoiceFoxAPI\Model\Item::from($data);

        $realItem = NULL;

        try {
            $realItem = $api->itemGetByCode($item->getCode());
        } catch (\RTFM\InvoiceFoxAPI\Exception\NotFoundException $exception) {
            $id = $api->itemCreate($item);
            $realItem = $api->itemGet($id);
        }

        $transferItem = \RTFM\InvoiceFoxAPI\Model\TransferItem::fromItem($realItem);

        $transferItem->setQty(intval($data["qty"]));
        $transferItem->setPrice(floatval($data['buy_price']));

        $api->transferAddItem($transfer_id, $transferItem);
    }
}


fclose($file);
