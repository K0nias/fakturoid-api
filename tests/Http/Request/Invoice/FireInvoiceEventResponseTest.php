<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Request\Invoice;

use K0nias\FakturoidApi\Http\Request\Invoice\FireInvoiceEventRequest;
use K0nias\FakturoidApi\Model\Invoice\Id;
use K0nias\FakturoidApi\Model\Invoice\Event;
use PHPUnit\Framework\TestCase;

class FireInvoiceEventResponseTest extends TestCase
{
    public function testUri()
    {
        $request = new FireInvoiceEventRequest(new Id(1), Event::cancel());

        $this->assertSame('invoices/1/fire.json?event=cancel', $request->getUri());
    }
}