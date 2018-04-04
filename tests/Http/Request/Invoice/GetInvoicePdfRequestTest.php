<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Request\Invoice;

use K0nias\FakturoidApi\Http\Request\Invoice\GetInvoicePdfRequest;
use K0nias\FakturoidApi\Model\Invoice\Id;
use PHPUnit\Framework\TestCase;

class GetInvoicePdfRequestTest extends TestCase
{
    public function testUri()
    {
        $request = new GetInvoicePdfRequest(new Id(1));

        $this->assertSame('invoices/1/download.pdf', $request->getUri());
    }
}