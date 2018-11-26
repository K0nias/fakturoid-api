<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Request\Mock;

use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;

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

}
