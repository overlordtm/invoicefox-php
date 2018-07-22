<?php
/**
 * Created by PhpStorm.
 * User: az
 * Date: 22.7.2018
 * Time: 21:50
 */

namespace RTFM\InvoiceFoxAPI\API;


use RTFM\InvoiceFoxAPI\Model\InvoiceItem;

class InvoiceItemsRepository extends DependentResource
{

    protected $resourceName = 'invoice-sent-b';

    protected $resourceModel = InvoiceItem::class;

    protected static $partentIdField = "id_invoice_sent";

}