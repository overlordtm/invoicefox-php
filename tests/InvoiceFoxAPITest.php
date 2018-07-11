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

    public function testTransferCreate() {
        $transfer = new InvoiceFoxAPI\Model\Transfer();


        $transfer->setDateCreated("11.7.2018");
        $transfer->setDocnum("TEST DOCUMENT");
        $transfer->setDoctype(InvoiceFoxAPI\Model\Transfer::DOCTYPE_IN);
        $transfer->setDocsubtype(InvoiceFoxAPI\Model\Transfer::SUBTYPE_INITIAL_STATE);

        $transfer_id = $this->api->transferCreate($transfer);

        $this->assertInternalType("int", $transfer_id);

//        $item = new InvoiceFoxAPI\Model\Item();
//        $item->setCode("Test item");
//        $item->setPrice(666.6);
//        $item->setTax(0);
//
//        $titem = new InvoiceFoxAPI\Model\TransferItem();

    }

}

