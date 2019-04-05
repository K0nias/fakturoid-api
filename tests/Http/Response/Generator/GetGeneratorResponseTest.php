<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Response\Generator;

use K0nias\FakturoidApi\Http\Response\Generator\GetGeneratorResponse;
use PHPUnit\Framework\TestCase;

class GetGeneratorResponseTest extends TestCase
{

    public function testData(): void
    {
        $response = new GetGeneratorResponse((string) json_encode([
            'id' => 1,
            // ...
        ]));

        $this->assertSame(['id' => 1], $response->getGenerator());
    }

}
