<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Generator;

use K0nias\FakturoidApi\Api;
use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Http\Response\Generator\CreateGeneratorResponse;
use K0nias\FakturoidApi\Model\Generator\Generator;

final class CreateGeneratorRequest implements RequestInterface
{

    private const REQUEST_URI = 'generators.json';

    /** @var \K0nias\FakturoidApi\Model\Generator\Generator */
    private $generator;

    public function __construct(Generator $generator)
    {
        $this->generator = $generator;
    }

    public function getUri(): string
    {
        return self::REQUEST_URI;
    }

    public function getMethod(): Method
    {
        return Method::POST();
    }

    /**
     * {@inheritdoc}
     */
    public function getData(): array
    {
        return $this->generator->getData();
    }

    public function send(Api $api): CreateGeneratorResponse
    {
        /** @var \K0nias\FakturoidApi\Http\Response\Generator\CreateGeneratorResponse $response */
        $response = $api->process($this);

        return $response;
    }

}
