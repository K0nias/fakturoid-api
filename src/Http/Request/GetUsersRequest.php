<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request;

use K0nias\FakturoidApi\Http\Method;

final class GetUsersRequest implements RequestInterface
{
    const REQUEST_URI = 'users.json';

    /**
     * {@inheritdoc}
     */
    public function getUri(): string
    {
        return self::REQUEST_URI;
    }

    /**
     * {@inheritdoc}
     */
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