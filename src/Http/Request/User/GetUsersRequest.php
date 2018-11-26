<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\User;

use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;

final class GetUsersRequest implements RequestInterface
{

    private const REQUEST_URI = 'users.json';

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

}
