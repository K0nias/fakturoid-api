<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request;

use K0nias\FakturoidApi\Api;
use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Response\GetAccountResponse;

final class GetAccountRequest implements RequestInterface
{

    private const REQUEST_URI = 'account.json';

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

    public function send(Api $api): GetAccountResponse
    {
        /** @var \K0nias\FakturoidApi\Http\Response\GetAccountResponse $response */
        $response = $api->process($this);

        return $response;
    }

}
