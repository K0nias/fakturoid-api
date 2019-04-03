<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Response\User;

use K0nias\FakturoidApi\Http\Response\User\GetUsersResponse;
use PHPUnit\Framework\TestCase;

class GetUsersResponseTest extends TestCase
{

    public function testData(): void
    {
        $response = new GetUsersResponse((string) json_encode([
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
            $response->getUsers()
        );
    }

}
