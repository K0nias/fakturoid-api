<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Filter;

use K0nias\FakturoidApi\Model\Parameters\ImmutableParameterBag;

final class SearchParameters implements SearchParametersInterface
{

    /** @var \K0nias\FakturoidApi\Model\Parameters\ImmutableParameterBag */
    protected $parameters;

    public function __construct()
    {
        $this->parameters = new ImmutableParameterBag();
    }

    public function page(int $page): SearchParametersInterface
    {
        if (1 > $page) {
            throw new \OutOfRangeException(sprintf('Page must be positive integer. Given "%s"', $page));
        }

        $this->parameters = $this->parameters->set('page', $page);

        return $this;
    }

    public function query(string $query): SearchParametersInterface
    {
        $this->parameters = $this->parameters->set('query', $query);

        return $this;
    }

    /** @return mixed[] */
    public function getParameters(): array
    {
        return $this->parameters->getAll();
    }

}
