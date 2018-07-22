<?php
declare(strict_types=1);

namespace RTFM\InvoiceFoxAPI\Tests;

use PHPUnit\Framework\TestCase;
use RTFM\InvoiceFoxAPI;
use Faker;

abstract class BaseTestCase extends TestCase
{
    /** @var InvoiceFoxAPI\InvoiceFox */
    protected $api;

    /** @var Faker\Generator */
    protected static $faker;

    public static function setUpBeforeClass()
    {
        self::$faker = Faker\Factory::create('sl_SI');
        self::$faker->seed(1234);
    }

    protected function setUp()
    {
        $this->api = InvoiceFoxAPI\InvoiceFox::newInstance();
        $this->cleanup();
    }

    private function cleanup()
    {

        foreach ($this->api->invoices()->list() as $item) {
            /* @var $item InvoiceFoxAPI\Model\Item */
            $this->api->invoices()->delete($item->getId());
        }

        foreach ($this->api->partners()->list() as $item) {
            /* @var $item InvoiceFoxAPI\Model\Item */
            $this->api->partners()->delete($item->getId());
        }

        foreach ($this->api->items()->list() as $item) {
            /* @var $item InvoiceFoxAPI\Model\Item */
            $this->api->items()->delete($item->getId());
        }

        foreach ($this->api->transfers()->list() as $item) {
            /* @var $item InvoiceFoxAPI\Model\Item */
            $this->api->transfers()->delete($item->getId());
        }
    }

    protected function log($message) {
        fwrite(STDERR, print_r("LOG: " . $message . "\n", TRUE));
    }

}

