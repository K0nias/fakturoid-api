<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Response\Invoice;

use K0nias\FakturoidApi\Http\Response\Invoice\GetInvoicePdfResponse;
use PHPUnit\Framework\TestCase;

class GetInvoicePdfResponseTest extends TestCase
{

    public function testData(): void
    {
        $response = new GetInvoicePdfResponse('pdf_content');

        $this->assertSame('pdf_content', $response->getPdfContent());
    }

    public function testResponseDefaultMethods(): void
    {
        $response = new GetInvoicePdfResponse('pdf_content');

        $this->assertFalse($response->hasError());
        $this->assertSame([], $response->getErrors());
    }

}
