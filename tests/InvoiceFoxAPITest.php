<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use RTFM\InvoiceFoxAPI;
use RTFM\InvoiceFoxAPI\Exception\NotFoundException;

final class InvoiceFoxAPITest extends TestCase
{
    /**
     * @var InvoiceFoxAPI\InvoiceFoxAPI
     */
    protected $api;

    protected function setUp()
    {
        $this->api = InvoiceFoxAPI\InvoiceFoxAPI::newInstance();
    }


    public function testCanCreateDefaultInstance()
    {
        $this->assertInstanceOf(InvoiceFoxAPI\InvoiceFoxAPI::class, $this->api);
    }

    public function testPartnerList()
    {
        $partners = $this->api->partnerList();
        $this->assertNotEmpty($partners);
    }

    public function testPartnerCreateAndGet()
    {
        $partner = new InvoiceFoxAPI\Model\Partner();

        $partner->setName("Partner Name");

        $partnerId = $this->api->partnerCreate($partner);

        $partner2 = $this->api->partnerGet($partnerId);

        $this->assertInternalType("int", $partnerId);

        $this->assertEquals($partner->getName(), $partner2->getName());
    }

    public function testPartnerGetNonExisting()
    {
        $this->expectException(NotFoundException::class);
        $this->api->partnerGet(42424242);
    }

    public function testPartnerCreateAndDelete()
    {
        $partner = new InvoiceFoxAPI\Model\Partner();
        $partner->setName("Partner Name");

        $partnerId = $this->api->partnerCreate($partner);
        $this->assertInternalType("int", $partnerId);

        $success = $this->api->partnerDelete($partnerId);
        $this->assertTrue($success);

        $this->expectException(NotFoundException::class);
        $this->api->partnerGet($partnerId);

    }

}

