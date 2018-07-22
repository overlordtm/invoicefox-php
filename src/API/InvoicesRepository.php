<?php
/**
 * Created by PhpStorm.
 * User: az
 * Date: 22.7.2018
 * Time: 0:49
 */

namespace RTFM\InvoiceFoxAPI\API;


use RTFM\InvoiceFoxAPI\Model\Invoice;

class InvoicesRepository extends APIResource
{

    protected $resourceName = 'invoice-sent';

    protected $resourceModel = Invoice::class;

}