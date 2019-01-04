<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Request\Mock;

use K0nias\FakturoidApi\Api;
use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Http\Response\ResponseInterface;

class MissingResponseRequestMock implements RequestInterface
{

    public function getUri(): string
    {
        return '';
    }

    public function getMethod(): Method
    {
        return Method::GET();
    }

    /** @return mixed[] */
    public function getData(): array
    {
        return [];
    }

    public function send(Api $api): ResponseInterface
    {
        // not used - ignored
    }

}
