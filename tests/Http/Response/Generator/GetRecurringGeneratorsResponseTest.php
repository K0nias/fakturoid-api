<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Response\Generator;

use K0nias\FakturoidApi\Http\Response\Generator\GetRecurringGeneratorsResponse;
use PHPUnit\Framework\TestCase;

class GetRecurringGeneratorsResponseTest extends TestCase
{

    public function testData(): void
    {
        $response = new GetRecurringGeneratorsResponse((string) json_encode([
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
            $response->getGenerators()
        );
    }

}
