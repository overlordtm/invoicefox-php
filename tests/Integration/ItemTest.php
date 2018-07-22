<?php
/**
 * Created by PhpStorm.
 * User: az
 * Date: 22.7.2018
 * Time: 11:42
 */

namespace RTFM\InvoiceFoxAPI\Tests\Integration;


use RTFM\InvoiceFoxAPI\Model\Item;
use RTFM\InvoiceFoxAPI\Model\Partner;

class ItemTest extends CRUDTestCase
{
    protected $modelClass = Partner::class;

    protected function setUp()
    {
        parent::setUp();
        $this->repo = $this->api->items();
    }

    /**
     * @return \RTFM\InvoiceFoxAPI\Model\BaseModel|Partner
     */
    protected static function createModel()
    {
        $model = new Item();

        $model->setCode(static::$faker->bothify("??###"))
            ->setTax(static::$faker->randomElement(array(0, 9.5, 22)))
            ->setPrice(static::$faker->numberBetween(0, 1000) / 10.0);

        return $model;
    }

}