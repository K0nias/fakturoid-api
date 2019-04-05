<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Response\Invoice;

use K0nias\FakturoidApi\Http\Response\Invoice\GetInvoicesResponse;
use PHPUnit\Framework\TestCase;

class GetInvoicesResponseTest extends TestCase
{

    public function testData(): void
    {
        $response = new GetInvoicesResponse((string) json_encode([
            [
                'id' => 201,
                // ...
            ],
            [
                'id' => 202,
                // ...
            ],
        ]));

        $this->assertSame(
            [
                ['id' => 201],
                ['id' => 202],
            ],
            $response->getInvoices()
        );
    }

}
