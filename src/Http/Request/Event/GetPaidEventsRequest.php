<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Event;

use K0nias\FakturoidApi\Api;
use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Http\Response\Event\GetPaidEventsResponse;
use K0nias\FakturoidApi\Model\Event\Filter\ParametersInterface;

final class GetPaidEventsRequest implements RequestInterface
{

    private const REQUEST_URI = 'events/paid.json';

    /** @var \K0nias\FakturoidApi\Model\Event\Filter\ParametersInterface|null */
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

    public function send(Api $api): GetPaidEventsResponse
    {
        /** @var \K0nias\FakturoidApi\Http\Response\Event\GetPaidEventsResponse $response */
        $response = $api->process($this);

        return $response;
    }

}
