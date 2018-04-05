<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http;

use K0nias\FakturoidApi\Exception\InvalidOptionParameterException;
use K0nias\FakturoidApi\Http\Method;
use PHPUnit\Framework\TestCase;

class MethodTest extends TestCase
{
    public function testInvalidStatus()
    {
        $this->expectException(InvalidOptionParameterException::class);

        new Method('invalid_method');
    }

    public function testFactoryMethods()
    {
        $this->assertSame((Method::GET())->getMethod(), Method::GET_METHOD);
        $this->assertSame((Method::POST())->getMethod(), Method::POST_METHOD);
        $this->assertSame((Method::DELETE())->getMethod(), Method::DELETE_METHOD);
        $this->assertSame((Method::PATCH())->getMethod(), Method::PATCH_METHOD);
    }
}