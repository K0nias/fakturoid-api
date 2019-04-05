<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Generator;

use K0nias\FakturoidApi\Model\Currency\CurrencyInterface;
use K0nias\FakturoidApi\Model\Payment\Method as PaymentMethod;
use K0nias\FakturoidApi\Model\Subject\Id;

final class Generator
{

    /** @var \K0nias\FakturoidApi\Model\Generator\Parameters */
    private $parameters;

    /** @var \K0nias\FakturoidApi\Model\Generator\OptionalParameters|null */
    private $optionalParameters;

    /**
     * @param \K0nias\FakturoidApi\Model\Line\Line|\K0nias\FakturoidApi\Model\Line\LineCollection $lines
     */
    public function __construct(string $name, Id $subjectId, $lines, PaymentMethod $paymentMethod, CurrencyInterface $currency, ?OptionalParameters $optionalParameters = null)
    {
        $parameters = new Parameters();

        $parameters->lines($lines)
            ->subject($subjectId)
            ->paymentMethod($paymentMethod)
            ->currency($currency)
            ->name($name);

        $this->parameters = $parameters;
        $this->optionalParameters = $optionalParameters;
    }

    /**
     * @return mixed[]
     */
    public function getData(): array
    {
        return array_merge($this->parameters->getParameters(), $this->getOptionalParameters());
    }

    /**
     * @return mixed[]
     */
    private function getOptionalParameters(): array
    {
        return $this->optionalParameters ? $this->optionalParameters->getParameters() : [];
    }

}
