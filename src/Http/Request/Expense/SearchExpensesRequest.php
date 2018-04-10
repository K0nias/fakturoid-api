<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Expense;

use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Model\Filter\SearchParametersInterface;

final class SearchExpensesRequest implements RequestInterface
{
    const REQUEST_URI = 'expenses/search.json';

    /**
     * @var SearchParametersInterface|null
     */
    private $parameters;

    /**
     * @param SearchParametersInterface|null $parameters
     */
    public function __construct(SearchParametersInterface $parameters = null)
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