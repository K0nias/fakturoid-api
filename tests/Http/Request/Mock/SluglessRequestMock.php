<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Request\Mock;

use K0nias\FakturoidApi\Api;
use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\NotSlugAwareRequestInterface;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Http\Response\ResponseInterface;

class SluglessRequestMock implements RequestInterface, NotSlugAwareRequestInterface
{

    public function getUri(): string
    {
        return 'slug_less_uri.json';
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
