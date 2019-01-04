<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Expense;

use K0nias\FakturoidApi\Api;
use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Http\Response\Expense\GetExpensesResponse;
use K0nias\FakturoidApi\Model\Expense\Filter\ParametersInterface;

final class GetExpensesRequest implements RequestInterface
{

    private const REQUEST_URI = 'expenses.json';

    /** @var \K0nias\FakturoidApi\Model\Expense\Filter\ParametersInterface|null */
    private $parameters;

    /**
     * GetInvoicesRequest .
     */
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

    public function send(Api $api): GetExpensesResponse
    {
        /** @var \K0nias\FakturoidApi\Http\Response\Expense\GetExpensesResponse $response */
        $response = $api->process($this);

        return $response;
    }

}
