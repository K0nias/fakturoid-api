<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\User;

use K0nias\FakturoidApi\Api;
use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\NotSlugAwareRequestInterface;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Http\Response\User\GetActualUserResponse;

final class GetActualUserRequest implements RequestInterface, NotSlugAwareRequestInterface
{

    private const REQUEST_URI = 'user.json';

    public function getUri(): string
    {
        return self::REQUEST_URI;
    }

    public function getMethod(): Method
    {
        return Method::GET();
    }

    /**
     * {@inheritdoc}
     */
    public function getData(): array
    {
        return [];
    }

    public function send(Api $api): GetActualUserResponse
    {
        /** @var \K0nias\FakturoidApi\Http\Response\User\GetActualUserResponse $response */
        $response = $api->process($this);

        return $response;
    }

}
