<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Invoice;

use K0nias\FakturoidApi\Exception\InvalidParameterException;

final class OptionalParameters
{

    /**
     * @var Parameters
     */
    private $parameters;

    public function __construct()
    {
        $this->parameters = new Parameters();
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
        $this->parameters->due($due);

        return $this;
    }

    public function variableNumber(string $variableNumber): self
    {
        $this->parameters->variableNumber($variableNumber);

        return $this;
    }

    /**
     * @param string $number
     *
     * @return self
     */
    public function number(string $number): self
    {
        $this->parameters->number($number);

        return $this;
    }

    public function vatPriceMode(VatPriceMode $vatPriceMode): self
    {
        $this->parameters->vatPriceMode($vatPriceMode);

        return $this;
    }

    /**
     * @param string $custom
     *
     * @return self
     */
    public function custom(string $custom): self
    {
        $this->parameters->custom($custom);

        return $this;
    }

    public function roundTotal(bool $roundTotal): self
    {
        $this->parameters->roundTotal($roundTotal);

        return $this;
    }

    /**
     * @param \DateTimeImmutable $issuedDate
     *
     * @return self
     */
    public function issuedDate(\DateTimeImmutable $issuedDate): self
    {
        $this->parameters->issuedDate($issuedDate);

        return $this;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters->getParameters();
    }
}
