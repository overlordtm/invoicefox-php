<?php
/**
 * Created by PhpStorm.
 * User: az
 * Date: 22.7.2018
 * Time: 11:42
 */

namespace RTFM\InvoiceFoxAPI\Tests\Integration;


use RTFM\InvoiceFoxAPI\Model\Partner;
use RTFM\InvoiceFoxAPI\Model\Transfer;

class TransferTest extends CRUDTestCase
{
    protected $modelClass = Transfer::class;

    protected function setUp()
    {
        parent::setUp();
        $this->repo = $this->api->transfers();
    }

    /**
     * @return \RTFM\InvoiceFoxAPI\Model\BaseModel|Partner
     */
    protected function createModel()
    {
        $model = new Transfer();

        $model->setDocnum(static::$faker->numerify("##-####"))
            ->setDateCreated(static::$faker->date("d.m.Y"));

        return $model;
    }

}