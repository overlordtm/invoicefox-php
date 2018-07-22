<?php
/**
 * Created by PhpStorm.
 * User: az
 * Date: 22.7.2018
 * Time: 11:42
 */

namespace RTFM\InvoiceFoxAPI\Tests\Integration;


use RTFM\InvoiceFoxAPI\Model\Invoice;
use RTFM\InvoiceFoxAPI\Model\InvoiceItem;

class InvoiceItemTest extends CRUDTestCase
{
    protected $modelClass = Invoice::class;

    protected function setUp()
    {
        parent::setUp();

        $this->invoice = $this->api->invoices()->create(InvoiceTest::createModel());

        $this->repo = $this->api->invoice($this->invoice->getId());
    }

    /**
     * @return \RTFM\InvoiceFoxAPI\Model\BaseModel|InvoiceItem
     */
    protected static function createModel()
    {
        return (new InvoiceItem())
            ->setTitle(static::$faker->words(2, true))
            ->setQty(static::$faker->numberBetween(0, 10))
            ->setPrice(static::$faker->randomFloat(2, 0.1, 100.0))
            ->setVat(static::$faker->randomElement(array(0.0, 8.5, 22.0)));
    }

}