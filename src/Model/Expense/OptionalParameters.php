<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Expense;

use K0nias\FakturoidApi\Model\Payment\Method as PaymentMethod;

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
     * @param PaymentMethod $paymentMethod
     *
     * @return self
     */
    public function paymentMethod(PaymentMethod $paymentMethod): self
    {
        $this->parameters->paymentMethod($paymentMethod);

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

    /**
     * @param string $originalNumber
     *
     * @return self
     */
    public function originalNumber(string $originalNumber): self
    {
        $this->parameters->originalNumber($originalNumber);

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