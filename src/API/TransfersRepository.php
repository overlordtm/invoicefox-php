<?php
/**
 * Created by PhpStorm.
 * User: az
 * Date: 22.7.2018
 * Time: 0:49
 */

namespace RTFM\InvoiceFoxAPI\API;


use RTFM\InvoiceFoxAPI\Model\Transfer;

class TransfersRepository extends APIResource
{

    protected $resourceName = 'transfer';

    protected $resourceModel = Transfer::class;

}