<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use RTFM\InvoiceFoxAPI;

final class InvoiceFoxAPITest extends TestCase
{
    public function testCanCreateDefaultInstance(): void
    {
        $api = InvoiceFoxAPI\InvoiceFoxAPI::newInstance();
        $this->assertInstanceOf(InvoiceFoxAPI\InvoiceFoxAPI::class, $api);
    }

    public function testListPartners(): void
    {
        $api = InvoiceFoxAPI\InvoiceFoxAPI::newInstance();
        $partners = $api->partnerList();



        $this->assertEmpty($partners);

        $this->assertInstanceOf(InvoiceFoxAPI\InvoiceFoxAPI::class, $api);
    }

}

