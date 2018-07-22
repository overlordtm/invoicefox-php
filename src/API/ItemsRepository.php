<?php
/**
 * Created by PhpStorm.
 * User: az
 * Date: 22.7.2018
 * Time: 0:49
 */

namespace RTFM\InvoiceFoxAPI\API;


use RTFM\InvoiceFoxAPI\Model\Item;

class ItemsRepository extends Resource
{

    protected $resourceName = 'item';

    protected $resourceModel = Item::class;

}