<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Subject;

use K0nias\FakturoidApi\Api;
use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Http\Response\Subject\SearchSubjectsResponse;
use K0nias\FakturoidApi\Model\Filter\SearchParametersInterface;

final class SearchSubjectsRequest implements RequestInterface
{

    private const REQUEST_URI = 'subjects/search.json';

    /** @var \K0nias\FakturoidApi\Model\Filter\SearchParametersInterface|null */
    private $parameters;

    public function __construct(?SearchParametersInterface $parameters = null)
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

    public function send(Api $api): SearchSubjectsResponse
    {
        /** @var \K0nias\FakturoidApi\Http\Response\Subject\SearchSubjectsResponse $response */
        $response = $api->process($this);

        return $response;
    }

}
