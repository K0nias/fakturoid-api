<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Invoice;

use DateTimeImmutable;

final class OptionalParameters
{

    /** @var \K0nias\FakturoidApi\Model\Invoice\Parameters */
    private $parameters;

    public function __construct()
    {
        $this->parameters = new Parameters();
    }

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

    public function issuedDate(DateTimeImmutable $issuedDate): self
    {
        $this->parameters->issuedDate($issuedDate);

        return $this;
    }

    /** @return mixed[] */
    public function getParameters(): array
    {
        return $this->parameters->getParameters();
    }

}
