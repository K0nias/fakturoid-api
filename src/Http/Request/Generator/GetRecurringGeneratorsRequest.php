<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Generator;

use K0nias\FakturoidApi\Api;
use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Http\Response\Generator\GetRecurringGeneratorsResponse;
use K0nias\FakturoidApi\Model\Generator\Filter\ParametersInterface;

final class GetRecurringGeneratorsRequest implements RequestInterface
{

    private const REQUEST_URI = 'generators/recurring.json';

    /** @var \K0nias\FakturoidApi\Model\Generator\Filter\ParametersInterface|null */
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

    public function send(Api $api): GetRecurringGeneratorsResponse
    {
        /** @var \K0nias\FakturoidApi\Http\Response\Generator\GetRecurringGeneratorsResponse $response */
        $response = $api->process($this);

        return $response;
    }

}
