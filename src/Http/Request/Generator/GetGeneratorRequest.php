<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Generator;

use K0nias\FakturoidApi\Api;
use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Http\Response\Generator\GetGeneratorResponse;
use K0nias\FakturoidApi\Model\Generator\Id;

final class GetGeneratorRequest implements RequestInterface
{

    private const REQUEST_URI = 'generators/%s.json';

    /** @var \K0nias\FakturoidApi\Model\Generator\Id */
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

    public function send(Api $api): GetGeneratorResponse
    {
        /** @var \K0nias\FakturoidApi\Http\Response\Generator\GetGeneratorResponse $response */
        $response = $api->process($this);

        return $response;
    }

}
