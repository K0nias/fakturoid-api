<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Response\Invoice;

use K0nias\FakturoidApi\Http\Response\Invoice\CreateInvoiceResponse;
use PHPUnit\Framework\TestCase;

class CreateInvoiceResponseTest extends TestCase
{

    public function testData(): void
    {
        $response = new CreateInvoiceResponse((string) json_encode([
            'id' => 1,
        ]));

        $this->assertSame(1, $response->getId()->getId());
    }

}
