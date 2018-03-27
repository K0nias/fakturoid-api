<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request;

use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Model\Filter\SearchParametersInterface;

final class SearchInvoicesRequest implements RequestInterface
{
    const REQUEST_URI = 'invoices/search.json';

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