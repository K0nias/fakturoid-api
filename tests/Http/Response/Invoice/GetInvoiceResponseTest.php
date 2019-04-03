<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Response\Invoice;

use K0nias\FakturoidApi\Http\Response\Invoice\GetInvoiceResponse;
use PHPUnit\Framework\TestCase;

class GetInvoiceResponseTest extends TestCase
{

    public function testData(): void
    {
        $response = new GetInvoiceResponse((string) json_encode([
            'id' => 1,
            // ...
        ]));

        $this->assertSame(['id' => 1], $response->getInvoice());
    }

}
