<?php
/**
 * Created by PhpStorm.
 * User: az
 * Date: 22.7.2018
 * Time: 11:42
 */

namespace RTFM\InvoiceFoxAPI\Tests\Invoice;


use RTFM\InvoiceFoxAPI\Model\Invoice;

class InvoiceTest extends CRUDTestCase
{
    protected $modelClass = Invoice::class;

    protected function setUp()
    {
        parent::setUp();
        $this->repo = $this->api->invoices();
    }

    /**
     * @return \RTFM\InvoiceFoxAPI\Model\BaseModel|Invoice
     */
    protected function createModel()
    {
        $model = new Invoice();

        $model->setDateSent(static::$faker->date(Invoice::$dateFormat))
            ->setDateToPay(static::$faker->date(Invoice::$dateFormat))
            ->setIdPartner(0);

        return $model;
    }

}