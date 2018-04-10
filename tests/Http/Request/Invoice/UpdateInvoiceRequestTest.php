<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Request\Invoice;

use K0nias\FakturoidApi\Http\Request\Invoice\UpdateInvoiceRequest;
use K0nias\FakturoidApi\Model\Invoice\Id;
use K0nias\FakturoidApi\Model\Invoice\Parameters;
use PHPUnit\Framework\TestCase;

class UpdateInvoiceRequestTest extends TestCase
{
    public function testUri()
    {
        $request = new UpdateInvoiceRequest(new Id(1), new Parameters());

        $this->assertSame('invoices/1.json', $request->getUri());
    }
}