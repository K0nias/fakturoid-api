<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Response\User;

use K0nias\FakturoidApi\Http\Response\User\GetActualUserResponse;
use PHPUnit\Framework\TestCase;

class GetActualUserResponseTest extends TestCase
{

    public function testData(): void
    {
        $response = new GetActualUserResponse((string) json_encode([
            'id' => 1,
            // ...
        ]));

        $this->assertSame(['id' => 1], $response->getUser());
    }

}
