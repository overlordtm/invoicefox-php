<?php
/**
 * Created by PhpStorm.
 * User: az
 * Date: 22.7.2018
 * Time: 11:42
 */

namespace RTFM\InvoiceFoxAPI\Tests\Integration;


use RTFM\InvoiceFoxAPI\Model\Partner;

class PartnerTest extends CRUDTestCase
{
    protected $modelClass = Partner::class;

    protected function setUp()
    {
        parent::setUp();
        $this->repo = $this->api->partners();
    }

    /**
     * @return \RTFM\InvoiceFoxAPI\Model\BaseModel|Partner
     */
    protected static function createModel()
    {
        $model = new Partner();

        $model->setName(static::$faker->name())->setVatid("1234567");

        return $model;
    }

}