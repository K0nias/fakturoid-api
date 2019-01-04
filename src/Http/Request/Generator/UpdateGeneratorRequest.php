<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Generator;

use K0nias\FakturoidApi\Api;
use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Http\Response\Generator\UpdateGeneratorResponse;
use K0nias\FakturoidApi\Model\Generator\Id;
use K0nias\FakturoidApi\Model\Generator\Parameters;

final class UpdateGeneratorRequest implements RequestInterface
{

    private const REQUEST_URI = 'generators/%s.json';

    /** @var \K0nias\FakturoidApi\Model\Generator\Id */
    private $id;

    /** @var \K0nias\FakturoidApi\Model\Generator\Parameters */
    private $parameters;

    public function __construct(Id $id, Parameters $parameters)
    {
        $this->id = $id;
        $this->parameters = $parameters;
    }

    public function getUri(): string
    {
        return sprintf(self::REQUEST_URI, $this->id->getId());
    }

    public function getMethod(): Method
    {
        return Method::PATCH();
    }

    /**
     * {@inheritdoc}
     */
    public function getData(): array
    {
        return $this->parameters->getParameters();
    }

    public function send(Api $api): UpdateGeneratorResponse
    {
        /** @var \K0nias\FakturoidApi\Http\Response\Generator\UpdateGeneratorResponse $response */
        $response = $api->process($this);

        return $response;
    }

}
