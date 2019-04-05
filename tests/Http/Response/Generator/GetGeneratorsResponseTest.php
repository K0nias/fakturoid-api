<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Response\Generator;

use K0nias\FakturoidApi\Http\Response\Generator\GetGeneratorsResponse;
use PHPUnit\Framework\TestCase;

class GetGeneratorsResponseTest extends TestCase
{

    public function testData(): void
    {
        $response = new GetGeneratorsResponse((string) json_encode([
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
