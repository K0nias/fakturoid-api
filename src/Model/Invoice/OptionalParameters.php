<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Invoice;

use K0nias\FakturoidApi\Exception\InvalidParameterException;
use K0nias\FakturoidApi\Model\Parameters\ImmutableParameterBag;

final class OptionalParameters
{

    /**
     * @var ImmutableParameterBag
     */
    private $parameters;

    public function __construct()
    {
        $this->parameters = new ImmutableParameterBag();
    }

    /**
     * @param int $due
     *
     * @throws InvalidParameterException
     *
     * @return self
     */
    public function due(int $due): self
    {
        if ($due < 1) {
            throw new InvalidParameterException(sprintf('Due must be positive integer greater than 0. Given: %s', $due));
        }

        $this->parameters = $this->parameters->set('due', $due);

        return $this;
    }


    /**
     * @param \DateTimeImmutable $issuedDate
     *
     * @return self
     */
    public function issuedDate(\DateTimeImmutable $issuedDate): self
    {
        $this->parameters = $this->parameters->set('issued_on', $issuedDate->format('Y-m-d'));

        return $this;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters->getAll();
    }
}