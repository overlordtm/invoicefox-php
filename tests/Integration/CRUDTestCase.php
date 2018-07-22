<?php

namespace RTFM\InvoiceFoxAPI\Tests\Integration;

use DateTime;
use ReflectionClass;
use RTFM\InvoiceFoxAPI\API\APIResource;
use RTFM\InvoiceFoxAPI\Model\BaseModel;
use RTFM\InvoiceFoxAPI\Tests\BaseTestCase;

abstract class CRUDTestCase extends BaseTestCase
{

    /** @var APIResource */
    protected $repo;

    /** @var string */
    protected $modelClass;

    protected function setUp()
    {
        parent::setUp();
        $this->repo = $this->api->invoices();
    }

    /**
     * @return BaseModel
     */
    abstract protected function createModel();

    protected function getterName($propertName, $capitalizeFirstCharacter = true)
    {

        $str = str_replace(' ', '', ucwords(str_replace('_', ' ', $propertName)));

        if (!$capitalizeFirstCharacter) {
            $str[0] = strtolower($str[0]);
        }

        return "get$str";
    }

    // CRUD tests below

    public function testListEmpty()
    {
        $invoices = $this->repo->list();
        $this->assertEmpty($invoices);
    }

    public function testCreateAndGet()
    {
        /** @var $model BaseModel */
        $model = $this->createModel();

        $createdModel = $this->repo->create($model);

        foreach ($model::$requiredFields as $field) {
            $getter = $this->getterName($field);

//            $expected = $model->$getter();
//            $actual = $createdModel->$getter();
//            $this->log("Comparing $field $getter $expected $actual");

            if(strpos($field, 'date') !== false) {
                $this->assertEqualDate($model->$getter(), $createdModel->$getter());
            } else {
                $this->assertEquals($model->$getter(), $createdModel->$getter());
            }
        }

        $getModel = $this->repo->get($createdModel->getId());

        $this->assertEquals($createdModel, $getModel);
    }

    public function testList()
    {
        $invoices = $this->repo->list();
        $this->assertEmpty($invoices);
    }

    /**
     * @param $expected
     * @param $actual
     */
    public function assertEqualDate($expected, $actual) {
        $this->assertEquals($this->dateToTimestamp($expected), $this->dateToTimestamp($actual));
    }

    /**
     * @param string $dateString
     * @return bool|DateTime
     */
    private function dateToTimestamp(string $dateString) {

        $format = 'd.m.Y';

        if(strpos($dateString, '-') !== false) {
            $format = 'Y-m-d';
        }

        return DateTime::createFromFormat($format, $dateString);
    }


}