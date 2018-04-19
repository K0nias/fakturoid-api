<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Filter;

use K0nias\FakturoidApi\Model\Parameters\ImmutableParameterBag;

final class SearchParameters implements SearchParametersInterface
{
    /**
     * @var ImmutableParameterBag
     */
    protected $parameters;

    public function __construct()
    {
        $this->parameters = new ImmutableParameterBag();
    }

    /**
     * @throws \OutOfRangeException
     *
     * {@inheritdoc}
     *
     * @return self
     */
    public function page(int $page): self
    {
        if (1 > $page) {
            throw new \OutOfRangeException(sprintf('Page must be positive integer. Given "%s"', $page));
        }

        $this->parameters = $this->parameters->set('page', $page);

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @return self
     */
    public function query(string $query): self
    {
        $this->parameters = $this->parameters->set('query', $query);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getParameters(): array
    {
        return $this->parameters->getAll();
    }


}