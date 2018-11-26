<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Expense;

use DateTimeImmutable;
use K0nias\FakturoidApi\Model\Payment\Method as PaymentMethod;

final class OptionalParameters
{

    /** @var \K0nias\FakturoidApi\Model\Expense\Parameters */
    private $parameters;

    public function __construct()
    {
        $this->parameters = new Parameters();
    }

    public function paymentMethod(PaymentMethod $paymentMethod): self
    {
        $this->parameters->paymentMethod($paymentMethod);

        return $this;
    }

    public function number(string $number): self
    {
        $this->parameters->number($number);

        return $this;
    }

    public function originalNumber(string $originalNumber): self
    {
        $this->parameters->originalNumber($originalNumber);

        return $this;
    }

    public function issuedDate(DateTimeImmutable $issuedDate): self
    {
        $this->parameters->issuedDate($issuedDate);

        return $this;
    }

    /**
     * @return mixed[]
     */
    public function getParameters(): array
    {
        return $this->parameters->getParameters();
    }

}
