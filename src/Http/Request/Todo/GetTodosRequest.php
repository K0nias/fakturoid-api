<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Todo;

use K0nias\FakturoidApi\Api;
use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Http\Response\Todo\GetTodosResponse;
use K0nias\FakturoidApi\Model\Todo\Filter\ParametersInterface;

final class GetTodosRequest implements RequestInterface
{

    private const REQUEST_URI = 'todos.json';

    /** @var \K0nias\FakturoidApi\Model\Todo\Filter\ParametersInterface|null */
    private $parameters;

    public function __construct(?ParametersInterface $parameters = null)
    {
        $this->parameters = $parameters;
    }

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
        return $this->parameters ? $this->parameters->getParameters() : [];
    }

    public function send(Api $api): GetTodosResponse
    {
        /** @var \K0nias\FakturoidApi\Http\Response\Todo\GetTodosResponse $response */
        $response = $api->process($this);

        return $response;
    }

}
