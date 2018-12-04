<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Todo\Filter;

use DateTime;
use DateTimeImmutable;
use K0nias\FakturoidApi\Model\Parameters\ImmutableParameterBag;

final class Parameters implements ParametersInterface
{

    /** @var \K0nias\FakturoidApi\Model\Parameters\ImmutableParameterBag */
    protected $parameters;

    public function __construct()
    {
        $this->parameters = new ImmutableParameterBag();
    }

    public function since(DateTimeImmutable $date): ParametersInterface
    {
        $this->parameters = $this->parameters->set('since', $date->format(DateTime::ATOM));

        return $this;
    }

    public function page(int $page): ParametersInterface
    {
        if (1 > $page) {
            throw new \OutOfRangeException(sprintf('Page must be positive integer. Given "%s"', $page));
        }

        $this->parameters = $this->parameters->set('page', $page);

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
