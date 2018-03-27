<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Request;

use K0nias\FakturoidApi\Http\Request\GetUserRequest;
use K0nias\FakturoidApi\Model\User\Id;
use PHPUnit\Framework\TestCase;

class GetUserRequestTest extends TestCase
{
    public function testUri()
    {
        $request = new GetUserRequest(new Id(1));

        $this->assertSame('users/1.json', $request->getUri());
    }
}