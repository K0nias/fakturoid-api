<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\User;

use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\NotSlugAwareRequestInterface;
use K0nias\FakturoidApi\Http\Request\RequestInterface;

final class GetActualUserRequest implements RequestInterface, NotSlugAwareRequestInterface
{
    const REQUEST_URI = 'user.json';

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