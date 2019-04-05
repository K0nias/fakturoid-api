<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Response;

use K0nias\FakturoidApi\Http\Response\GetAccountResponse;
use PHPUnit\Framework\TestCase;

class GetAccountResponseTest extends TestCase
{

    public function testData(): void
    {
        $response = new GetAccountResponse((string) json_encode([
            'plan' => 'Firma',
            // ...
        ]));

        $this->assertSame(['plan' => 'Firma'], $response->getAccount());
    }

}
