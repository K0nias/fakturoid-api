<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Response;

use K0nias\FakturoidApi\Http\Request\User\GetUsersRequest;
use K0nias\FakturoidApi\Http\Response\ResponseResolver;
use K0nias\FakturoidApi\Http\Response\User\GetUsersResponse;
use K0nias\FakturoidApi\Tests\Http\Request\Mock\MissingResponseRequestMock;
use PHPUnit\Framework\TestCase;

class ResponseResolverTest extends TestCase
{

    public function testMissingResponseException(): void
    {
        $resolver = new ResponseResolver();

        $this->expectException(\K0nias\FakturoidApi\Exception\MissingResponseClassException::class);

        $resolver->resolve(new MissingResponseRequestMock());
    }

    public function testCreatingResponse(): void
    {
        $resolver = new ResponseResolver();

        $response = $resolver->resolve(new GetUsersRequest());

        $this->assertInstanceOf(GetUsersResponse::class, $response);
    }

}
