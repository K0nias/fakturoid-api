<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Generator;

use K0nias\FakturoidApi\Model\Currency\CurrencyInterface;
use K0nias\FakturoidApi\Model\Line\Line;
use K0nias\FakturoidApi\Model\Line\LineCollection;
use K0nias\FakturoidApi\Model\Subject\Id;
use K0nias\FakturoidApi\Model\Payment\Method as PaymentMethod;

final class Generator
{
    /**
     * @var Parameters
     */
    private $parameters;
    /**
     * @var OptionalParameters|null
     */
    private $optionalParameters;

    /**
     * @param string                  $name
     * @param Id                      $subjectId
     * @param Line|LineCollection     $lines
     * @param OptionalParameters|null $optionalParameters
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
     * @return array
     */
    public function getData(): array
    {
        return array_merge($this->parameters->getParameters(), $this->getOptionalParameters());
    }

    /**
     * @return array
     */
    protected function getOptionalParameters(): array
    {
        return $this->optionalParameters ? $this->optionalParameters->getParameters() : [];
    }
}