<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Response\Generator;

use K0nias\FakturoidApi\Http\Response\Generator\GetTemplateGeneratorsResponse;
use PHPUnit\Framework\TestCase;

class GetTemplateGeneratorsResponseTest extends TestCase
{

    public function testData(): void
    {
        $response = new GetTemplateGeneratorsResponse((string) json_encode([
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
