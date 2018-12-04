<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Event;

use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Model\Event\Filter\ParametersInterface;

final class GetEventsRequest implements RequestInterface
{

    private const REQUEST_URI = 'events.json';

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

}
