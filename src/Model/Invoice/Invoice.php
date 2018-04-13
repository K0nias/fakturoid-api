<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Invoice;

use K0nias\FakturoidApi\Model\Line\Line;
use K0nias\FakturoidApi\Model\Line\LineCollection;
use K0nias\FakturoidApi\Model\Payment\Method as PaymentMethod;
use K0nias\FakturoidApi\Model\Subject\Id;

final class Invoice
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
     * @param Id                        $subjectId
     * @param string                    $number
     * @param PaymentMethod             $paymentMethod
     * @param Line|LineCollection       $lines
     * @param OptionalParameters|null   $optionalParameters
     */
    public function __construct(Id $subjectId, string $number, PaymentMethod $paymentMethod, $lines, ?OptionalParameters $optionalParameters = null)
    {
        $parameters = new Parameters();

        $parameters->lines($lines)
            ->subject($subjectId)
            ->paymentMethod($paymentMethod)
            ->number($number);

        $this->parameters = $parameters;
        $this->optionalParameters = $optionalParameters;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return array_merge($this->getOptionalParameters(), $this->parameters->getParameters());
    }

    /**
     * @return array
     */
    protected function getOptionalParameters(): array
    {
        return array_merge($this->getDefaultOptionalParametersParameters(), $this->optionalParameters ? $this->optionalParameters->getParameters() : []);
    }

    /**
     * @return array
     */
    protected function getDefaultOptionalParametersParameters()
    {
        return [
            'due' => 14,
            'issued_on' => (new \DateTimeImmutable())->format('Y-m-d'),
        ];
    }
}