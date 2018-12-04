<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Request\Invoice;

use K0nias\FakturoidApi\Http\Request\Invoice\DeleteInvoiceRequest;
use K0nias\FakturoidApi\Model\Invoice\Id;
use PHPUnit\Framework\TestCase;

class DeleteInvoiceRequestTest extends TestCase
{

    public function testUri(): void
    {
        $request = new DeleteInvoiceRequest(new Id(1));

        $this->assertSame('invoices/1.json', $request->getUri());
    }

}
