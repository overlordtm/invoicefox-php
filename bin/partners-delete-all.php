#!/usr/bin/env php
<?php

require __DIR__ . '/../vendor/autoload.php';

use RTFM\InvoiceFoxAPI\InvoiceFoxAPI;


$api = InvoiceFoxAPI::newInstance();


$partners =  $api->partnerList();

foreach ($partners as $partner) {
    /* @var $partner \RTFM\InvoiceFoxAPI\Model\Partner */
    if($partner->getParent() > -1) {
        echo "Deleting " . $partner->getName() . "(" . $partner->getId() . ")\n";
        $api->partnerDelete($partner->getId());
    }
}

