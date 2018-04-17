<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Generator;

use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Model\Generator\Filter\ParametersInterface;

final class GetRecurringGeneratorsRequest implements RequestInterface
{
    const REQUEST_URI = 'generators/recurring.json';

    /**
     * @var ParametersInterface|null
     */
    private $parameters;

    /**
     * @param ParametersInterface|null $parameters
     */
    public function __construct(ParametersInterface $parameters = null)
    {
        $this->parameters = $parameters;
    }

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
        return $this->parameters ? $this->parameters->getParameters() : [];
    }
}