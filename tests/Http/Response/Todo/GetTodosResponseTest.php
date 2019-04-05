<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Response\Todo;

use K0nias\FakturoidApi\Http\Response\Todo\GetTodosResponse;
use PHPUnit\Framework\TestCase;

class GetTodosResponseTest extends TestCase
{

    public function testData(): void
    {
        $response = new GetTodosResponse((string) json_encode([
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
            $response->getTodos()
        );
    }

}
