<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Response;

use K0nias\FakturoidApi\Exception\MissingResponseClassException;
use K0nias\FakturoidApi\Http\Request\GetUsersRequest;
use K0nias\FakturoidApi\Http\Response\GetUsersResponse;
use K0nias\FakturoidApi\Http\Response\ResponseResolver;
use K0nias\FakturoidApi\Tests\Http\Request\Mock\MissingResponseRequestMock;
use PHPUnit\Framework\TestCase;

class ResponseResolverTest extends TestCase
{
    public function testMissingResponseException()
    {
        $resolver = new ResponseResolver();

        $this->expectException(MissingResponseClassException::class);

        $resolver->resolve(new MissingResponseRequestMock());
    }

    public function testCreatingResponse()
    {
        $resolver = new ResponseResolver();

        $response = $resolver->resolve(new GetUsersRequest());

        $this->assertInstanceOf(GetUsersResponse::class, $response);
    }
}