<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\User;

use K0nias\FakturoidApi\Api;
use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Http\Response\User\GetUserResponse;
use K0nias\FakturoidApi\Model\User\Id;

final class GetUserRequest implements RequestInterface
{

    private const REQUEST_URI = 'users/%s.json';

    /** @var \K0nias\FakturoidApi\Model\User\Id */
    private $id;

    public function __construct(Id $id)
    {
        $this->id = $id;
    }

    public function getUri(): string
    {
        return sprintf(self::REQUEST_URI, $this->id->getId());
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

    public function send(Api $api): GetUserResponse
    {
        /** @var \K0nias\FakturoidApi\Http\Response\User\GetUserResponse $response */
        $response = $api->process($this);

        return $response;
    }

}
